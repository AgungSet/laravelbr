<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Produknostok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Batik tulis variasi cap' => 350000,
            'Batik Cap Satu Warna' => 150000,
            'Batik Cap Variasi Nitik' => 550000,
        ];

        $produkData = [
            'Batik tulis variasi cap' => [
                'taburan cengkeh',
                'gerbang k3',
                'parijotho rejenu',
                'diorama kretek',
                'rumah kapal Menara',
                'ceplokan beras tumpah',
                'pakis haji',
                'tembakau cengkeh',
                'air tiga rasa',
                'parijotho pakis aji',
                'taburan tembakau',
                'kembang kupu',
                'tembakau parijotho',
                'cerita rakyat bulusan',
                'gading patiayam',
                'tari kretek'
            ],
            'Batik Cap Satu Warna' =>
            [
                'tembakau cengkeh',
                'buket parijotho',
                'Gerbang K3',
                'diorama kretek',
                'tembakau parijotho',
                'cengkeh'
            ],
            'Batik Cap Variasi Nitik' =>
            [
                'Gerbang K3',
                'Buket Kupu cengkeh',
                'Buket Parijotho',
                'Gading Patiayam',
                'Buketan Parijotho',
                'Buket cengkeh'
            ],
        ];

        $categoryIds = DB::table('kategoris')->pluck('id', 'nama_kategori')->toArray();

        foreach ($produkData as $categoryName => $products) {
            $harga = $categories[$categoryName];
            $id_kategori = $categoryIds[$categoryName];

            foreach ($products as $product) {
                DB::table('produknostoks')->insert([
                    'id' => $this->generateProductId(),
                    'nama_produknostok' => $product,
                    'harga' => $harga,
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
        $lastProducts = DB::table('produknostoks')->orderBy('id', 'desc')->first();
        if ($lastProducts) {
            $lastId = (int)substr($lastProducts->id, 4);
            $newId = $lastId + 1;
        } else {
            $newId = 1;
        }
        return 'PRDN' . str_pad($newId, 6, '0', STR_PAD_LEFT);
    }
}
