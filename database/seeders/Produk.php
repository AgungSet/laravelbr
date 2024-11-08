<?php

namespace Database\Seeders;

use App\Models\Produk as ModelsProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class Produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsProduk::create([
            'nama_produk' => 'Kain Batik Tulis Motif Parang',
            'harga' => 250000,
            'stok' => 10,
            'foto' => '1730791436_WhatsApp Image 2024-09-07 at 08.20.21_b394d81b.jpg', // Nama file gambar produk
            'deskripsi' => 'Kain batik tulis dengan motif parang klasik yang dibuat dengan tangan secara manual.',
            'id_kategori' => 1, // ID kategori (misalnya Batik Tulis)
        ]);

        ModelsProduk::create([
            'nama_produk' => 'Batik Cap Motif Mega Mendung',
            'harga' => 150000,
            'stok' => 20,
            'foto' => '1730791436_WhatsApp Image 2024-09-07 at 08.20.21_b394d81b.jpg',
            'deskripsi' => 'Batik cap dengan motif Mega Mendung yang sangat terkenal dan ikonik.',
            'id_kategori' => 2, // ID kategori (misalnya Batik Cap)
        ]);

        ModelsProduk::create([
            'nama_produk' => 'Batik Kombinasi Motif Kawung dan Sekar Jagad',
            'harga' => 300000,
            'stok' => 5,
            'foto' => '1730791436_WhatsApp Image 2024-09-07 at 08.20.21_b394d81b.jpg',
            'deskripsi' => 'Batik kombinasi dengan motif Kawung dan Sekar Jagad yang unik.',
            'id_kategori' => 3, // ID kategori (misalnya Batik Kombinasi)
        ]);

        ModelsProduk::create([
            'nama_produk' => 'Batik Print Motif Bunga',
            'harga' => 80000,
            'stok' => 15,
            'foto' => '1730791436_WhatsApp Image 2024-09-07 at 08.20.21_b394d81b.jpg',
            'deskripsi' => 'Batik print dengan motif bunga berwarna cerah dan modern.',
            'id_kategori' => 4, // ID kategori (misalnya Batik Print)
        ]);
    }
}
