@extends('umum.layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Produk Ready</h1>
        <div class="row">
            @foreach ($produks as $produk)
                <div class="col-md">
                    <div class="card h-100">
                        <!-- Gambar produk -->
                        <img src="{{ asset($produk->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}">

                        <div class="card-body">
                            <!-- Nama produk -->
                            <h5 class="card-title">{{ $produk->nama_produk }}</h5>

                            <!-- Deskripsi produk -->
                            <p class="card-text">{{ $produk->deskripsi }}</p>

                            <!-- Harga produk -->
                            <h6 class="price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h6>

                            <!-- Tombol tambah ke keranjang -->
                            <form action="{{ route('produk.input', ['produks' => $produk->id]) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('POST')
                                <button type="submit" class="btn-gold mt-3">Tambahkan ke Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container text-center my-5">
        <a href="#" class="btn btn-warning btn-lg">Lanjut ke Checkout</a>
    </div>
@endsection
