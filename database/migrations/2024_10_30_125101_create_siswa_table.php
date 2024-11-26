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
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('nisn', 10)->unique();
            $table->string('nis', 8)->unique();
            $table->string('nama', 35);
            $table->unSignedBigInteger('id_kelas');
            $table->text('alamat')->nullable();
            $table->string('no_telp', 13);
            $table->unSignedBigInteger('id_spp');
            $table->foreign('id_kelas')->references('id')->on('kelas')->onDelete('cascade');
            $table->foreign('id_spp')->references('id')->on('spp')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
