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
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/riwayat-pinjam', [PeminjamanController::class, 'riwayat'])->name('riwayat.index');

    Route::middleware(['admin'])->group(function () {
        Route::resource('kategori', KategoriController::class);
        Route::resource('buku', BukuController::class)->except(['index']);
        Route::resource('peminjaman', PeminjamanController::class)->only(['index', 'create', 'store', 'show']);
        Route::post('/peminjaman/{id}/kembalikan', [PeminjamanController::class, 'kembalikan'])->name('peminjaman.kembalikan');
        Route::post('/peminjaman/{id}/bayar', [PeminjamanController::class, 'bayarDenda'])->name('peminjaman.bayar');
        Route::get('/buku/{buku_id}/eksemplar', [App\Http\Controllers\EksemplarController::class, 'index'])->name('eksemplar.index');
        Route::post('/buku/{buku_id}/eksemplar', [App\Http\Controllers\EksemplarController::class, 'store'])->name('eksemplar.store');
        Route::put('/eksemplar/{id}', [App\Http\Controllers\EksemplarController::class, 'update'])->name('eksemplar.update');
        Route::delete('/eksemplar/{id}', [App\Http\Controllers\EksemplarController::class, 'destroy'])->name('eksemplar.destroy');
        Route::get('/laporan/stok', [App\Http\Controllers\LaporanController::class, 'stok'])->name('laporan.stok');
        Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::post('/user', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
    });
});