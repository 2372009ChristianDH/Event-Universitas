<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DetailKegiatan;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';
    protected $primaryKey = 'id_kegiatan';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_kegiatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'id_user',
        'status',
    ];

    public function detail(){
        return $this->hasMany(DetailKegiatan::class, 'id_kegiatan');
    }

        public function detailKegiatan()
    {
        return $this->hasMany(DetailKegiatan::class, 'id_kegiatan');
    }

    // Relasi ke registrasiKegiatan via detailKegiatan (hasManyThrough)
    public function registrasi()
    {
        return $this->hasManyThrough(
            RegistrasiKegiatan::class,
            DetailKegiatan::class,
            'id_kegiatan', // Foreign key di detail_kegiatan
            'id_detail_kegiatan', // Foreign key di registrasi_kegiatan
            'id_kegiatan', // Local key di kegiatan
            'id_detail_kegiatan'  // Local key di detail_kegiatan
        );
    }
}
