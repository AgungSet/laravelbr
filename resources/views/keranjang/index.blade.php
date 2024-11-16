@extends('keranjang.layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Keranjang Belanja Anda</h1>

        @if ($keranjangs->isEmpty())
            <p class="text-center text-muted">Keranjang anda kosong. <a href="{{ route('produk.index') }}" class="text-decoration-none">Belanja sekarang!</a></p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>produk</th>
                            <th>Jumlah</th>
                            <th>Harga Satuan</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach ($keranjangs as $index => $keranjang)
                            @php
                                $subtotal = $keranjang->jumlah * $keranjang->produk->harga;
                                $total += $subtotal;
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $keranjang->produk->gambar) }}" alt="{{ $keranjang->produk->nama }}" class="img-thumbnail" style="width: 100px; height: auto;">
                                    <p class="mt-2">{{ $keranjang->produk->nama }}</p>
                                </td>
                                <td>{{ $keranjang->jumlah }}</td>
                                <td>Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end fw-bold">Total</td>
                            <td colspan="2" class="fw-bold">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end">
                <a href="{{ route('checkout') }}" class="btn btn-warning btn-lg">Lanjut ke Checkout</a>
            </div>
        @endif
    </div>
@endsection
