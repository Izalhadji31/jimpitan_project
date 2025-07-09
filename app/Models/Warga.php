<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_warga',
        'no_hp',
        'username',
        'password',
        'rt',
    ];

    protected $hidden = ['password'];

    public function jimpitan()
    {
        return $this->hasOne(Jimpitan::class);
    }
}
