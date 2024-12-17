<?php

namespace Database\Seeders;

use App\Models\produknostok as ProduknoStokmodel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Produknostok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProduknoStokmodel::create([
            'nama_produknostok' => 'Kain Batik Tulis Motif Parang',
            'harga' => 250000,
            'foto' => 'sample.jpg', // Nama file gambar produk
            'deskripsi' => 'Kain batik tulis dengan motif parang klasik yang dibuat dengan tangan secara manual.',
            'id_kategori' => 1, // ID kategori (misalnya Batik Tulis)
        ]);

        ProduknoStokmodel::create([
            'nama_produknostok' => 'Batik Cap Motif Mega Mendung',
            'harga' => 150000,
            'foto' => 'sample.jpg',
            'deskripsi' => 'Batik cap dengan motif Mega Mendung yang sangat terkenal dan ikonik.',
            'id_kategori' => 2, // ID kategori (misalnya Batik Cap)
        ]);

        ProduknoStokmodel::create([
            'nama_produknostok' => 'Batik Kombinasi Motif Kawung dan Sekar Jagad',
            'harga' => 300000,

            'foto' => 'sample.jpg',
            'deskripsi' => 'Batik kombinasi dengan motif Kawung dan Sekar Jagad yang unik.',
            'id_kategori' => 3, // ID kategori (misalnya Batik Kombinasi)
        ]);

        ProduknoStokmodel::create([
            'nama_produknostok' => 'Batik Print Motif Bunga',
            'harga' => 80000,

            'foto' => 'sample.jpg',
            'deskripsi' => 'Batik print dengan motif bunga berwarna cerah dan modern.',
            'id_kategori' => 4, // ID kategori (misalnya Batik Print)
        ]);
    }
}
