<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role'; // Nama tabel di database
    protected $primaryKey = 'id_role'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    protected $fillable = [
        'id_role',
        'nama_role',
    ];
}
