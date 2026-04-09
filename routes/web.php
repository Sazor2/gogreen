<?php

use App\Http\Controllers\GreenController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GreenController::class, 'dashboard'])->name('dashboard');
Route::get('/tanaman', [GreenController::class, 'tanaman'])->name('tanaman');
Route::get('/kalkulator', [GreenController::class, 'kalkulator'])->name('kalkulator');
Route::post('/kalkulator', [GreenController::class, 'hitungSampah'])->name('kalkulator.hitung');
Route::get('/lang/{locale}', [GreenController::class, 'setLanguage'])->name('lang.switch');
Route::get('/tentang', [GreenController::class, 'about'])->name('about');
Route::get('/artikel', [GreenController::class, 'artikel'])->name('artikel');
Route::get('/profil-sekolah', [GreenController::class, 'profilSekolah'])->name('profil-sekolah');
Route::get('/contact', [GreenController::class, 'contact'])->name('contact');
Route::post('/contact', [GreenController::class, 'contactSend'])->name('contact.send');
