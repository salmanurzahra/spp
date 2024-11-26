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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id('id_pembayaran'); // Use a custom primary key name
            $table->unsignedBigInteger('id_petugas');
            $table->string('nisn', 10);
            $table->date('tgl_bayar');
            $table->string('bulan_dibayar', 12);
            $table->string('tahun_dibayar', 4);
            $table->integer('jumlah_bayar');

            $table->foreign('id_petugas')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('nisn')->references('nisn')->on('siswa')->onDelete('cascade');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};