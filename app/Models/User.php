<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'password',
        'role', // admin atau user
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Menggunakan kolom 'username' sebagai identifikasi utama untuk login
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    /**
     * Casting password secara otomatis (Laravel 10+ mendukung ini)
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }
}
