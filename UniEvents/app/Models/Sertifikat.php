<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'id_sertifikat';
    public $timestamps = false;

    protected $fillable = ['id_registrasi', 'sertifikat', 'diunggah_oleh', 'waktu_unggah'];

    public function registrasi()
    {
        return $this->belongsTo(RegistrasiKegiatan::class, 'id_registrasi');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'diunggah_oleh');
    }
}

