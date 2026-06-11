<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Middleware\RequireAuth;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([RequireAuth::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('buku', BukuController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('riwayat.index');
    Route::resource('peminjaman', PeminjamanController::class)->only(['index', 'create', 'store', 'show']);
    Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
});