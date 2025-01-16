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
        $categories = [
            [
                'nama_kategori' => 'Batik tulis variasi cap',
                'deskripsi' => 'Batik dengan kombinasi antara teknik tulis dan cap.',
            ],
            [
                'nama_kategori' => 'Sarung Batik',
                'deskripsi' => 'Sarung yang dihiasi dengan motif batik khas.',
            ],
            [
                'nama_kategori' => 'Batik Cap Satu Warna',
                'deskripsi' => 'Batik cap dengan motif sederhana dalam satu warna.',
            ],
            [
                'nama_kategori' => 'Batik Cap Variasi Nitik',
                'deskripsi' => 'Batik cap dengan variasi motif nitik.',
            ],
            [
                'nama_kategori' => 'Kaos',
                'deskripsi' => 'Kaos berbahan nyaman dengan motif batik.',
            ],
            [
                'nama_kategori' => 'Kemeja Batik',
                'deskripsi' => 'Kemeja dengan desain formal bermotif batik.',
            ],
            [
                'nama_kategori' => 'Outer',
                'deskripsi' => 'Outerwear dengan desain unik berbahan batik.',
            ],
            [
                'nama_kategori' => 'Slint Bag',
                'deskripsi' => 'Tas kecil dengan motif batik.',
            ],
            [
                'nama_kategori' => 'Syal Cotton Bamboo',
                'deskripsi' => 'Syal berbahan cotton bamboo dengan motif batik.',
            ],
        ];
        // Menentukan ID untuk setiap kategori dengan format KAT0000001, KAT0000002, dll
        $lastCategory = DB::table('kategoris')->orderBy('id', 'desc')->first();
        $lastId = $lastCategory ? (int)substr($lastCategory->id, 3) : 0;

        $categoriesWithId = array_map(function ($category) use (&$lastId) {
            $lastId++;
            $category['id'] = 'KAT' . str_pad($lastId, 7, '0', STR_PAD_LEFT);  // Membuat ID dengan awalan KAT dan angka 7 digit
            return $category;
        }, $categories);

        DB::table('kategoris')->insert($categoriesWithId);
    }
}
