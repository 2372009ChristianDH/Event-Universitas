<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\DetailKegiatan;
use Carbon\Carbon;
use App\Models\RegistrasiKegiatan;

class PesertaController extends Controller
{
    public function index()
    {
        return view('peserta.index');
    }

    public function indexEvent()
    {
        $panitiaUserIds = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'panitia');
        })->pluck('id_user');

        $events = Kegiatan::whereIn('id_user', $panitiaUserIds)->get();

        foreach ($events as $event) {
            $start = Carbon::parse($event->tanggal_mulai);
            $end = Carbon::parse($event->tanggal_selesai);

            if ($start->isSameDay($end)) {
                $event->tanggal_display = $start->format('d M');
            } elseif ($start->format('M') === $end->format('M')) {
                $event->tanggal_display = $start->format('d') . '–' . $end->format('d') . ' ' . $start->format('M');
            } else {
                $event->tanggal_display = $start->format('d M') . ' – ' . $end->format('d M');
            }
        }

        return view('peserta.event.index', compact('events'));
    }

    public function create($id_kegiatan)
    {
        $kegiatan = Kegiatan::findOrFail($id_kegiatan);
        $sesiKegiatans = DetailKegiatan::where('id_kegiatan', $id_kegiatan)->get();

        return view('peserta.event.create', compact('kegiatan', 'sesiKegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_detail_kegiatan' => 'required|array|min:1',
            'id_detail_kegiatan.*' => 'exists:detail_kegiatan,id_detail_kegiatan',
            'bukti_pembayaran' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $userId = session('user.id'); // ambil dari session
        $tanggalRegistrasi = now();

        $file = $request->file('bukti_pembayaran');
        $originalName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('bukti_pembayaran', $originalName, 'public');

        foreach ($request->id_detail_kegiatan as $idDetail) {
            $jumlahTerdaftar = RegistrasiKegiatan::where('id_detail_kegiatan', $idDetail)->count();
            $sesi = DetailKegiatan::find($idDetail);

            if (!$sesi) continue;

            if ($jumlahTerdaftar >= $sesi->maksimal_peserta) {
                return redirect()->back()->with('error', "Maaf, kapasitas sesi {$sesi->sesi} sudah penuh.");
            }

            $sudahTerdaftar = RegistrasiKegiatan::where('id_user', $userId)
                ->where('id_detail_kegiatan', $idDetail)
                ->exists();

            if ($sudahTerdaftar) continue;

            RegistrasiKegiatan::create([
                'id_user' => $userId,
                'id_detail_kegiatan' => $idDetail,
                'tanggal_registrasi' => $tanggalRegistrasi,
                'kode_qr' => null,
                'bukti_pembayaran' => $filePath,
                'status_konfirmasi' => 'Pending',
            ]);
        }

        return redirect()->route('peserta.event.index')->with('success', 'Berhasil mendaftar kegiatan.');
    }

    public function myQrCodes(Request $request)
    {
        $eventId = $request->query('event');
        $userId = session('user.id');

        $allEvents = Kegiatan::all();

        $pendingRegistrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->when($eventId, function ($query, $eventId) {
                $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($eventId) {
                    $q->where('id_kegiatan', $eventId);
                });
            })
            ->where('id_user', $userId)
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        $qrRegistrasi = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('status_konfirmasi', 'Disetujui')
            ->whereNotNull('kode_qr')
            ->where('id_user', $userId)
            ->when($eventId, function ($query, $eventId) {
                $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($eventId) {
                    $q->where('id_kegiatan', $eventId);
                });
            })
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        return view('peserta.eventQr', compact('qrRegistrasi', 'allEvents', 'pendingRegistrasi'));
    }
}
