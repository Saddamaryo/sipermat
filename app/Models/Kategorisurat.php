<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorisurat extends Model
{
    use HasFactory;
    protected $table = 'kategorisurat';
    protected $fillable = ['nama_surat', 'nomor', 'deskripsi_surat', 'template_surat', 'slug'];}
