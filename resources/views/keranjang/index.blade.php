@extends('umum.layouts.app')
@section('content')
    <div class="container my-5">
        <h1 class="text-center mb-4">Keranjang Belanja Anda</h1>

        {{-- Cek jika keranjang kosong --}}
        @if ($keranjangproduks->isEmpty() && $keranjangproduknostoks->isEmpty())
            <p class="text-center text-muted">
                Keranjang anda kosong. <a href="{{ route('umum.produk') }}" class="text-decoration-none">Belanja sekarang!</a>
            </p>
        @else
            {{-- Form untuk Produk Biasa --}}
            <h3>Produk Biasa</h3>
            @if ($keranjangproduks->isNotEmpty())
                <div class="table-responsive">

                    <table class="table table-bordered text-center">
                        <thead class="table-warning">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalBiasa = 0; @endphp
                            @foreach ($keranjangproduks as $index => $keranjang)
                                @php
                                    $subtotal = 1 * $keranjang->produk->harga;
                                    $totalBiasa += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $keranjang->produk->foto) }}" alt="{{ $keranjang->produk->nama_produk }}" class="img-thumbnail" style="width: 100px; height: auto;">
                                        <p class="mt-2">{{ $keranjang->produk->nama_produk }}</p>
                                    </td>
                                    <td>{{ 1 }}</td>
                                    <td>Rp {{ number_format($keranjang->produk->harga, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST">
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
                                <td colspan="2" class="fw-bold">Rp {{ number_format($totalBiasa, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-end">
                        <form action="{{ route('keranjangproduk.checkout') }}" method="POST">
                            @csrf
                            <label for="catatan_transaksi">Catatan untuk Produk Biasa</label>
                            <textarea name="catatan_transaksi" class="form-control mb-2" placeholder="Contoh catatan"></textarea>
                            <button type="submit" class="btn btn-primary">Checkout Produk Biasa</button>
                        </form>
                    </div>

                </div>
            @else
                <p class="text-muted">Tidak ada produk biasa di keranjang Anda.</p>
            @endif

            {{-- Form untuk Produk No Stok --}}
            <h3 class="mt-5">Produk No Stok</h3>
            @if ($keranjangproduknostoks->isNotEmpty())
                <div class="table-responsive">

                    <table class="table table-bordered text-center">
                        <thead class="table-warning">
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Subtotal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalNoStok = 0; @endphp
                            @foreach ($keranjangproduknostoks as $index => $keranjang)
                                @php
                                    $subtotal = 1 * $keranjang->produknostok->harga;
                                    $totalNoStok += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $keranjang->produknostok->foto) }}" alt="{{ $keranjang->produknostok->nama_produk }}" class="img-thumbnail" style="width: 100px; height: auto;">
                                        <p class="mt-2">{{ $keranjang->produknostok->nama_produk }}</p>
                                    </td>
                                    <td>{{ 1 }}</td>
                                    <td>Rp {{ number_format($keranjang->produknostok->harga, 0, ',', '.') }}</td>
                                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('keranjang.destroy', $keranjang->id) }}" method="POST">
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
                                <td colspan="2" class="fw-bold">Rp {{ number_format($totalNoStok, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="text-end">
                        <form action="{{ route('keranjangproduknostok.checkout') }}" method="POST">
                            @csrf
                            <label for="catatan_pesanan">Catatan Pesanan</label>
                            <textarea name="catatan_pesanan" class="form-control mb-2" placeholder="Contoh catatan"></textarea>
                            <button type="submit" class="btn btn-warning">Checkout Produk No Stok</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-muted">Tidak ada produk no stok di keranjang Anda.</p>
            @endif
        @endif
    </div>
@endsection
