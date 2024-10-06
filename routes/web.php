<?php

use App\Http\Controllers\KategoriController;
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
})->middleware(['auth', 'verified'])->name('produk.index');


Route::get('/transaksi', function () {
    return view('transaksi');
})->middleware(['auth', 'verified'])->name('transaksi.index');

Route::get('/member', function () {
    return view('member');
})->middleware(['auth', 'verified'])->name('member.index');

Route::get('/pesanan', function () {
    return view('pesanan');
})->middleware(['auth', 'verified'])->name('pesanan.index');


// KATEGORI
Route::middleware('auth')->group(function () {
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index'); // Rute untuk index
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create'); // Rute untuk create
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store'); //ROUTE UNTUK STORE DATA
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit'); // Rute untuk edit
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update'); // Rute untuk update
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); // Rute untuk destroy
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
