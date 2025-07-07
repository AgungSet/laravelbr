<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');

        // Buat instance notifikasi Midtrans
        $notification = new Notification();
        dd($notification);
        // Ambil order_id dan status transaksi dari notifikasi
        $order_id = $notification->order_id;
        $transaction_status = $notification->transaction_status;
        $fraud_status = $notification->fraud_status;

        // Cari transaksi berdasarkan order_id
        $transaksi = transaksi::findOrFail($order_id);

        // Lakukan verifikasi signature key (penting untuk keamanan)
        $signature_key = hash('sha512', $order_id . $notification->status_code . $notification->gross_amount . config('midtrans.server_key'));
        if ($notification->signature_key != $signature_key) {
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // Update status transaksi berdasarkan notifikasi
        if ($transaction_status == 'capture') {
            if ($fraud_status == 'accept') {
                // Transaksi berhasil dan aman
                $transaksi->payment_status = 'success';
                $transaksi->status_pesanan = 'Diproses';
            }
        } else if ($transaction_status == 'settlement') {
            // Transaksi berhasil diselesaikan
            $transaksi->payment_status = 'success';
            $transaksi->status_pesanan = 'Diproses'; // Anda bisa update status pesanan di sini
        } else if ($transaction_status == 'pending') {
            // Transaksi masih menunggu pembayaran
            $transaksi->payment_status = 'pending';
        } else if ($transaction_status == 'deny') {
            // Transaksi ditolak
            $transaksi->payment_status = 'failed';
        } else if ($transaction_status == 'expire') {
            // Transaksi kadaluarsa
            $transaksi->payment_status = 'expired';
            // TODO: Kembalikan stok produk jika transaksi kadaluarsa
        } else if ($transaction_status == 'cancel') {
            // Transaksi dibatalkan
            $transaksi->payment_status = 'failed';
        }

        $transaksi->save();

        // Beri respons ke Midtrans bahwa notifikasi telah diterima
        return response()->json(['message' => 'Notification processed successfully']);
    }
}
