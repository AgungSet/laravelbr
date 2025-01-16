<?php

namespace Database\Seeders;

use App\Models\Produk as ModelsProduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Batik tulis variasi cap' => 350000,
            'Sarung Batik' => 400000,
            'Batik Cap Satu Warna' => 150000,
            'Batik Cap Variasi Nitik' => 550000,
            'Kaos' => 200000,
            'Kemeja Batik' => 400000,
            'Outer' => 600000,
            'Slint Bag' => 100000,
            'Syal Cotton Bamboo' => 350000,
        ];

        $produkData = [
            'Batik tulis variasi cap' => [
                'tari kretek',
                'tembakau cengkeh',
                'gading patiayam',
                'taburan cengkeh',
                'parijotho pakis aji',
                'tembakau parijotho',
                'taburan tembakau',
                'rumah kapal Menara',
                'gerbang k3',
                'pakis haji',
                'parijotho rejenu',
                'air tiga rasa',
                'kembang kupu',
                'ceplokan beras tumpah',
                'cerita rakyat bulusan',
                'diorama kretek',
            ],
            'Sarung Batik' => ['lasem1', 'lasem2', 'kudusan1', 'kudusan2', 'klasik1', 'klasik2'],
            'Batik Cap Satu Warna' => ['cengkeh', 'Gerbang K3', 'diorama kretek', 'tembakau parijotho', 'tembakau cengkeh', 'buket parijotho'],
            'Batik Cap Variasi Nitik' => ['Buketan Parijotho', 'Buket Parijotho', 'Buket cengkeh', 'Gerbang K3', 'Gading Patiayam', 'Buket Kupu cengkeh'],
            'Kaos' => ['Kaos 1', 'Kaos 2', 'Kaos 3', 'Kaos 4', 'Kaos 5', 'Kaos 6', 'Kaos 7'],
            'Kemeja Batik' => ['Kemeja 1', 'Kemeja 2', 'Kemeja 3', 'Kemeja 4', 'Kemeja 5'],
            'Outer' => ['Outer 1', 'Outer 2', 'Outer 3', 'Outer 4', 'Outer 5', 'Outer 6'],
            'Slint Bag' => ['sb 1', 'sb 2', 'sb 3', 'sb 4', 'sb 5'],
            'Syal Cotton Bamboo' => ['Syal 1', 'Syal 2', 'Syal 3', 'Syal 4', 'Syal 5'],
        ];

        $categoryIds = DB::table('kategoris')->pluck('id', 'nama_kategori')->toArray();

        foreach ($produkData as $categoryName => $products) {
            $harga = $categories[$categoryName];
            $id_kategori = $categoryIds[$categoryName];

            foreach ($products as $product) {
                DB::table('produks')->insert([
                    'id' => $this->generateProductId(),
                    'nama_produk' => $product,
                    'harga' => $harga,
                    'stok' => 20,
                    'foto' => "masterimage/$categoryName/$product.jpg",
                    'deskripsi' => "Produk $product adalah bagian dari kategori $categoryName dengan kualitas unggul dan motif khas.",
                    'id_kategori' => $id_kategori,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
    private function generateProductId(): string
    {
        $lastProduct = DB::table('produks')->orderBy('id', 'desc')->first();
        if ($lastProduct) {
            $lastId = (int)substr($lastProduct->id, 3);
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }
        return 'PRD' . str_pad($newId, 7, '0', STR_PAD_LEFT);
    }
}
