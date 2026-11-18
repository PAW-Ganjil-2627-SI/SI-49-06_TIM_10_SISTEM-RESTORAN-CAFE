<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PegawaiController;


Route::get('/', function () {
    return redirect('/pegawai');
});

// Rute untuk menampilkan form login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Rute proses login (Manual check, aman buat password teks biasa di DB)
Route::post('/login', function (Request $request) {
    $user = \App\Models\User::where('username', $request->username)->first();

    if ($user && $user->password === $request->password) {
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/pegawai');
    }

    return back()->withErrors([
        'username' => 'Username atau password salah.',
    ]);
})->name('login.proses');

// Rute proses logout
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
});