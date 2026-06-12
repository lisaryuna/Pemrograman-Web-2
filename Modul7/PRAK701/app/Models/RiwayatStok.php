<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatStok extends Model
{
    protected $table = 'riwayat_stok';
    protected $primaryKey = 'riwayat_stok_id';
    public $timestamps = false;

    protected $fillable = [
        'buku_id',
        'jenis_transaksi',
        'jumlah',
        'keterangan'
    ];

    public function buku() {
        return $this->belongsTo(Buku::class, 'buku_id')->withTrashed();
    }
}
