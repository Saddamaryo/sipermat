<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ public function up(): void
    {
        Schema::create('kategorisurat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_surat');
            $table->string('nomor');
            $table->longText('deskripsi_surat');
            $table->string('slug');
            $table->string('template_surat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategorisurat');
    }
};
