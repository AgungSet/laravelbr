@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-center text-gray-800 text-2xl font-bold">Selamat Datang di Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
            <!-- Kolom Produk -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Produk</h5>
                    <p class="mb-4">Kelola dan lihat data produk batik yang tersedia.</p>
                </div>

                <!-- Menampilkan jumlah produk dengan ukuran besar -->
                <p class="text-6xl font-bold mb-4">{{ $produks }}</p>

                <!-- Tombol di bagian bawah -->
                <a href="{{ route('produk.index') }}" class="bg-yellow-500 text-black px-4 py-2 rounded hover:bg-yellow-600 mt-auto">Lihat Produk</a>
            </div>

            <!-- Kolom Kategori -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6">
                <h5 class="text-xl font-semibold mb-2">Kategori</h5>
                <p class="mb-4">Atur dan lihat kategori produk yang ada.</p>
                <a href="#" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600">Lihat Kategori</a>
            </div>

            <!-- Kolom Member -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6">
                <h5 class="text-xl font-semibold mb-2">Member</h5>
                <p class="mb-4">Lihat dan kelola data member atau pelanggan.</p>
                <a href="#" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600">Lihat Member</a>
            </div>

            <!-- Kolom Pesanan -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6">
                <h5 class="text-xl font-semibold mb-2">Pesanan</h5>
                <p class="mb-4">Pantau dan kelola pesanan yang masuk.</p>
                <a href="#" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600">Lihat Pesanan</a>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Warna khusus */
    .bg-gold {
        background-color: #d4af37;
        /* Warna emas */
    }
</style>
