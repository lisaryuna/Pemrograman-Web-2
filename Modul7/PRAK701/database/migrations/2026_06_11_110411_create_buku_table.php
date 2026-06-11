<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('buku_id');
            $table->foreignId('kategori_id')->constrained('kategori', 'kategori_id')->onDelete('restrict');
            $table->string('judul', 255);
            $table->string('penulis', 150);
            $table->string('penerbit', 150);
            $table->smallInteger('tahun_terbit');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
