@extends('umum.layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Detail Transaksi</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Informasi Transaksi</h5>
                <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
                <p><strong>Status:</strong> {{ $transaksi->status_transaksi }}</p>
                <p><strong>Total Harga:</strong> Rp {{ number_format($transaksi->total_harga_transaksi, 0, ',', '.') }}</p>
                <p><strong>Catatan:</strong> {{ $transaksi->catatan_transaksi ?? 'Tidak ada catatan' }}</p>
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
