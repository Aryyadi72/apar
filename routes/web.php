<?php

use App\Http\Controllers\DivisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\TipeAparController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\RefillController;
use App\Http\Controllers\KondisiAparController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Divisi
Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
Route::post('/divisi/store', [DivisiController::class, 'store'])->name('divisi.store');
Route::put('/divisi/update/{id}', [DivisiController::class, 'update'])->name('divisi.update');
Route::delete('/divisi/delete/{id}', [DivisiController::class, 'delete'])->name('divisi.delete');

// Lokasi
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi');
Route::post('/lokasi/store', [LokasiController::class, 'store'])->name('lokasi.store');
Route::put('/lokasi/update/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
Route::delete('/lokasi/delete/{id}', [LokasiController::class, 'delete'])->name('lokasi.delete');

// Merk
Route::get('/merk', [MerkController::class, 'index'])->name('merk');
Route::post('/merk/store', [MerkController::class, 'store'])->name('merk.store');
Route::put('/merk/update/{id}', [MerkController::class, 'update'])->name('merk.update');
Route::delete('/merk/delete/{id}', [MerkController::class, 'delete'])->name('merk.delete');

// Tipe Apar
Route::get('/tipe-apar', [TipeAparController::class, 'index'])->name('tipe-apar');
Route::post('/tipe-apar/store', [TipeAparController::class, 'store'])->name('tipe-apar.store');
Route::put('/tipe-apar/update/{id}', [TipeAparController::class, 'update'])->name('tipe-apar.update');
Route::delete('/tipe-apar/delete/{id}', [TipeAparController::class, 'delete'])->name('tipe-apar.delete');

// Apar
Route::get('/apar', [AparController::class, 'index'])->name('apar');
Route::get('/apar/create', [AparController::class, 'create'])->name('apar.create');
Route::post('/apar/store', [AparController::class, 'store'])->name('apar.store');
Route::get('/apar/edit/{id}', [AparController::class, 'edit'])->name('apar.edit');
Route::put('/apar/update/{id}', [AparController::class, 'update'])->name('apar.update');
Route::delete('/apar/delete/{id}', [AparController::class, 'delete'])->name('apar.delete');

// Refill
Route::get('/refill', [RefillController::class, 'index'])->name('refill');
Route::get('/refill/create', [RefillController::class, 'create'])->name('refill.create');
Route::post('/refill/store', [RefillController::class, 'store'])->name('refill.store');
Route::get('/refill/edit', [RefillController::class, 'edit'])->name('refill.edit');
Route::put('/refill/update/{id}', [RefillController::class, 'update'])->name('refill.update');
Route::delete('/refill/delete/{id}', [RefillController::class, 'delete'])->name('refill.delete');

// Kondisi Apar
Route::get('/kondisi-apar', [KondisiAparController::class, 'index'])->name('kondisi-apar');
Route::get('/kondisi-apar/create', [KondisiAparController::class, 'create'])->name('kondisi-apar.create');
Route::post('/kondisi-apar/store', [KondisiAparController::class, 'store'])->name('kondisi-apar.store');
Route::get('/kondisi-apar/edit', [KondisiAparController::class, 'edit'])->name('kondisi-apar.edit');
Route::put('/kondisi-apar/update/{id}', [KondisiAparController::class, 'update'])->name('kondisi-apar.update');
Route::delete('/kondisi-apar/delete/{id}', [KondisiAparController::class, 'delete'])->name('kondisi-apar.delete');

// Summary
Route::get('/summary-kondisi-apar', [KondisiAparController::class, 'summary_kondisi_apar_perbulan'])->name('summary-kondisi-apar');
Route::get('/summary-kondisi-apar-lokasi', [KondisiAparController::class, 'summary_kondisi_apar_perlokasi'])->name('summary-kondisi-apar-lokasi');
