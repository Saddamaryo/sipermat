<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuansurat extends Model
{
    use HasFactory;
    protected $table = 'pengajuansurat';
    protected $fillable = ['id_surat',
    'id_user',
    'nama_surat',
    'nama_mahasiswa',
    'nomor_surat',
    'nomor_urut',
    'prodi_mahasiswa',
    'jumlah_surat',
    'slug',
    'nim_mahasiswa',
    'nomor_user',
    'formulir1',
    'formulir2',
    'formulir3',
    'formulir4',
    'formulir5',
    'formulir6',
    'file_ajuan',
    'nama_file_ajuan',
    'file_acc',
    'nama_file_acc',
    'status'];
}
