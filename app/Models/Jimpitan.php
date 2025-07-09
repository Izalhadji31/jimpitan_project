<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jimpitan extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id',
        'nama_warga',
        'tanggal',
        'status',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }
}
