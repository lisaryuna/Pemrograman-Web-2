<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';
    protected $primaryKey = 'detail_peminjaman_id';
    public $timestamps = false;

    protected $fillable = ['peminjaman_id', 'eksemplar_id', 'tanggal_dikembalikan', 'denda', 'status_denda'];

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id', 'peminjaman_id');
    }

    public function eksemplar() {
        return $this->belongsTo(EksemplarBuku::class, 'eksemplar_id', 'eksemplar_id');
    }
}
