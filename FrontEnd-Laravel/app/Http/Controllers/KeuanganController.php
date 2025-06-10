<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrasiKegiatan;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class KeuanganController extends Controller
{
    public function index()
    {
        $pendingRegistrasi = RegistrasiKegiatan::where('status_konfirmasi', 'Pending')
            ->with(['user', 'detailKegiatan.kegiatan'])
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();
        $pendingVerifications = RegistrasiKegiatan::where('status_konfirmasi', 'Pending')->count();
        $disetujui = RegistrasiKegiatan::where('status_konfirmasi', 'Disetujui')->count();
        $ditolak = RegistrasiKegiatan::where('status_konfirmasi', 'Ditolak')->count();
        $activeEvents = Kegiatan::where('status', 'Coming Soon')->count();

        return view('keuangan.index', compact('pendingRegistrasi', 'pendingVerifications', 'disetujui', 'ditolak', 'activeEvents'));
    }

    public function indexLP()
    {
        $pendingRegistrasi = RegistrasiKegiatan::with(['user', 'detailKegiatan.kegiatan'])
            ->orderBy('tanggal_registrasi', 'desc')
            ->get();

        return view('keuangan.laporanPembayaran', compact('pendingRegistrasi'));
    }   


    public function terima($id)
    {
        $registrasi = RegistrasiKegiatan::findOrFail($id);
        $registrasi->status_konfirmasi = 'Disetujui';

        // Data yang ingin dimasukkan ke QR, misal URL absensi scan
        $url = route('absensi.scan', ['id' => $registrasi->id_registrasi], false);
        $qrData = 'http://' . request()->getHost() . ':' . request()->getPort() . $url;

        // Nama file QR yang akan disimpan, misal di folder storage/app/public/qr
        $qrPath = 'qr/qr_' . $registrasi->id_registrasi . '.png';

        // Generate QR Code dan simpan file di disk storage/app/public/qr/...
        Storage::disk('public')->put($qrPath, QrCode::format('png')->size(300)->generate($qrData));

        // Simpan path relatif ke database (tanpa 'public/' prefix)
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
