<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pimpinan extends Model
{
    use HasFactory;
    protected $table = 'pimpinan';
    protected $fillable = ['nama_pimpinan', 'nip_pimpinan', 'jabatan_pimpinan', 'prodi_pimpinan', 'slug_jabatan'];
}

