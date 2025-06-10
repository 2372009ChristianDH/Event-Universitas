<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;
use App\Models\RegistrasiKegiatan;

class AbsensiController extends Controller
{
    public function scan($id)
{
    // Cek apakah registrasi ada
    $registrasi = RegistrasiKegiatan::findOrFail($id);

    // Buat presensi
    Presensi::create([
        'id_registrasi' => $registrasi->id_registrasi,
        'dipindai_oleh' => null, // kalau tidak login
        'waktu_pindai' => now(),
        'status' => 'Hadir',
    ]);

    return response()->json([
        'message' => 'Presensi berhasil dicatat untuk ID: ' . $registrasi->id_registrasi,
    ]);
}

}
