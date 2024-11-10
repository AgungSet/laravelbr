<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\keranjang;
use App\Models\umum;
use Illuminate\Http\Request;

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
    public function getKeranjang()
    {
        $keranjangs = Keranjang::orderByDesc('created_at')->paginate(10);
        return $keranjangs;
    }
    public function store(Request $request)
    {
        // Anda dapat mengganti nilai request sesuai dengan yang Anda butuhkan.
        // Misalnya, Anda bisa memberikan ID kategori atau ID produk langsung tanpa menggunakan form input
        $id_kategori = 'nilai_id_kategorkji'; // Misalnya ini diambil dari tempat lain

        // Simpan data ke dalam Keranjang
        Keranjang::create([
            'id_produk' => $id_kategori,  // Ganti sesuai kebutuhan
            'id_member' => $id_kategori,  // Ganti sesuai kebutuhan
        ]);

        // Redirect ke halaman lain setelah aksi
        return to_route('umum.index');
    }
}
