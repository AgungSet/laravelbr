@extends('umum.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row g-4 align-items-start">
        <!-- Gambar Produk no stok -->
        <div class="col-md-6">
            <div class="border rounded shadow-sm p-3 bg-white">
                <img src="{{ asset($produknostok->foto) }}" alt="{{ $produknostok->nama_produknostok }}" class="img-fluid w-100 rounded">
            </div>
        </div>

        <!-- Informasi produknostok -->
        <div class="col-md-6">
            <div class="border rounded shadow-sm p-4 bg-white text-black">
                <!-- Nama produknostok -->
                <h2 class="fw-bold mb-4" style="color: #000;">{{ $produknostok->nama_produknostok }}</h2>

                <!-- Harga -->
                <h3 class="fw-bold mb-4" style="color: #000;">Rp{{ number_format($produknostok->harga, 0, ',', '.') }}</h3>

                <!-- Stok -->
                <p class="mb-4">
                    <span class="fw-semibold" style="color: #000;">Stok Tersedia:</span>
                    <span class="badge bg-success">{{ $produknostok->stok }}</span>
                </p>

                <!-- Deskripsi -->
                <div class="mb-5">
                    <h6 class="fw-semibold mb-2" style="color: #000;">Deskripsi Produknostok</h6>
                    <p class="text-black" style="text-align: justify;">{!! nl2br(e($produknostok->deskripsi)) !!}</p>
                </div>

                <!-- Tombol Aksi -->
                <form action="{{ route('produknostok.input', $produknostok->id) }}" method="POST" class="mb-3">
                    @csrf
                    <button type="submit" class="btn btn-warning w-100 py-2 fs-5">
                        <i class="bi bi-cart-plus me-2"></i> Tambah ke Keranjang
                    </button>
                </form>

                <a href="{{ route('umum.produknostok') }}" class="btn btn-outline-secondary w-100 py-2 fs-6">
                    ← Kembali ke Produknostok
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
