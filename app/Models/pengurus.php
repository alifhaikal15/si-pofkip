<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pengurus';

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'nama',
        'jabatan',
        'nomor_hp',
        'tahun_jabatan',
        'foto',
    ];
}