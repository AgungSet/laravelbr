@extends('umum.layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Detail Transaksi</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Transaksi</h5>
                <p><strong>ID Transaksi:</strong> {{ $transaksi->id }}</p>
                <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
                <p><strong>Status Pembayaran:</strong>
                    @if ($transaksi->payment_status == 'success')
                        <span class="badge bg-success">Berhasil</span>
                    @elseif ($transaksi->payment_status == 'pending')
                        <span class="badge bg-warning">Menunggu Pembayaran</span>
                    @else
                        <span class="badge bg-danger">Gagal/Kadaluarsa</span>
                    @endif
                </p>
                <p><strong>Status Pesanan:</strong> <span class="badge bg-secondary">{{ $transaksi->status_pesanan }}</span></p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga_transaksi, 0, ',', '.') }}</p>
                <p><strong>Catatan:</strong> {{ $transaksi->catatan_transaksi ?? 'Tidak ada catatan' }}</p>

                {{-- Jika transaksi masih pending, tampilkan tombol bayar --}}
                @if ($transaksi->payment_status == 'pending' && $transaksi->snap_token)
                    <a href="{{ route('transaksi.pay', $transaksi->id) }}" class="btn btn-success mt-3">Lanjutkan Pembayaran</a>
                @endif
            </div>
        </div>

        <h5 class="mb-3">Detail Produk</h5>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-info">
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah</th>
                        <th>Harga Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->detailTransaksi as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $detail->produk->nama_produk }}</td>
                            <td>{{ $detail->total_produk }}</td>
                            <td>Rp {{ number_format($detail->produk->harga, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($detail->subtotal_harga_produk, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
