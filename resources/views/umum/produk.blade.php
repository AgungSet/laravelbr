@extends('umum.layouts.app')
@section('content')
    <style>
        .product-card {
            transition: transform 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-img {
            height: 200px;
            object-fit: cover;
        }

        .pagination {
            margin-top: 20px;
            justify-content: center;
        }

        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
            color: white;
        }

        .pagination .page-item .page-link {
            color: #007bff;
        }

        .pagination .page-item .page-link:hover {
            color: white;
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>

    <div class="container py-4" id="products">
        <div class="row mb-4">
            <div class="col-md-8">
                <h2 class="fw-bold">Daftar Produk</h2>
            </div>
            <div class="col-md-4">
                <form method="GET" action="{{ route('umum.produk') }}">
                    <select name="kategori" id="kategori" class="form-select w-100" onchange="this.form.submit()">
                        <option value="">Semua</option>
                        @foreach (\App\Models\Kategori::all() as $kategori)
                            <option value="{{ $kategori->id }}" {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            @forelse ($produks as $produk)
                <div class="col-md-3 mb-4">
                    <div class="card product-card">
                        <img src="{{ asset($produk->foto) }}" class="card-img-top product-img" alt="{{ $produk->nama_produk }}" />
                        <div class="card-body">
                            <a href="#" class="h5 card-title text-dark" style="text-decoration: none;">{{ $produk->nama_produk }}</a>
                            <p class="card-text text-muted">
                                {{ Str::limit(strip_tags($produk->deskripsi), 80) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-warning">Rp {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                <span class="text-muted">Stok Tersedia: {{ $produk->stok }}</span>
                                <form action="{{ route('produk.input', $produk->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center" role="alert">
                        Tidak ada produk tersedia untuk kategori ini.
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Paginasi -->
        <div class="pagination">
            {{ $produks->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
