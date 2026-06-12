<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table ='buku';
    protected $primaryKey = 'buku_id';
    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    public function eksemplar() {
        return $this->hasMany(EksemplarBuku::class, 'buku_id', 'buku_id');
    }
}
