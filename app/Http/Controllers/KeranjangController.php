<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\keranjang;
use App\Models\Pesanan;
use App\Models\produknostok;
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
        $id_kategori = Produk::find($produks)->id_kategori;
        // jika sudah ada maka menambah jika belum maka membuat
        if (Keranjang::where('id_produk', $produks)->where('id_member', $id_member)->exists()) {
            Keranjang::where('id_produk', $produks)->where('id_member', $id_member)->update([
                'jumlah' => Keranjang::where('id_produk', $produks)->where('id_member', $id_member)->first()->jumlah + 1
            ]);
        } else {
            Keranjang::create([
                'id' => $this->generateCustomId('KRN', keranjang::class),
                'id_produk' => $produks,
                'id_member' => $id_member,
                'jumlah' => 1
            ]);
        }
        // Redirect ke halaman lain setelah aksi
        return to_route('umum.produk', ['kategori' => $id_kategori]);
        return to_route('umum.produk');
    }
    public function produknostokinput($produknostoks)
    {
        // Simpan data ke dalam Keranjang
        if (Auth::guard('member')->id() == null) {
            return to_route('umum.login');
        }
        $id_kategori = produknostok::find($produknostoks)->id_kategori;
        $id_member = Auth::guard('member')->id();
        // jika sudah ada maka menambah jika belum maka membuat
        if (Keranjang::where('id_produknostok', $produknostoks)->where('id_member', $id_member)->exists()) {
            Keranjang::where('id_produknostok', $produknostoks)->where('id_member', $id_member)->update([
                'jumlah' => Keranjang::where('id_produknostok', $produknostoks)->where('id_member', $id_member)->first()->jumlah + 1
            ]);
        } else {
            Keranjang::create([
                'id' => $this->generateCustomId('KRN', keranjang::class),
                'id_produknostok' => $produknostoks,
                'id_member' => $id_member,
                'jumlah' => 1
            ]);
        }
        // Redirect ke halaman lain setelah aksi
        return to_route('umum.produknostok', ['kategori' => $id_kategori]);
        return to_route('umum.produknostok');
    }
    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}
