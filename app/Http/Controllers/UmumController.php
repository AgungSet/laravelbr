<?php

namespace App\Http\Controllers;

use App\Models\detailpesanan;
use App\Models\detailtransaksi;
use App\Models\Produk;
use App\Models\Produknostok;
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
        $produks = Produk::all();
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
        // Mendapatkan parameter kategori dari request
        $id_kategori = request('kategori');

        // Jika ada kategori yang dipilih, filter produk berdasarkan kategori tersebut
        if ($id_kategori) {
            $produks = Produk::where('id_kategori', $id_kategori)->paginate(8);
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua produk
            $produks = Produk::paginate(8);
        }
        $kategoris = Kategori::all();
        return view('umum.produk', compact('produks', 'kategoris'));
    }
    public function produknostok()
    {

        // Mendapatkan parameter kategori dari request
        $id_kategori = request('kategori');

        // Jika ada kategori yang dipilih, filter produk berdasarkan kategori tersebut
        if ($id_kategori) {
            $produknostoks = Produknostok::where('id_kategori', $id_kategori)->paginate(8);
        } else {
            // Jika tidak ada kategori yang dipilih, ambil semua produk
            $produknostoks = Produknostok::paginate(8);
        }
        return view('umum.produknostok', compact('produknostoks'));
    }


    public function keranjang()
    {
        // Ambil semua keranjang dengan relasi produk atau produk no stok
        $keranjang = Keranjang::with(['produk', 'produknostok'])
            ->where('id_member', Auth::guard('member')->id()) // Filter berdasarkan pengguna login
            ->get();

        // Pisahkan data berdasarkan jenis produk
        $keranjangproduks = $keranjang->filter(function ($item) {
            return $item->produk !== null; // Produk biasa
        });

        $keranjangproduknostoks = $keranjang->filter(function ($item) {
            return $item->produknostok !== null; // Produk no stok
        });

        return view('keranjang.index', compact('keranjangproduks', 'keranjangproduknostoks'));
    }
    public function detailproduk($id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::findOrFail($id);

        // Tampilkan view detail produk
        return view('umum.detail_produk', compact('produk'));
    }

    public function keranjangdestroy(keranjang $keranjang)
    {
        if ($keranjang->id_member != Auth::guard('member')->id()) {
            return redirect()->route('keranjang.index')->with('error', 'Akses tidak diizinkan.');
        }

        $keranjang->delete();
        return to_route('keranjang.index');
    }
    public function checkoutproduk(Request $request)
    {
        $request->validate([
            'catatan_transaksi' => 'nullable|string|max:255',
        ]);

        $keranjangs = Keranjang::all()
            ->where('id_produk', '!=', null)
            ->where('id_member', Auth::guard('member')->id());
        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }
        $totalHarga = $keranjangs->sum(fn($item) => $item->produk->harga * $item->jumlah);

        $customId = $this->generateCustomId('TRN', transaksi::class);
        // dd($customId); // Periksa nilai yang dikembalikan
        transaksi::create([
            'id' => $customId,
            'id_member' => Auth::guard('member')->id(),
            'catatan_transaksi' => $request->input('catatan_transaksi', null),
            'tanggal' => now(),
            'total_harga_transaksi' => $totalHarga,
            'status_transaksi' => 'Belum Dibayar',
        ]);
        $savedTransaksi = transaksi::find($customId);
        $detailPesanan = "";
        foreach ($keranjangs as $keranjang) {
            $produk = $keranjang->produk;

            if ($produk->stok < $keranjang->jumlah) {
                return redirect()->route('keranjang.index')->with('error', 'Stok produk ' . $produk->nama_produk . ' tidak mencukupi.');
            }

            $produk->decrement('stok', $keranjang->jumlah);

            DetailTransaksi::create([
                'id' => $this->generateCustomId('DTR', DetailTransaksi::class),
                'id_transaksi' => $savedTransaksi->id,
                'id_produk' => $produk->id,
                'total_produk' => $keranjang->jumlah,
                'subtotal_harga_produk' => $produk->harga * $keranjang->jumlah,
            ]);

            // Format detail pesanan untuk WhatsApp
            $detailPesanan .= "*Nama Produk:* {$produk->nama_produk}\n";
            $detailPesanan .= "*Jumlah:* {$keranjang->jumlah}\n";
            $detailPesanan .= "*Harga Satuan:* Rp " . number_format($produk->harga, 0, ',', '.') . "\n";
            $detailPesanan .= "*Subtotal:* Rp " . number_format($produk->harga * $keranjang->jumlah, 0, ',', '.') . "\n\n";
        }

        Keranjang::where('id_member', Auth::guard('member')->id())
            ->where('id_produk', '!=', null)->delete();
        $filtermember = Auth::guard('member')->id();
        $nama_customer = member::where('id', $filtermember)->pluck('nama_customer')->first();
        // WhatsApp redirect
        $whatsappNumber = "6285183287385";
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
    public function checkoutproduknostok(Request $request)
    {

        $request->validate([
            'catatan_pesanan' => 'nullable|string|max:255',
        ]);

        $keranjangs = Keranjang::all()
            ->where('id_produknostok', '!=', null)
            ->where('id_member', Auth::guard('member')->id());
        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }

        $totalHarga = $keranjangs->sum(fn($item) => $item->produknostok->harga * $item->jumlah);

        $customId = $this->generateCustomId('PES', pesanan::class);
        $pesanan = pesanan::create([
            'id' => $customId,
            'id_member' => Auth::guard('member')->id(),
            'catatan_pesanan' => $request->input('catatan_transaksi', null),
            'tanggal' => now(),
            'total_harga_pesanan' => $totalHarga,
            'status_pesanan' => 'Belum Dibayar',
        ]);

        $savedPesanan = pesanan::find($customId);
        $detailPesanan = "";
        foreach ($keranjangs as $keranjang) {
            $produk = $keranjang->produknostok;

            detailpesanan::create([
                'id' => $this->generateCustomId('DPS', detailpesanan::class),
                'id_pesanan' => $savedPesanan->id,
                'id_produknostok' => $produk->id,
                'total_produk' => $keranjang->jumlah,
                'subtotal_harga_produk' => $produk->harga * $keranjang->jumlah,
            ]);

            // Format detail pesanan untuk WhatsApp
            $detailPesanan .= "*Nama Produk:* {$produk->nama_produknostok}\n";
            $detailPesanan .= "*Jumlah:* {$keranjang->jumlah}\n";
            $detailPesanan .= "*Harga Satuan:* Rp " . number_format($produk->harga, 0, ',', '.') . "\n";
            $detailPesanan .= "*Subtotal:* Rp " . number_format($produk->harga * $keranjang->jumlah, 0, ',', '.') . "\n\n";
        }

        Keranjang::where('id_member', Auth::guard('member')->id())
            ->where('id_produknostok', '!=', null)
            ->delete();
        $filtermember = Auth::guard('member')->id();
        $nama_customer = member::where('id', $filtermember)->pluck('nama_customer')->first();
        // WhatsApp redirect
        $whatsappNumber = "6285183287385";
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

    public function transaksi()
    {
        $pesanans = pesanan::orderByDesc('created_at')->paginate(10);
        $transaksis = Transaksi::where('id_member', Auth::guard('member')->id())
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('umum.transaksi', compact('transaksis', 'pesanans'));
    }
    public function detailtransaksi($id)
    {
        $transaksi = Transaksi::with('detailTransaksi.produk')
            ->where('id_member', Auth::guard('member')->id())
            ->findOrFail($id);
        return view('umum.detailtransaksi', compact('transaksi'));
    }
    public function detailpesanan($id)
    {
        $pesanan = pesanan::with('detailpesanan.produknostok')
            ->where('id_member', Auth::guard('member')->id())
            ->findOrFail($id);
        return view('umum.detailpesanan', compact('pesanan'));
    }


    // public function show($produk)
    // {
    //     // Ambil produk berdasarkan id
    //     $produk = Produk::findOrFail($produk);
    //     return view('umum.produk.show', compact('produk')); // Mengarahkan ke halaman detail produk
    // }

    public function update(Request $request, $id)
    {
        $keranjang = Keranjang::findOrFail($id);

        if ($request->action === 'increase') {
            $keranjang->jumlah += 1;
        } elseif ($request->action === 'decrease' && $keranjang->jumlah > 1) {
            $keranjang->jumlah -= 1;
        }

        $keranjang->save();

        return redirect()->back()->with('success', 'Jumlah produk berhasil diperbarui.');
    }
    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}
