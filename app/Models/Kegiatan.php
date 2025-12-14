<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kegiatan',
        'tanggal_pelaksanaan',
        'tempat',
        'deskripsi',
        'foto',
    ];
    
    // Casting agar kolom tanggal otomatis jadi objek Carbon (memudahkan format tanggal)
    protected $casts = [
        'tanggal_pelaksanaan' => 'date',
    ];
}