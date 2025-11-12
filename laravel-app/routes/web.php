<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

Route::get('/', fn () => view('welcome'))->name('home');

/*
|--------------------------------------------------------------------------
| AUTH SEDERHANA (SESSION-BASED, TANPA DB)
|--------------------------------------------------------------------------
| - Register: simpan data ke session + upload foto ke storage/public
| - Login   : cek email + password hash dari session
| - Profil  : hanya bisa diakses jika sudah login
| - Logout  : hapus session
*/

// -------------------- REGISTER --------------------
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'username'    => ['required', 'alpha_dash', 'min:3', 'max:20'],
        'name'        => ['required', 'string', 'min:3', 'max:100'],
        'prodi'       => ['required', 'string', 'max:100'],
        'tahun_masuk' => ['required', 'digits:4', 'integer', 'min:2000', 'max:2100'],
        'email'       => ['required', 'email'],
        'password'    => ['required', 'string', 'min:6', 'confirmed'],
        'photo'       => ['required', 'image', 'max:2048'], // 2MB
    ]);

    // Simpan foto ke storage/public/photos
    $path = $request->file('photo')->store('photos', 'public');

    // Bentuk “user” sederhana untuk disimpan ke session
    $user = [
        'username'     => $validated['username'],
        'name'         => $validated['name'],
        'prodi'        => $validated['prodi'],
        'tahun_masuk'  => $validated['tahun_masuk'],
        'email'        => $validated['email'],
        'photo'        => $path,
        'passwordHash' => Hash::make($validated['password']),
    ];

    session(['user' => $user]);

    return redirect()->route('profil')->with('success', 'Registrasi berhasil. Selamat datang!');
})->name('register.post');

// -------------------- LOGIN --------------------
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email'    => ['required', 'email'],
        'password' => ['required', 'string'],
    ]);

    $user = session('user');

    if (
        !$user
        || strtolower($user['email']) !== strtolower($credentials['email'])
        || !Hash::check($credentials['password'], $user['passwordHash'])
    ) {
        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    return redirect()->route('profil')->with('success', 'Berhasil login.');
})->name('login.post');

// -------------------- PROFIL (PROTECTED) --------------------
Route::get('/profil', function () {
    $user = session('user');
    if (!$user) {
        return redirect()->route('login')->with('warning', 'Silakan login dulu.');
    }

    return view('profil', compact('user'));
})->name('profil');

// -------------------- LOGOUT --------------------
Route::post('/logout', function () {
    request()->session()->forget('user');
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('home')->with('success', 'Anda sudah logout.');
})->name('logout');
