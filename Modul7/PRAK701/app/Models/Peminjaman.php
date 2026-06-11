<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'peminjaman_id';
    public $timestamps = false;

    protected $fillable = ['user_id', 'tanggal_pinjam', 'batas_kembali', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function detail() {
        return $this->hasMany(DetailPeminjaman::class, 'peminjaman_id', 'peminjaman_id');
    }
}