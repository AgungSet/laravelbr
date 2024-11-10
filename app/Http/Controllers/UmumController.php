<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\keranjang;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    public function index()
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);
        $kategoris = Kategori::all();

        return view('umum.index', compact('produks', 'kategoris'));
    }

    public function produk()
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);
        return view('umum.produk', compact('produks'));
    }

    public function keranjang()
    {
        $keranjangs = keranjang::orderByDesc('created_at')->paginate(10);
        return view('keranjang.index', compact('keranjangs'));
    }

    // public function show($produk)
    // {
    //     // Ambil produk berdasarkan id
    //     $produk = Produk::findOrFail($produk);
    //     return view('umum.produk.show', compact('produk')); // Mengarahkan ke halaman detail produk
    // }
}
