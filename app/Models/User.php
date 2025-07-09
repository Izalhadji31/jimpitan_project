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
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Supaya Auth pakai kolom `username` untuk login
     */
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    // 🔥 JANGAN pakai casts: hashed di sini
}
