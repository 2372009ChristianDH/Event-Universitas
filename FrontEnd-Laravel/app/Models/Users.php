<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user'; // Nama tabel di database
    protected $primaryKey = 'id_user'; // Primary key tabel
    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    protected $fillable = [
        'nama',
        'email',
        'password',
        'id_role',
    ];

}
