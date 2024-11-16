<?php

namespace App\Http\Controllers;

use App\Models\detailtransaksi;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\keranjang;
use App\Models\member;
use App\Models\pesanan;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmumController extends Controller
{
    public function index()
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);
        $kategoris = Kategori::all();

        return view('umum.index', compact('produks', 'kategoris'));
    }

    public function kategori()
    {

        $kategoris = Kategori::all();
        $produks = Produk::all();
        return view('umum.kategori', compact('kategoris', 'produks'));
    }

    public function produk()
    {

        $produks = Produk::orderByDesc('created_at')->paginate(10);
        return view('umum.produk', compact('produks'));
    }

    public function keranjang()
    {
        $keranjangs = Keranjang::with('produk')
            ->where('id_member', Auth::guard('member')->id()) // Filter berdasarkan pengguna login
            ->get();
        return view('keranjang.index', compact('keranjangs'));
    }
    public function keranjangdestroy(keranjang $keranjang)
    {
        if ($keranjang->id_member != Auth::guard('member')->id()) {
            return redirect()->route('keranjang.index')->with('error', 'Akses tidak diizinkan.');
        }

        $keranjang->delete();
        return to_route('keranjang.index');
    }
    public function checkout(Request $request)
    {
        $request->validate([
            'catatan_transaksi' => 'nullable|string|max:255',
        ]);

        $keranjangs = Keranjang::all()
            ->where('id_member', Auth::guard('member')->id());
        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }

        $totalHarga = $keranjangs->sum(fn($item) => $item->produk->harga);

        $transaksi = Transaksi::create([
            'id_member' => Auth::guard('member')->id(),
            'catatan_transaksi' => $request->input('catatan_transaksi', null),
            'tanggal' => now(),
            'total_harga_transaksi' => $totalHarga,
            'status_transaksi' => 'Belum Dibayar',
        ]);
        $detailPesanan = "";
        foreach ($keranjangs as $keranjang) {
            $produk = $keranjang->produk;

            if ($produk->stok < 1) {
                return redirect()->route('keranjang.index')->with('error', 'Stok produk ' . $produk->nama_produk . ' tidak mencukupi.');
            }

            $produk->decrement('stok', 1);

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_produk' => $produk->id,
                'total_produk' => 1,
                'subtotal_harga_produk' => $produk->harga,
            ]);

            // Format detail pesanan untuk WhatsApp
            $detailPesanan .= "*Nama Produk:* {$produk->nama_produk}\n";
            $detailPesanan .= "*Jumlah:* 1\n";
            $detailPesanan .= "*Harga Satuan:* Rp " . number_format($produk->harga, 0, ',', '.') . "\n";
            $detailPesanan .= "*Subtotal:* Rp " . number_format($produk->harga, 0, ',', '.') . "\n\n";
        }

        Keranjang::where('id_member', Auth::guard('member')->id())->delete();
        $filtermember = Auth::guard('member')->id();
        $nama_customer = member::where('id', $filtermember)->pluck('nama_customer')->first();
        // WhatsApp redirect
        $whatsappNumber = "6285728368250";
        $whatsappMessage = urlencode(
            "Halo Admin,\n\nSaya telah melakukan checkout. Berikut adalah detail transaksi saya:\n\n" .
                "*Tanggal Transaksi:* " . now()->format('d-m-Y H:i:s') . "\n" .
                "*Nama Member:* " . $nama_customer . "\n" .
                "*Catatan:* " . ($request->input('catatan_transaksi', 'Tidak ada catatan')) . "\n" .
                "*Total Harga:* Rp " . number_format($totalHarga, 0, ',', '.') . "\n\n" .
                "*Detail Pesanan:*\n" .
                $detailPesanan .
                "Terima kasih!"
        );

        return redirect("https://wa.me/{$whatsappNumber}?text={$whatsappMessage}");
    }



    public function pesanan()
    {
        $pesanans = pesanan::orderByDesc('created_at')->paginate(10);
        return view('umum.pesanan', compact('pesanans'));
    }
    public function transaksi()
    {
        $transaksis = Transaksi::where('id_member', Auth::guard('member')->id())
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('umum.transaksi', compact('transaksis'));
    }
    public function detailtransaksi($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.produk')
            ->where('id_member', Auth::guard('member')->id())
            ->findOrFail($id);
        return view('umum.detailtransaksi', compact('transaksi'));
    }


    // public function show($produk)
    // {
    //     // Ambil produk berdasarkan id
    //     $produk = Produk::findOrFail($produk);
    //     return view('umum.produk.show', compact('produk')); // Mengarahkan ke halaman detail produk
    // }
}
