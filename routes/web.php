<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/produk', function () {
    return view('produk');
})->middleware(['auth', 'verified'])->name('produk');

Route::get('/kategori', function () {
    return view('kategori');
})->middleware(['auth', 'verified'])->name('kategori');

Route::get('/transaksi', function () {
    return view('transaksi');
})->middleware(['auth', 'verified'])->name('transaksi');

Route::get('/member', function () {
    return view('member');
})->middleware(['auth', 'verified'])->name('member');

Route::get('/pesanan', function () {
    return view('pesanan');
})->middleware(['auth', 'verified'])->name('pesanan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
