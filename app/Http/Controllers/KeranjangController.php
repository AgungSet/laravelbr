<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\keranjang;
use App\Models\Pesanan;
use App\Models\umum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);
        return view('umum.index', compact('produks'));
    }
    public function produk()
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);
        return view('umum.produk', compact('produks'));
    }
    // public function indexpesanan()
    // {
    //     $produks = Produk::orderByDesc('created_at')->paginate(10);
    //     return view('umum.indexpesanan', compact('pesanan'));
    // }
    // public function pesanan()
    // {
    //     $pesanan = Pesanan::orderByDesc('created_at')->paginate(10);
    //     return view('umum.pesanan', compact('pesanans'));
    // }
    public function getKeranjang()
    {
        $keranjangs = Keranjang::orderByDesc('created_at')->paginate(10);
        return $keranjangs;
    }
    public function input($produks)
    {
        // Simpan data ke dalam Keranjang
        if (Auth::guard('member')->id() == null) {
            return to_route('umum.login');
        }
        $id_member = Auth::guard('member')->id();

        Keranjang::create([
            'id_produk' => $produks,
            'id_member' => $id_member,
        ]);

        // Redirect ke halaman lain setelah aksi
        return to_route('umum.produk');
    }
}
