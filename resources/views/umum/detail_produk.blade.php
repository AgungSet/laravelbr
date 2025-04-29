@extends('umum.layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row g-4">
            <!-- Bagian Gambar Produk -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <img src="{{ asset($produk->foto) }}" class="card-img-top img-fluid rounded" alt="{{ $produk->nama_produk }}">
                </div>
            </div>

            <!-- Bagian Detail Produk -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 text-center font-weight-bold">{{ $produk->nama_produk }}</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-3">
                            <strong>Deskripsi:</strong> {{ $produk->deskripsi }}
                        </p>
                        <p class="card-text mb-3">
                            <strong>Harga:</strong> <span class="text-success">Rp{{ number_format($produk->harga, 0, ',', '.') }}</span>
                        </p>
                        <p class="card-text mb-4">
                            <strong>Stok:</strong> <span class="badge bg-secondary">{{ $produk->stok }}</span>
                        </p>

                        <!-- Tombol Tambah ke Keranjang -->
                        <form action="{{ route('produk.input', $produk->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-lg w-100 mb-2">
                                <i class="bi bi-cart-plus"></i> Tambah ke Keranjang
                            </button>
                        </form>

                        <!-- Tombol Kembali -->
                        <a href="{{ route('umum.produk') }}" class="btn btn-secondary btn-lg w-100">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
