<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomorsurat extends Model
{
    use HasFactory;
    protected $fillable = ['nomor_surat', 'data'];
}
