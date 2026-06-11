<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EksemplarBuku extends Model
{
    protected $table = 'eksemplar_buku';
    protected $primaryKey = 'eksemplar_id';
    public $timestamps = false;

    protected $fillable = ['buku_id', 'kode_barcode', 'kondisi', 'status'];

    public function buku() {
        return $this->belongsTo(Buku::class, 'buku_id', 'buku_id');
    }
}