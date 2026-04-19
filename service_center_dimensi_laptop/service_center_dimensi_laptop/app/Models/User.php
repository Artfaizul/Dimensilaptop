<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Data yang boleh diisi (Mass Assignment)
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar', // Tambahkan ini agar bisa simpan foto profil
        'status', // Tambahkan ini agar bisa simpan status akun (Aktif/Nonaktif)
    ];

    /**
     * Data yang disembunyikan
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting data
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}