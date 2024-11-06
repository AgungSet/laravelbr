@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-center text-gray-800 text-2xl font-light">!!Have a nice day and have a good work!!</h1>
        <h2 class="text-left text-gray-800 font-extrabold text-4xl">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
            <!-- Kolom Produk -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-5 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Produk</h5>
                    <p>Kelola dan lihat data Produk batik yang tersedia.</p>
                </div>

                <!-- Angka Produk Aligned to the Right with Button Next to It -->
                <div class="flex flex-1 items-start justify-between">
                    <p class="text-6xl font-bold mb-4">{{ $produks }}</p>
                    <!-- Tombol kecil dengan margin atas untuk memberi jarak -->
                    <a href="{{ route('produk.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600 mt-2">Lihat Produk</a>


                </div>

            </div>




            <!-- Kolom Kategori -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Kategori</h5>
                    <p>Kelola dan lihat data kategori batik yang tersedia.</p>
                </div>

                <!-- Angka Produk Aligned to the Right with Button Next to It -->
                <div class="flex flex-1 items-start justify-between">
                    <p class="text-6xl font-bold mb-4">{{ $kategoris }}</p>
                    <!-- Tombol kecil dengan margin atas untuk memberi jarak -->
                    <a href="{{ route('kategori.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600 mt-2">Lihat Produk</a>
                </div>

            </div>
            <!-- Kolom Transaksi -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Transaksi</h5>
                    <p>Kelola dan lihat data transkasi penjualan saat ini</p>
                </div>

                <!-- Angka Produk Aligned to the Right with Button Next to It -->
                <div class="flex flex-1 items-start justify-between">
                    <p class="text-6xl font-bold mb-4">{{ $transaksis }}</p>
                    <!-- Tombol kecil dengan margin atas untuk memberi jarak -->
                    <a href="{{ route('transaksi.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600 mt-2">Lihat Transaksi</a>
                </div>

            </div>


            <!-- Kolom Member -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Member</h5>
                    <p>Kelola dan lihat data member yang tersedia.</p>
                </div>

                <!-- Angka Produk Aligned to the Right with Button Next to It -->
                <div class="flex flex-1 items-start justify-between">
                    <p class="text-6xl font-bold mb-4">{{ $members }}</p>
                    <!-- Tombol kecil dengan margin atas untuk memberi jarak -->
                    <a href="{{ route('member.index') }}" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600 mt-2">Lihat Member</a>
                </div>

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
