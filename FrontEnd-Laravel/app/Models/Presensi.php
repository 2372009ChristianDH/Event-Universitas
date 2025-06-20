<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    protected $primaryKey = 'id_presensi';
    public $timestamps = false;
    
    protected $fillable = [
        'id_presensi',
        'id_registrasi',
        'dipindai_oleh',
        'waktu_pindai',
        'status',
    ];

    public function registrasi()
    {
        return $this->belongsTo(RegistrasiKegiatan::class, 'id_registrasi');
    }

    public function pemindai()
    {
        return $this->belongsTo(User::class, 'dipindai_oleh');
    }
}
