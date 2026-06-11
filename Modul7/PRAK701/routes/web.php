<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/buku', function () {
    return view('buku.index');
});

Route::get('/buku/create', function () {
    return view('buku.create');
});

Route::get('/buku/{id}/edit', function ($id) {
    return view('buku.edit', ['id' => $id]);
});