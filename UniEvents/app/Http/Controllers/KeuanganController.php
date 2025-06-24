<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiKegiatan;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;


class KeuanganController extends Controller
{
    public function index()
    {
        $pendingRegistrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->where('status_konfirmasi', 'Pending')
            ->latest('tanggal_registrasi')
            ->take(5)
            ->get();

        $pendingVerifications = RegistrasiKegiatan::where('status_konfirmasi', 'Pending')->count();
        $disetujui = RegistrasiKegiatan::where('status_konfirmasi', 'Disetujui')->count();
        $ditolak = RegistrasiKegiatan::where('status_konfirmasi', 'Ditolak')->count();
        $activeEvents = Kegiatan::where('status', 'Coming Soon')->count();

        $revenueByDate = DB::table('registrasikegiatan as r')
            ->join('detail_kegiatan as d', 'r.id_detail_kegiatan', '=', 'd.id_detail_kegiatan')
            ->selectRaw('DATE(r.tanggal_registrasi) as tanggal, SUM(d.biaya_registrasi) as total')
            ->where('r.status_konfirmasi', 'Disetujui')
            ->groupByRaw('DATE(r.tanggal_registrasi)')
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('keuangan.index', compact(
            'pendingVerifications',
            'disetujui',
            'ditolak',
            'activeEvents',
            'pendingRegistrasi',
            'revenueByDate'
        ));
    }


    public function indexLP(Request $request)
    {
        $eventId = $request->query('event');

        // Ambil semua event untuk dropdown
        $allEvents = Kegiatan::all();

        // Query registrasi, difilter jika ada ID event
        $pendingRegistrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->when($eventId, function ($query, $eventId) {
                $query->whereHas('detailKegiatan.kegiatan', function ($q) use ($eventId) {
                    $q->where('id_kegiatan', $eventId);
                });
            })
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        return view('keuangan.laporanPembayaran', compact('pendingRegistrasi', 'allEvents'));
    }

    public function terima($id)
    {
        $registrasi = RegistrasiKegiatan::with('detailKegiatan.kegiatan')->findOrFail($id);
        $registrasi->status_konfirmasi = 'Disetujui';

        // Ambil id_kegiatan dari relasi melalui detailKegiatan
        $eventId = $registrasi->detailKegiatan->id_kegiatan;

        // Siapkan payload QR berupa JSON
        $qrPayload = json_encode([
            'id_registrasi' => $registrasi->id_registrasi,
            'event_id' => $eventId,
            'session_id' => $registrasi->id_detail_kegiatan
        ]);

        $qrPath = 'qr/qr_' . $registrasi->id_registrasi . '.png';
        Storage::disk('public')->put($qrPath, QrCode::format('png')->size(300)->generate($qrPayload));

        $registrasi->kode_qr = $qrPath;
        $registrasi->save();

        return redirect()->back()->with('success', 'Registrasi berhasil disetujui dan QR Code dibuat.');
    }



    public function tolak(Request $request, $id)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:900'
        ]);
        $registrasi = RegistrasiKegiatan::findOrFail($id);
        $registrasi->status_konfirmasi = 'Ditolak';
        $registrasi->keterangan = $request->alasan_penolakan;
        $registrasi->save();

        return redirect()->back()->with('success', 'Registrasi berhasil ditolak dengan alasan: ' . $request->alasan_penolakan);
    }
}
