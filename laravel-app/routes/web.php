<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

Route::get('/', function () {
    return view('welcome'); // biar gak 404
});

Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');
Route::get('/profil/{username}', [ProfilController::class, 'show'])->name('profil.show');
