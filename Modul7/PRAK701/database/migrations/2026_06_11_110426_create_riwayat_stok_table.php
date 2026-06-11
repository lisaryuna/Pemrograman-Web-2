<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_stok', function (Blueprint $table) {
            $table->id('riwayat_stok_id');
            $table->foreignId('buku_id')->constrained('buku', 'buku_id')->onDelete('cascade');
            $table->enum('jenis_transaksi', ['masuk', 'keluar', 'penyesuaian']);
            $table->integer('jumlah');
            $table->string('keterangan', 255)->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_stok');
    }
};
