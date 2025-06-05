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
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
}

