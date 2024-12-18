@extends('umum.layouts.app')
@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Produk Pesanan</h1>
        <div class="row">
            @foreach ($produknostoks as $produknostok)
                <div class="col-md">
                    <div class="card h-100">
                        <!-- Gambar produknostok -->
                        <img src="{{ asset($produknostok->foto) }}" class="card-img-top" alt="{{ $produknostok->nama_produknostok }}">

                        <div class="card-body">
                            <!-- Nama produknostok -->
                            <h5 class="card-title">{{ $produknostok->nama_produknostok }}</h5>

                            <!-- Deskripsi produknostok -->
                            <p class="card-text">{{ $produknostok->deskripsi }}</p>

                            <!-- Harga produknostok -->
                            <h6 class="price">Rp {{ number_format($produknostok->harga, 0, ',', '.') }}</h6>

                            <!-- Tombol tambah ke keranjang -->
                            <form action="{{ route('produknostok.input', ['produknostoks' => $produknostok->id]) }}" method="POST" style="display: inline-block;">
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
