<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Halaman utama redirect ke login
Route::get('/', function () {
    return redirect('/login');
});

// Route untuk halaman
Route::get('/login', [PageController::class, 'showLogin']);
Route::post('/login', [PageController::class, 'processLogin']);
Route::get('/dashboard', [PageController::class, 'showDashboard']);
Route::get('/pengelolaan', [PageController::class, 'showPengelolaan']);
Route::post('/tambah-transaksi', [PageController::class, 'tambahTransaksi']);
Route::get('/hapus-transaksi/{id}', [PageController::class, 'hapusTransaksi']);
Route::get('/profile', [PageController::class, 'showProfile']);
Route::get('/logout', [PageController::class, 'processLogout']);
