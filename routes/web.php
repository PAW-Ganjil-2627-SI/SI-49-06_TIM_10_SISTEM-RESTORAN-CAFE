<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('meja.index');
    }

    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.proses');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


Route::middleware(['auth', 'role:admin,petugas'])->group(function () {

    Route::get('/meja', [MejaController::class, 'index'])
        ->name('meja.index');

    Route::get('/meja/create', [MejaController::class, 'create'])
        ->name('meja.create');

    Route::post('/meja', [MejaController::class, 'store'])
        ->name('meja.store');

    Route::get('/meja/{id}/edit', [MejaController::class, 'edit'])
        ->name('meja.edit');

    Route::put('/meja/{id}', [MejaController::class, 'update'])
        ->name('meja.update');
});


Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::delete('/meja/{id}', [MejaController::class, 'destroy'])
        ->name('meja.destroy');
});
