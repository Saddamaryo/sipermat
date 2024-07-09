<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratmasuk extends Model
{
    use HasFactory;
    protected $table = 'suratmasuk';
    protected $fillable = [
        'nama_surat',
        'nama_mahasiswa',
        'jumlah_surat',
        'nomor_surat',
        'prodi_mahasiswa',
        'nim_mahasiswa',
        'nomor_user',
        'formulir1',
        'formulir2',
        'formulir3',
        'formulir4',
        'file_suratmasuk',
    ];
}
