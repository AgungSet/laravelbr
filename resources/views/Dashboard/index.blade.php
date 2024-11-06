@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-center text-gray-800 text-2xl font-light">!!Have a nice day and have a good work!!</h1>
        <h2 class="text-left text-gray-800 font-extrabold text-4xl">Dashboard</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
            <!-- Kolom Produk -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Produk</h5>
                    <p class="mb-4">Kelola dan lihat data produk batik yang tersedia.</p>
                </div>

                <!-- Angka Produk Aligned to the Right -->
                <p class="text-6xl font-bold mb-4 text-right">{{ $produks }}</p>

                <!-- Tombol di bagian bawah dengan efek hover -->
                <a href="#" class="bg-gold text-black px-4 py-2 rounded hover:bg-yellow-600">Lihat Produk</a>
            </div>



            <!-- Kolom Kategori -->
            <div class="bg-gray-500 text-white rounded-lg shadow-md p-6 flex flex-col justify-between h-full">
                <div>
                    <h5 class="text-xl font-semibold mb-2">Kategori</h5>
                    <p>Kelola dan lihat data kategori batik yang tersedia.</p>
                </div>

                <!-- Angka Produk Aligned to the Right with Button Next to It -->
                <div class="flex items-center justify-between">
                    <p class="text-6xl font-bold mb-4">{{ $kategoris }}</p>
                    <!-- Tombol kecil di samping kiri angka -->
                    <a href="#" class="bg-gold text-black px-3 py-1 rounded hover:bg-yellow-600 text-sm">Lihat Kategori</a>
                </div>
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
