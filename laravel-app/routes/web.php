<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

// -------------------- LOGIN --------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    // nanti kalau sudah ada auth beneran, cek ke DB di sini
    $name = $request->input('email', 'Mahasiswa');
    return view('dashboard', [
        'nama' => $name,
    ]);
})->name('login.post');

// -------------------- REGISTER --------------------
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    // di sini kita BELUM simpan ke DB karena DB-mu belum jalan
    // kita ambil nama dari form lalu kirim ke dashboard
    $name = $request->input('name', 'Mahasiswa');

    return view('dashboard', [
        'nama' => $name,
    ]);
})->name('register.post');

// -------------------- DASHBOARD --------------------
Route::get('/dashboard', function () {
    $nama = 'Mahasiswa'; // fallback
    return view('dashboard', ['nama' => $nama]);
})->name('dashboard');
