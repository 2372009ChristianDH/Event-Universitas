<?php

namespace App\Http\Controllers\Panitia;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RegistrasiKegiatan;
use App\Models\Sertifikat;
use App\Models\Kegiatan;
use App\Models\DetailKegiatan;

class PanitiaController extends Controller
{
    public function index()
    {
        $user = session('user');
        $id_user = $user['id'];

        // Ambil kegiatan yang dibuat oleh panitia ini
        $kegiatan = Kegiatan::withCount('registrasi')
            ->where('id_user', $id_user)
            ->with('detailKegiatan')
            ->get();

        // Total kegiatan
        $totalEvents = $kegiatan->count();

        // Total detail kegiatan dengan status 'Aktif'
        $activeEvents = DetailKegiatan::whereHas('kegiatan', function ($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })->where('status', 'Sedang Berlangsung')->count();

        // Total registrasi kegiatan oleh panitia ini
        $totalRegistrasi = RegistrasiKegiatan::whereHas('detailKegiatan.kegiatan', function ($query) use ($id_user) {
            $query->where('id_user', $id_user);
        })->count();

        // Total sertifikat yang diunggah oleh panitia ini
        $totalSertifikat = Sertifikat::where('diunggah_oleh', $id_user)->count();

        // Cari detail kegiatan yang registrasinya sudah disetujui tapi belum dapat sertifikat
        $pendingCertificates = DetailKegiatan::whereHas('kegiatan', function ($q) use ($id_user) {
            $q->where('id_user', $id_user);
        })
            ->withCount(['registrasi as pending_count' => function ($q) {
                $q->where('status_konfirmasi', 'Disetujui')
                    ->whereDoesntHave('sertifikat');
            }])
            ->having('pending_count', '>', 0)
            ->with('kegiatan')
            ->get();

        return view('panitia.index', compact(
            'totalEvents',
            'activeEvents',
            'totalRegistrasi',
            'totalSertifikat',
            'kegiatan',
            'pendingCertificates'
        ));
    }


    public function event()
    {
        return view('panitia.event.index');
    }

    public function createEvent()
    {
        return view('panitia.event.create');
    }


    public function indexSertifikat(Request $request)
    {
        $user = session('user');
        $id_user = $user['id']; // ambil ID panitia yang login

        $query = RegistrasiKegiatan::where('status_konfirmasi', 'Disetujui')
            ->whereHas('presensi', function ($q) {
                $q->where('status', 'Hadir');
            })
            ->whereHas('detailKegiatan.kegiatan', function ($q) use ($id_user) {
                $q->where('id_user', $id_user); // filter kegiatan milik panitia login
            })
            ->with(['user', 'detailKegiatan.kegiatan', 'sertifikat', 'presensi']);

        // Filter berdasarkan event
        if ($request->filled('event')) {
            $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($request) {
                $q->where('id_kegiatan', $request->event);
            });
        }

        // Filter berdasarkan sesi
        if ($request->filled('sesi')) {
            $query->where('id_detail_kegiatan', $request->sesi);
        }

        $hadirRegistrasi = $query->get();

        // Batasi listEvent dan listSesi hanya milik panitia ini
        $listEvent = Kegiatan::where('id_user', $id_user)->get();
        $listSesi = DetailKegiatan::whereHas('kegiatan', function ($q) use ($id_user) {
            $q->where('id_user', $id_user);
        })->get();

        return view('panitia.sertifikat.index', compact('hadirRegistrasi', 'listEvent', 'listSesi'));
    }


    public function getSesiByEvent($id)
    {
        $sesi = DetailKegiatan::where('id_kegiatan', $id)->get();
        return response()->json($sesi);
    }



    public function createSertifikat($id)
    {
        $user = session('user');
        $id_user = $user['id'];

        $registrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->where('id_registrasi', $id)
            ->whereHas('detailKegiatan.kegiatan', function ($q) use ($id_user) {
                $q->where('id_user', $id_user);
            })->firstOrFail();

        return view('panitia.sertifikat.create', compact('registrasi'));
    }


    public function storeSertifikat(Request $request, $id)
    {
        $request->validate([
            'sertifikat' => 'required|file|mimes:pdf|max:2048'
        ]);

        $user = session('user');
        $id_user = $user['id'];

        $registrasi = RegistrasiKegiatan::where('id_registrasi', $id)
            ->whereHas('detailKegiatan.kegiatan', function ($q) use ($id_user) {
                $q->where('id_user', $id_user);
            })->firstOrFail();

        $file = $request->file('sertifikat');
        $path = $file->store('sertifikat', 'public');

        Sertifikat::updateOrCreate(
            ['id_registrasi' => $id],
            [
                'sertifikat' => $path,
                'diunggah_oleh' => $id_user,
                'waktu_unggah' => now()
            ]
        );

        $event = $request->input('event');
        $sesi = $request->input('sesi');

        return redirect()->route('panitia.sertifikat.index', [
            'event' => $event,
            'sesi' => $sesi,
        ])->with('success', 'Sertifikat berhasil diunggah.');
    }
}
