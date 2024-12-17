@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-center text-gray-800 text-2xl font-light mb-6">!!Have a nice day and have a good work!!</h1>
        <h2 class="text-left text-gray-800 font-extrabold text-4xl mb-8">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Kolom Produk -->
            <div class="bg-brown-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Produk</h5>
                    <p class="text-sm">Kelola dan lihat data Produk batik yang tersedia.</p>
                </div>
                <div class="flex items-start justify-between mt-6">
                    <p class="text-6xl font-bold">{{ $produks }}</p>
                    <a href="{{ route('produk.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-500">Lihat Produk</a>
                </div>
            </div>

            <!-- Kolom Produk No Stok -->
            <div class="bg-brown-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Produk No Stok</h5>
                    <p class="text-sm">Kelola dan lihat data Produk batik yang tersedia.</p>
                </div>
                <div class="flex items-start justify-between mt-6">
                    <p class="text-6xl font-bold">{{ $produknostoks }}</p>
                    <a href="{{ route('produknostok.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-500">Lihat Produk</a>
                </div>
            </div>

            <!-- Kolom Kategori -->
            <div class="bg-brown-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Kategori</h5>
                    <p class="text-sm">Kelola dan lihat data kategori batik yang tersedia.</p>
                </div>
                <div class="flex items-start justify-between mt-6">
                    <p class="text-6xl font-bold">{{ $kategoris }}</p>
                    <a href="{{ route('kategori.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-500">Lihat Kategori</a>
                </div>
            </div>

            <!-- Kolom Transaksi -->
            <div class="bg-brown-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Transaksi</h5>
                    <p class="text-sm">Kelola dan lihat data transaksi penjualan saat ini.</p>
                </div>
                <div class="flex items-start justify-between mt-6">
                    <p class="text-6xl font-bold">{{ $transaksis }}</p>
                    <a href="{{ route('transaksi.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-500">Lihat Transaksi</a>
                </div>
            </div>

            <!-- Kolom Member -->
            <div class="bg-brown-900 text-white rounded-lg shadow-md p-6 flex flex-col justify-between">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Member</h5>
                    <p class="text-sm">Kelola dan lihat data member yang tersedia.</p>
                </div>
                <div class="flex items-start justify-between mt-6">
                    <p class="text-6xl font-bold">{{ $members }}</p>
                    <a href="{{ route('member.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-500">Lihat Member</a>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    /* Warna khusus */
    .bg-gold {
        background-color: #D4A017;
        /* Warna emas kecoklatan */
    }

    .bg-brown-900 {
        background-color: #333;
        /* Warna hitam kecoklatan lebih gelap */
    }
</style>
