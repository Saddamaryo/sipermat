<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            //EDITABLE DATA
            $table->string('nama_mahasiswa')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('prodi_mahasiswa')->nullable();
            $table->string('nim_mahasiswa')->nullable();
            $table->string('nomor_user')->nullable();
            $table->text('formulir1')->nullable();
            $table->text('formulir2')->nullable();
            $table->text('formulir3')->nullable();
            $table->text('formulir4')->nullable();
            //FILE STATUS 
            $table->string('file_suratmasuk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratmasuk');
    }
};
