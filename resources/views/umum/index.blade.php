@extends('umum.layouts.app')

@section('content')
    <!-- Container Selamat Datang -->
    <div class="text-center my-5" style="background-color: #f8f9fa; padding: 0; border-radius: 10px;">
        <h1 style="font-family: 'Georgia', serif; font-size: 2.5em; color: #333;">
            SELAMAT DATANG DI MURIA BATIK KUDUS
        </h1>
        <p class="lead" style="font-size: 1.2em; color: #555;">
            Temukan koleksi batik terbaik Anda di Muria Batik Kudus.
        </p>
    </div>

    <!-- Gambar Full Width -->
    <img src="{{ asset('img/bghome.png') }}" alt="Batik Kudus" class="img-fluid w-100" style="border: 3px solid #ddd;">

    <!-- Daftar Produk -->
    {{-- <div class="container mt-5">
        <h2 class="text-center mb-4" style="font-family: 'Georgia', serif; color: #333;">Koleksi Produk Kami</h2>
        <div class="row">
            <!-- Loop through produk -->
            @foreach ($produks as $item)
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">{{ Str::limit($item->description, 100) }}</p>
                            <a href="{{ route('produk', $item->id) }}" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
@endsection
