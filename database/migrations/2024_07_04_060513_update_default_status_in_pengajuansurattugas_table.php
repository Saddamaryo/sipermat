<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengajuansurattugas', function (Blueprint $table) {
            $table->string('status')->default('Menunggu')->change();
        });
    }

    public function down(): void
    {
        Schema::table('pengajuansurattugas', function (Blueprint $table) {
            $table->string('status')->default('Waiting')->change();
        });
    }
};
