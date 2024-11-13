<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginmemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmumController;
use Illuminate\Support\Facades\Route;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
//Halaman Login Umum
Route::get('/umum/register', [LoginmemberController::class, 'showRegisterForm'])->name('umum.register');
Route::post('/umum/register', [LoginmemberController::class, 'register']);

Route::get('/umum/login', [LoginmemberController::class, 'showLoginForm'])->name('umum.login');
Route::post('/umum/login', [LoginmemberController::class, 'login']);

Route::post('/umum/logout', [LoginmemberController::class, 'logout'])->name('umum.logout');
// HALAMAN UMUM
Route::get('/', [UmumController::class, 'index'])->name('umum.index'); // Rute untuk index
Route::get('/umum/produk', [UmumController::class, 'produk'])->name('umum.produk'); // Rute untuk index
Route::get('/umum/kategori', [UmumController::class, 'kategori'])->name('umum.kategori'); // Rute untuk index
Route::get('/Keranjang/index', [UmumController::class, 'keranjang'])->name('keranjang.index'); // Rute untuk index
Route::get('/umum/pesanan', [UmumController::class, 'pesanan'])->name('umum.pesanan'); // Rute untuk index
// Route::get('produk/{id}', [ProdukController::class, 'show'])->name('produk.show');

//PROFILE
Route::middleware('auth:member')->group(function () {
    Route::get('/member/profile', [LoginmemberController::class, 'editProfile'])->name('member.profile.edit');
    Route::put('/member/profile', [LoginmemberController::class, 'updateProfile'])->name('member.profile.update');
});

//KERANJANG

Route::post('/umum/produk/{produks}', [KeranjangController::class, 'input'])->name('produk.input'); // Rute untuk input


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
    Route::get('/kategori', [KategoriController::class, 'input'])->name('kategori.input'); // Rute untuk input
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index'); // Rute untuk index
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create'); // Rute untuk create
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store'); //ROUTE UNTUK STORE DATA
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit'); // Rute untuk edit
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update'); // Rute untuk update
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy'); // Rute untuk destroy
});

// PESANAN
Route::middleware('auth')->group(function () {
    // Route::get('/pesanan', [PesananController::class, 'inputpesanan'])->name('pesanan.inputpesanan'); // Rute untuk input
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index'); // Rute untuk index
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create'); // Rute untuk create
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store'); //ROUTE UNTUK STORE DATA
    Route::get('/pesanan/{pesanan}/edit', [PesananController::class, 'edit'])->name('pesanan.edit'); // Rute untuk edit
    Route::put('/pesanan/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update'); // Rute untuk update
    Route::delete('/pesanan/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.destroy'); // Rute untuk destroy
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
