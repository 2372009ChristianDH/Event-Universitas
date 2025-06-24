<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrasiKegiatan extends Model
{
    use HasFactory;

    protected $table = 'registrasikegiatan'; // Nama tabel

    protected $primaryKey = 'id_registrasi';

    public $timestamps = false; // karena tidak ada kolom created_at / updated_at

    protected $fillable = [
        'id_user',
        'id_detail_kegiatan',
        'tanggal_registrasi',
        'kode_qr',
        'bukti_pembayaran',
        'status_konfirmasi',
        'dikonfirmasi_oleh',
    ];

    // Relasi ke User peserta
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Relasi ke DetailKegiatan
    public function detailKegiatan()
    {
        return $this->belongsTo(DetailKegiatan::class, 'id_detail_kegiatan', 'id_detail_kegiatan');
    }

    public function presensi()
    {
        return $this->hasOne(Presensi::class, 'id_registrasi');
    }

    public function sertifikat()
    {
        return $this->hasOne(Sertifikat::class, 'id_registrasi');
    }
}
