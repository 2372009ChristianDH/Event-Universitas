<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kegiatan;


class DetailKegiatan extends Model
{
    protected $table = 'detail_kegiatan';
    protected $primaryKey = 'id_detail_kegiatan';
    public $timestamps = false;

    protected $fillable = [
        'id_kegiatan',
        'sesi',
        'nama_sesi',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'narasumber',
        'biaya_registrasi',
        'maksimal_peserta',
        'status',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }

    public function registrasi()
    {
        return $this->hasMany(RegistrasiKegiatan::class, 'id_detail_kegiatan', 'id_detail_kegiatan');
    }



}

