<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegistrasiBeasiswaController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return redirect()->route('registrasi');
    });

    Route::get('/registrasi', [RegistrasiBeasiswaController::class, 'index'])->name('registrasi');
    Route::post('/registrasi', [RegistrasiBeasiswaController::class, 'store'])->name('registrasi.store'); 
    
    Route::get('/hasil', [HasilController::class, 'index'])->name('hasil');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';