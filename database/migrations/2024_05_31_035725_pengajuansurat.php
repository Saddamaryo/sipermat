<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuansurat', function (Blueprint $table) {
            $table->id();
            $table->string('id_surat')->nullable();
            $table->string('id_user')->nullable();
            $table->string('nama_surat')->nullable();
            $table->string('slug')->nullable();
            //EDITABLE DATA
            $table->string('nama_mahasiswa');
            $table->string('nomor_surat');
            $table->string('nomor_urut');
            $table->string('prodi_mahasiswa');
            $table->string('nim_mahasiswa')->nullable();
            $table->string('nomor_user')->nullable();
            $table->text('formulir1')->nullable();
            $table->text('formulir2')->nullable();
            $table->text('formulir3')->nullable();
            $table->text('formulir4')->nullable();
            $table->text('formulir5')->nullable();
            $table->text('formulir6')->nullable();
            //FILE STATUS 
            $table->string('file_ajuan')->nullable();
            $table->string('nama_file_ajuan')->nullable();
            $table->string('file_acc')->nullable();
            $table->string('nama_file_acc')->nullable();
            $table->string('status')->default('Menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuansurat');
    }
};
