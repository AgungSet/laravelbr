<?php

namespace Database\Seeders;

use App\Models\produknostok as ProduknoStokmodel;
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
            'Batik Cap Satu Warna' => ['cengkeh', 'Gerbang K3', 'diorama kretek', 'tembakau parijotho', 'tembakau cengkeh', 'buket parijotho'],
            'Batik Cap Variasi Nitik' => ['Buketan Parijotho', 'Buket Parijotho', 'Buket cengkeh', 'Gerbang K3', 'Gading Patiayam', 'Buket Kupu cengkeh'],
        ];

        $categoryIds = DB::table('kategoris')->pluck('id', 'nama_kategori')->toArray();

        foreach ($produkData as $categoryName => $products) {
            $harga = $categories[$categoryName];
            $id_kategori = $categoryIds[$categoryName];

            foreach ($products as $product) {
                DB::table('produknostoks')->insert([
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
}
