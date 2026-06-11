<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id('detail_peminjaman_id');
            $table->foreignId('peminjaman_id')->constrained('peminjaman', 'peminjaman_id')->onDelete('cascade');
            $table->foreignId('eksemplar_id')->constrained('eksemplar_buku', 'eksemplar_id')->onDelete('restrict');
            $table->date('tanggal_dikembalikan')->nullable();
            $table->integer('denda')->default(0);
            $table->enum('status_denda', ['nihil', 'belum_dibayar', 'lunas'])->default('nihil');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
