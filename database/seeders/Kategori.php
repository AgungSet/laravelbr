<?php

namespace Database\Seeders;

use App\Models\Kategori as ModelsKategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsKategori::create([
            'nama_kategori' => 'Batik Tulis',
            'deskripsi' => 'Produk batik yang dibuat dengan teknik tulis secara manual menggunakan canting dan lilin panas.'
        ]);

        ModelsKategori::create([
            'nama_kategori' => 'Batik Cap',
            'deskripsi' => 'Batik yang dibuat dengan teknik cap menggunakan stempel atau cap yang dicelupkan pada lilin panas.'
        ]);

        ModelsKategori::create([
            'nama_kategori' => 'Batik Kombinasi',
            'deskripsi' => 'Produk batik dengan kombinasi teknik tulis dan cap untuk memberikan detail yang berbeda.'
        ]);

        ModelsKategori::create([
            'nama_kategori' => 'Batik Print',
            'deskripsi' => 'Batik yang dibuat dengan teknik cetak menggunakan mesin atau sablon untuk mempercepat produksi.'
        ]);

        ModelsKategori::create([
            'nama_kategori' => 'Kain Mori',
            'deskripsi' => 'Kain yang digunakan sebagai bahan dasar untuk membuat batik, baik tulis maupun cap.'
        ]);

        ModelsKategori::create([
            'nama_kategori' => 'Pewarna Batik Alami',
            'deskripsi' => 'Bahan pewarna alami yang digunakan dalam pembuatan batik untuk menghasilkan warna yang ramah lingkungan.'
        ]);
    }
}
