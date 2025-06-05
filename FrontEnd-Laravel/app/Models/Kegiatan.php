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
}
