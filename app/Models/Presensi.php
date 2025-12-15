<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kegiatan_id',
        'nama_anggota',
        'status',
    ];

    // Relasi: Setiap data presensi milik satu kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}