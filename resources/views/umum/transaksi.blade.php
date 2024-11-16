@extends('umum.layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Riwayat Transaksi</h1>

        @if ($transaksis->isEmpty())
            <p class="text-center text-muted">Anda belum memiliki transaksi. <a href="{{ route('produk.index') }}" class="text-decoration-none">Belanja sekarang!</a></p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Tanggal Transaksi</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis as $index => $transaksi)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $transaksi->tanggal }}</td>
                                <td>Rp {{ number_format($transaksi->total_harga_transaksi, 0, ',', '.') }}</td>
                                <td>
                                    <span class="badge
                                        {{ $transaksi->status_transaksi == 'Belum Dibayar' ? 'bg-danger' : 'bg-success' }}">
                                        {{ $transaksi->status_transaksi }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('umum.detailtransaksi', $transaksi->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
