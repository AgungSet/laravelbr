@extends('umum.layouts.app')
@section('content')
    <h1>HALAMAN PRODUK</h1>
    <h1 class="text-center mb-4">Produk Ready</h1>
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('uploads/' . $produk->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ $produk->deskripsi }}</p>
                        <h6 class="mt-auto text-danger">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h6>
                        <button class="btn btn-warning mt-3">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <h1 class="text-center mb-4">Produk Pesanan</h1>
    <div class="row">
        @foreach ($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ asset('uploads/' . $produk->foto) }}" class="card-img-top" alt="{{ $produk->nama_produk }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                        <p class="card-text">{{ $produk->deskripsi }}</p>
                        <h6 class="mt-auto text-danger">Rp {{ number_format($produk->harga, 0, ',', '.') }}</h6>
                        <button class="btn btn-warning mt-3">Tambahkan ke Keranjang</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container text-center my-5">
        <a href="#" class="btn btn-warning btn-lg">Lanjut ke Checkout</a>
    </div>
@endsection
