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
        $kategoris = Kategori::all();
        return view('umum.produknostok', compact('produknostoks', 'kategoris'));
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
        $kategoris = Kategori::all();
        // Tampilkan view detail produk
        return view('umum.detail_produk', compact('produk', 'kategoris'));
    }
    public function detailproduknostok($id)
    {
        // Cari produknostok berdasarkan ID
        $produknostok = Produknostok::findOrFail($id);
        $kategoris = Kategori::all();
        // Tampilkan view detail produk
        return view('umum.detail_produknostok', compact('produknostok', 'kategoris'));
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
        // 1. Validasi dan ambil data keranjang
        $request->validate([
            'catatan_transaksi' => 'nullable|string|max:255',
        ]);

        $member = Auth::guard('member')->user();
        $keranjangs = Keranjang::with('produk')
            ->where('id_member', $member->id)
            ->whereNotNull('id_produk')
            ->get();

        if ($keranjangs->isEmpty()) {
            return redirect()->route('keranjang.index')->with('error', 'Keranjang Anda kosong.');
        }

        // 2. Hitung total harga dan siapkan detail item
        $totalHarga = 0;
        $itemDetails = [];
        foreach ($keranjangs as $keranjang) {
            $subtotal = $keranjang->produk->harga * $keranjang->jumlah;
            $totalHarga += $subtotal;
            $itemDetails[] = [
                'id' => $keranjang->produk->id,
                'price' => $keranjang->produk->harga,
                'quantity' => $keranjang->jumlah,
                'name' => $keranjang->produk->nama_produk,
            ];
        }

        // 3. Buat transaksi di database Anda
        $customId = $this->generateCustomId('TRN', transaksi::class);
        $transaksi = transaksi::create([
            'id' => $customId,
            'id_member' => $member->id,
            'catatan_transaksi' => $request->input('catatan_transaksi'),
            'tanggal' => now(),
            'total_harga_transaksi' => $totalHarga,
            'status_pesanan' => 'Belum Dibayar', // Status pesanan internal
            'payment_status' => 'pending', // Status pembayaran dari Midtrans
        ]);
        // dd($customId, $transaksi);
        // Simpan detail transaksi
        foreach ($keranjangs as $keranjang) {
            detailtransaksi::create([
                'id' => $this->generateCustomId('DTR', detailtransaksi::class),
                'id_transaksi' => $customId,
                'id_produk' => $keranjang->produk->id,
                'total_produk' => $keranjang->jumlah,
                'subtotal_harga_produk' => $keranjang->produk->harga * $keranjang->jumlah,
            ]);
            // Kurangi stok produk
            $keranjang->produk->decrement('stok', $keranjang->jumlah);
        }

        // 4. Konfigurasi Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('midtrans.is_3ds');

        // 5. Siapkan parameter untuk Midtrans
        $midtransParams = [
            'transaction_details' => [
                'order_id' => $customId, // Gunakan ID transaksi unik Anda
                'gross_amount' => $transaksi->total_harga_transaksi,
            ],
            'customer_details' => [
                'first_name' => $member->nama_customer,
                'email' => $member->email,
                'phone' => $member->no_hp,
                'address' => $member->alamat,
            ],
            'item_details' => $itemDetails,
            'enabled_payments' => ['gopay', 'shopeepay', 'bca_va', 'bni_va', 'bri_va', 'indomaret', 'alfamart'],
        ];

        // 6. Dapatkan Snap Token dari Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($midtransParams);

        // 7. Simpan Snap Token ke database dan kirim ke view
        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        // Hapus keranjang setelah checkout
        Keranjang::where('id_member', $member->id)->whereNotNull('id_produk')->delete();

        // 8. Redirect ke halaman pembayaran dengan Snap Token
        return view('pembayaran.index', compact('snapToken', 'transaksi'));
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
    public function pay(Transaksi $transaksi)
    {
        // Pastikan transaksi ini milik member yang sedang login
        if ($transaksi->id_member !== Auth::guard('member')->id()) {
            abort(403, 'Akses tidak diizinkan.');
        }

        // Pastikan transaksi masih pending
        if ($transaksi->payment_status !== 'pending') {
            return redirect()->route('umum.transaksi')->with('error', 'Transaksi ini sudah tidak bisa dibayar.');
        }

        // Ambil snap_token yang sudah tersimpan
        $snapToken = $transaksi->snap_token;

        // Jika karena suatu hal snap token tidak ada, buat yang baru
        if (!$snapToken) {
            // Logika untuk membuat snap token baru (sama seperti di checkout)
            // ... (bisa ditambahkan jika perlu, tapi seharusnya sudah ada)
            return redirect()->route('umum.transaksi')->with('error', 'Token pembayaran tidak ditemukan.');
        }

        return view('pembayaran.index', compact('snapToken', 'transaksi'));
    }
}
