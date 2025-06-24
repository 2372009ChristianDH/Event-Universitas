<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }
}
