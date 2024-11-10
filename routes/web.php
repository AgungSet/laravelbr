<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmumController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// HALAMAN UMUM

Route::get('/', [UmumController::class, 'index'])->name('umum.index'); // Rute untuk index
Route::get('/umum/produk', [UmumController::class, 'produk'])->name('umum.produk'); // Rute untuk index
Route::get('/umum/kategori', [UmumController::class, 'kategori'])->name('umum.kategori'); // Rute untuk index
Route::get('/Keranjang/index', [UmumController::class, 'keranjang'])->name('keranjang.index'); // Rute untuk index


//KERANJANG

Route::post('/produk/{produks}', [KeranjangController::class, 'input'])->name('produk.input'); // Rute untuk input


// HALAMAN LOGIN
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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

// PRODUK
Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index'); // Rute untuk index
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create'); // Rute untuk create
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store'); //ROUTE UNTUK STORE DATA
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit'); // Rute untuk edit
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update'); // Rute untuk update
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy'); // Rute untuk destroy
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// TRANSAKSI
Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index'); // Rute untuk index
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create'); // Rute untuk create
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store'); //ROUTE UNTUK STORE DATA
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit'); // Rute untuk edit
    Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update'); // Rute untuk update
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy'); // Rute untuk destroy
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// MEMBER
Route::middleware('auth')->group(function () {
    Route::get('/member', [MemberController::class, 'index'])->name('member.index'); // Rute untuk index
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create'); // Rute untuk create
    Route::post('/member', [MemberController::class, 'store'])->name('member.store'); //ROUTE UNTUK STORE DATA
    Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit'); // Rute untuk edit
    Route::put('/member/{member}', [MemberController::class, 'update'])->name('member.update'); // Rute untuk update
    Route::delete('/member/{member}', [MemberController::class, 'destroy'])->name('member.destroy'); // Rute untuk destroy
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
