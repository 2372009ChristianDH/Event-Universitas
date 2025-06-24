<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\DetailKegiatan;
use Carbon\Carbon;
use App\Models\RegistrasiKegiatan;
use App\Models\Sertifikat;

class PesertaController extends Controller
{
    public function index()
    {
        $idUser = session('user.id');

        $totalRegistrasi = RegistrasiKegiatan::where('id_user', $idUser)->count();
        $totalSertifikat = Sertifikat::whereHas('registrasi', function ($q) use ($idUser) {
            $q->where('id_user', $idUser);
        })->count();
        $totalBayar = RegistrasiKegiatan::where('id_user', $idUser)
            ->whereNotNull('bukti_pembayaran')
            ->with('detailKegiatan') // pastikan eager loading
            ->get()
            ->sum(function ($item) {
                return $item->detailKegiatan->biaya_registrasi ?? 0;
            });

        $totalUpcoming = RegistrasiKegiatan::where('id_user', $idUser)
            ->whereHas('detailKegiatan', function ($q) {
                $q->where('tanggal', '>=', now());
            })->count();

        $upcomingEvents = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('id_user', $idUser)
            ->whereHas('detailKegiatan', function ($q) {
                $q->where('tanggal', '>=', now());
            })
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        $sertifikat = Sertifikat::with(['registrasi.detailKegiatan.kegiatan'])
            ->whereHas('registrasi', fn($q) => $q->where('id_user', $idUser))
            ->orderBy('waktu_unggah', 'desc')
            ->take(5)
            ->get();

        return view('peserta.index', compact(
            'totalRegistrasi',
            'totalSertifikat',
            'totalBayar',
            'totalUpcoming',
            'upcomingEvents',
            'sertifikat'
        ));
    }


    public function indexEvent()
    {
        $panitiaUserIds = User::whereHas('role', function ($query) {
            $query->where('nama_role', 'panitia');
        })->pluck('id_user');

        $events = Kegiatan::whereIn('id_user', $panitiaUserIds)->get();



        // Tambahkan properti untuk tanggal yang sudah diformat
        foreach ($events as $event) {
            $start = \Carbon\Carbon::parse($event->tanggal_mulai);
            $end = \Carbon\Carbon::parse($event->tanggal_selesai);

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

            // Cek kapasitas saat ini
            $jumlahTerdaftar = RegistrasiKegiatan::where('id_detail_kegiatan', $idDetail)->count();

            $sesi = DetailKegiatan::find($idDetail);
            if (!$sesi) {
                continue; // sesi tidak ditemukan, skip
            }

            if ($jumlahTerdaftar >= $sesi->maksimal_peserta) {
                // kapasitas penuh, batalkan pendaftaran sesi ini, bisa kasih flash message atau skip
                return redirect()->back()->with('error', "Maaf, kapasitas sesi {$sesi->sesi} sudah penuh.");
            }

            // Cek apakah user sudah daftar sesi ini
            $sudahTerdaftar = RegistrasiKegiatan::where('id_user', $userId)
                ->where('id_detail_kegiatan', $idDetail)
                ->exists();

            if ($sudahTerdaftar) {
                continue; // sudah daftar, skip
            }

            RegistrasiKegiatan::create([
                'id_user' => $userId,
                'id_detail_kegiatan' => $idDetail,
                'tanggal_registrasi' => $tanggalRegistrasi,
                'kode_qr' => null,
                'bukti_pembayaran' => $filePath,
                'status_konfirmasi' => 'Pending',
            ]);
        }

        return redirect()->route('event.detailEvent', ['id' => $sesi->id_kegiatan])->with('success', 'Berhasil mendaftar kegiatan');
    }


    public function myQrCodes(Request $request)
    {
        $eventId = $request->query('event');
        $userId = session('user.id'); // Ambil ID user dari session

        // Ambil semua event untuk dropdown
        $allEvents = Kegiatan::all();

        // Query registrasi pending (jika kamu masih ingin menampilkannya)
        $pendingRegistrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->when($eventId, function ($query, $eventId) {
                $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($eventId) {
                    $q->where('id_kegiatan', $eventId);
                });
            })
            ->where('id_user', $userId) // 🔒 Hanya user ini
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        // Query QR code yang disetujui & milik user saat ini
        $qrRegistrasi = RegistrasiKegiatan::with(['detailKegiatan.kegiatan'])
            ->where('status_konfirmasi', 'Disetujui')
            ->whereNotNull('kode_qr')
            ->where('id_user', $userId) // 🔒 Filter user login
            ->when($eventId, function ($query, $eventId) {
                $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($eventId) {
                    $q->where('id_kegiatan', $eventId);
                });
            })
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        return view('peserta.eventQr', compact('qrRegistrasi', 'allEvents', 'pendingRegistrasi'));
    }

    public function Sertifikat(Request $request)
    {
        $user = session('user'); // Ambil data user dari session
        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $userId = $user['id'];

        // Ambil semua kegiatan untuk filter (jika ingin pakai filter kegiatan)
        $allEvents = Kegiatan::all();

        // Ambil semua sertifikat milik user
        $sertifikatSaya = Sertifikat::with('registrasi.detailKegiatan.kegiatan')
            ->whereHas('registrasi', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->when($request->filled('event') && $request->input('event') != 'all', function ($query) use ($request) {
                $query->whereHas('registrasi.detailKegiatan', function ($subQuery) use ($request) {
                    $subQuery->where('id_kegiatan', $request->input('event'));
                });
            })

            ->get()
            ->map(function ($serti) {
                $detail = $serti->registrasi->detailKegiatan ?? null;
                $kegiatan = $detail->kegiatan ?? null;

                $waktu = '-';
                if ($detail && $detail->waktu_mulai && $detail->waktu_selesai) {
                    $waktu = Carbon::parse($detail->waktu_mulai)->format('H:i') . ' - ' .
                        Carbon::parse($detail->waktu_selesai)->format('H:i');
                }

                return (object)[
                    'id_sertifikat'   => $serti->id_sertifikat,
                    'file'            => $serti->sertifikat,
                    'kegiatan_nama'   => $kegiatan->nama_kegiatan ?? 'Nama Kegiatan Tidak Ditemukan',
                    'tanggal'         => optional($detail)->tanggal
                        ? Carbon::parse($detail->tanggal)->format('d M Y')
                        : '-',
                    'waktu'           => $waktu,
                    'sesi'            => $detail->nama_sesi ?? '-',
                ];
            });

        return view('peserta.eventSertifikat', compact('sertifikatSaya', 'allEvents'));
    }
}
