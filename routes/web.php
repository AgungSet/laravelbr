<?php

use App\Http\Controllers\MembereditController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProduknostokController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LoginmemberController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UmumController;
use Illuminate\Support\Facades\Route;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
//Halaman Login Umum
Route::get('/umum/register', [LoginmemberController::class, 'showRegisterForm'])->name('umum.register');
Route::post('/umum/register', [LoginmemberController::class, 'register'])->name('umum.registerpost');

Route::get('/umum/login', [LoginmemberController::class, 'showLoginForm'])->name('umum.login');
Route::post('/umum/login', [LoginmemberController::class, 'login'])->name('umum.loginpost');

Route::post('/umum/logout', [LoginmemberController::class, 'logout'])->name('umum.logout');
// HALAMAN UMUM
Route::get('/', [UmumController::class, 'index'])->name('umum.index');
Route::get('/umum/produk', [UmumController::class, 'produk'])->name('umum.produk');
Route::get('/umum/produk/{id}', [UmumController::class, 'detailproduk'])->name('umum.produk.detail');
Route::get('/umum/produknostok/{id}', [UmumController::class, 'detailproduknostok'])->name('umum.produknostok.detail');
Route::get('/umum/produknostok', [UmumController::class, 'produknostok'])->name('umum.produknostok');
Route::get('/umum/kategori', [UmumController::class, 'kategori'])->name('umum.kategori');
Route::get('/umum/transaksi', [UmumController::class, 'transaksi'])->name('umum.transaksi');
Route::get('/umum/transaksi/detail/{id}', [UmumController::class, 'detailtransaksi'])->name('umum.detailtransaksi');
Route::get('/umum/pesanan/detail/{id}', [UmumController::class, 'detailpesanan'])->name('umum.detailpesanan');

//memberedit
Route::middleware('auth:member')->group(function () {
    Route::get('/member/profile', [MembereditController::class, 'edit'])->name('member.profile.edit');
    Route::put('/member/profile/{member}', [MembereditController::class, 'update'])->name('member.profile.update');
});

//KERANJANG
Route::get('/keranjang/index', [UmumController::class, 'keranjang'])->name('keranjang.index');
Route::put('/keranjang/update/{id}', [UmumController::class, 'update'])->name('keranjang.update');
Route::delete('/keranjang/{keranjang}', [UmumController::class, 'keranjangdestroy'])->name('keranjang.destroy');

Route::post('/keranjang/checkoutproduk', [UmumController::class, 'checkoutproduk'])->name('keranjangproduk.checkout');
Route::post('/keranjang/checkoutproduknostok', [UmumController::class, 'checkoutproduknostok'])->name('keranjangproduknostok.checkout');

Route::post('/umum/produk/{produks}', [KeranjangController::class, 'input'])->name('produk.input');
Route::post('/umum/produknostok/{produknostoks}', [KeranjangController::class, 'produknostokinput'])->name('produknostok.input');

// MIDTRANS
Route::post('/midtrans/callback', [MidtransController::class, 'callback'])->name('midtrans.callback');

Route::get('/transaksi/pay/{transaksi}', [UmumController::class, 'pay'])->name('transaksi.pay')->middleware('auth:member');

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
    Route::get('/kategori', [KategoriController::class, 'input'])->name('kategori.input');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});

// PESANAN
Route::middleware('auth')->group(function () {
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/{pesanan}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::put('/pesanan/update/{pesanan}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::put('/pesanan/terbayar/{pesanan}', [PesananController::class, 'updateterbayar'])->name('pesanan.updateterbayar');
    Route::put('/pesanan/selesai/{pesanan}', [PesananController::class, 'updateselesai'])->name('pesanan.updateselesai'); // Rute untuk updatse
    Route::delete('/pesanan/{pesanan}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// PRODUK
Route::middleware('auth')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// PRODUKNOSTOK
Route::middleware('auth')->group(function () {
    Route::get('/produknostok', [ProduknostokController::class, 'index'])->name('produknostok.index');
    Route::get('/produknostok/create', [ProduknostokController::class, 'create'])->name('produknostok.create');
    Route::post('/produknostok', [ProduknostokController::class, 'store'])->name('produknostok.store');
    Route::get('/produknostok/{produknostok}/edit', [ProduknostokController::class, 'edit'])->name('produknostok.edit');
    Route::put('/produknostok/{produknostok}', [ProduknostokController::class, 'update'])->name('produknostok.update');
    Route::delete('/produknostok/{produknostok}', [ProduknostokController::class, 'destroy'])->name('produknostok.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// TRANSAKSI
Route::middleware('auth')->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('/transaksi/update/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::put('/transaksi/terbayar/{transaksi}', [TransaksiController::class, 'updateterbayar'])->name('transaksi.updateterbayar');
    Route::put('/transaksi/selesai/{transaksi}', [TransaksiController::class, 'updateselesai'])->name('transaksi.updateselesai'); // Rute untuk updatse
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// MEMBER
Route::middleware('auth')->group(function () {

    Route::get('/member/{id_member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::post('/logout', [MemberController::class, 'logout'])->name('logout');
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/{member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{member}', [MemberController::class, 'update'])->name('member.update');
    Route::delete('/member/{member}', [MemberController::class, 'destroy'])->name('member.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
