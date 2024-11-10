@extends('umum.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kategori Ready</title>
        <!-- Menambahkan Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

        <!-- Menambahkan CSS tambahan untuk styling -->
        <style>
            body {
                font-family: 'Poppins', sans-serif;
                background-color: #f8f9fa;
                color: #333;
            }

            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 20px;
            }

            .text-center {
                text-align: center;
            }

            .row {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
            }

            .col-md {
                flex: 1 1 calc(33.333% - 20px);
                box-sizing: border-box;
            }

            .card {
                background-color: #fff;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            }

            .card-img-top {
                width: 100%;
                height: 200px;
                object-fit: cover;
                transition: transform 0.5s ease;
            }

            .card-img-top:hover {
                transform: scale(1.1);
            }

            .card-body {
                padding: 20px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .card-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: #333;
            }

            .card-text {
                font-size: 1rem;
                color: #777;
                margin-bottom: 15px;
            }

            .price {
                font-size: 1.25rem;
                font-weight: 600;
                color: #e74c3c;
                margin-top: auto;
            }

            .btn-gold {
                background-color: #f39c12;
                color: #fff;
                font-weight: 600;
                border: none;
                padding: 12px 25px;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .btn-gold:hover {
                background-color: #e67e22;
                transform: translateY(-2px);
            }

            @media (max-width: 768px) {
                .col-md {
                    flex: 1 1 calc(50% - 20px);
                }
            }

            @media (max-width: 576px) {
                .col-md {
                    flex: 1 1 100%;
                }
            }
        </style>
    </head>

    <body>

        <div class="container">
            <h1 class="text-center mb-4">Kategori</h1>
            <div class="row">
                @foreach ($kategoris as $kategori)
                    <div class="col-md">
                        <div class="card h-100">
                            <!-- Gambar kategori -->
                            <img src="{{ asset('uploads/' . $kategori->foto) }}" class="card-img-top" alt="{{ $kategori->nama_kategori }}">

                            <div class="card-body">
                                <!-- Nama kategori -->
                                <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>

                                <!-- Deskripsi kategori -->
                                <p class="card-text">{{ $kategori->deskripsi }}</p>

                                <!-- Harga kategori -->
                                <h6 class="price">Rp {{ number_format($kategori->harga, 0, ',', '.') }}</h6>

                                <!-- Tombol tambah ke keranjang -->
                                <form action="{{ route('kategori.input', $kategori->id) }}" method="POST" style="display: inline-block;">
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

    </body>

    </html>


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
                        <form action="{{ route('produk.input', $produks) }}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                            @csrf
                            @method('post')
                            <button type="submit" class="btn btn-warning mt-3">Tambahkan ke Keranjang< </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
    <div class="container text-center my-5">
        <a href="#" class="btn btn-warning btn-lg">Lanjut ke Checkout</a>
    </div>
@endsection
