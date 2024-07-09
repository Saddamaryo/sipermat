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
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pimpinan');
            $table->string('nip_pimpinan');
            $table->string('jabatan_pimpinan');
            $table->string('slug_jabatan');
            $table->string('prodi_pimpinan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pimpinan');
    }
};
