<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Buku 
Route::get('/buku/search', [BukuController::class, 'search'])->name('buku.search');
Route::get('/buku/export', [BukuController::class, 'export'])->name('buku.export');
Route::get('/buku/kategori/{kategori}', [BukuController::class, 'filterKategori'])->name('buku.kategori');
Route::post('/buku/bulk-delete', [BukuController::class, 'bulkDelete'])->name('buku.bulk-delete');

// Route Anggota -
Route::get('/anggota/search', [AnggotaController::class, 'search'])->name('anggota.search');
Route::get('/anggota/export', [AnggotaController::class, 'export'])->name('anggota.export');

// Resource Routes
Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);