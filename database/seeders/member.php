<?php

namespace Database\Seeders;

use App\Models\member as ModelsMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;

class member extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'email' => 'agungs@gmail.com',
                'nama_customer' => 'Agung',
                'username' => 'agung',
                'password' => bcrypt('agung'),
                'alamat' => 'Cimahi',
                'no_hp' => '0812345678',
                'instagram' => 'magung',
            ],
            [
                'email' => 'budi@gmail.com',
                'nama_customer' => 'Budi',
                'username' => 'budi',
                'password' => bcrypt('budi123'),
                'alamat' => 'Bandung',
                'no_hp' => '0812345679',
                'instagram' => 'budigram',
            ],
            [
                'email' => 'chandra@gmail.com',
                'nama_customer' => 'Chandra',
                'username' => 'chandra',
                'password' => bcrypt('chandra123'),
                'alamat' => 'Jakarta',
                'no_hp' => '0812345680',
                'instagram' => 'chandram',
            ],
            [
                'email' => 'dian@gmail.com',
                'nama_customer' => 'Dian',
                'username' => 'dian',
                'password' => bcrypt('dian123'),
                'alamat' => 'Surabaya',
                'no_hp' => '0812345681',
                'instagram' => 'dianna',
            ],
            [
                'email' => 'eka@gmail.com',
                'nama_customer' => 'Eka',
                'username' => 'eka',
                'password' => bcrypt('eka123'),
                'alamat' => 'Yogyakarta',
                'no_hp' => '0812345682',
                'instagram' => 'ekagram',
            ],
            [
                'email' => 'fahmi@gmail.com',
                'nama_customer' => 'Fahmi',
                'username' => 'fahmi',
                'password' => bcrypt('fahmi123'),
                'alamat' => 'Bekasi',
                'no_hp' => '0812345683',
                'instagram' => 'fahminsta',
            ],
            [
                'email' => 'gina@gmail.com',
                'nama_customer' => 'Gina',
                'username' => 'gina',
                'password' => bcrypt('gina123'),
                'alamat' => 'Malang',
                'no_hp' => '0812345684',
                'instagram' => 'ginasta',
            ],
            [
                'email' => 'hadi@gmail.com',
                'nama_customer' => 'Hadi',
                'username' => 'hadi',
                'password' => bcrypt('hadi123'),
                'alamat' => 'Semarang',
                'no_hp' => '0812345685',
                'instagram' => 'hadigram',
            ],
            [
                'email' => 'indra@gmail.com',
                'nama_customer' => 'Indra',
                'username' => 'indra',
                'password' => bcrypt('indra123'),
                'alamat' => 'Bogor',
                'no_hp' => '0812345686',
                'instagram' => 'indrainsta',
            ],
            [
                'email' => 'joko@gmail.com',
                'nama_customer' => 'Joko',
                'username' => 'joko',
                'password' => bcrypt('joko123'),
                'alamat' => 'Medan',
                'no_hp' => '0812345687',
                'instagram' => 'jokogram',
            ],
            [
                'email' => 'kevin@gmail.com',
                'nama_customer' => 'Kevin',
                'username' => 'kevin',
                'password' => bcrypt('kevin123'),
                'alamat' => 'Denpasar',
                'no_hp' => '0812345688',
                'instagram' => 'kevingram',
            ],
            [
                'email' => 'linda@gmail.com',
                'nama_customer' => 'Linda',
                'username' => 'linda',
                'password' => bcrypt('linda123'),
                'alamat' => 'Makassar',
                'no_hp' => '0812345689',
                'instagram' => 'lindagram',
            ],
            [
                'email' => 'mira@gmail.com',
                'nama_customer' => 'Mira',
                'username' => 'mira',
                'password' => bcrypt('mira123'),
                'alamat' => 'Palembang',
                'no_hp' => '0812345690',
                'instagram' => 'miragram',
            ],
            [
                'email' => 'novi@gmail.com',
                'nama_customer' => 'Novi',
                'username' => 'novi',
                'password' => bcrypt('novi123'),
                'alamat' => 'Pekanbaru',
                'no_hp' => '0812345691',
                'instagram' => 'novigram',
            ],
            [
                'email' => 'oki@gmail.com',
                'nama_customer' => 'Oki',
                'username' => 'oki',
                'password' => bcrypt('oki123'),
                'alamat' => 'Solo',
                'no_hp' => '0812345692',
                'instagram' => 'okigram',
            ],
            [
                'email' => 'putra@gmail.com',
                'nama_customer' => 'Putra',
                'username' => 'putra',
                'password' => bcrypt('putra123'),
                'alamat' => 'Bandung',
                'no_hp' => '0812345693',
                'instagram' => 'putragram',
            ],
            [
                'email' => 'ratna@gmail.com',
                'nama_customer' => 'Ratna',
                'username' => 'ratna',
                'password' => bcrypt('ratna123'),
                'alamat' => 'Bali',
                'no_hp' => '0812345694',
                'instagram' => 'ratnainsta',
            ],
            [
                'email' => 'susi@gmail.com',
                'nama_customer' => 'Susi',
                'username' => 'susi',
                'password' => bcrypt('susi123'),
                'alamat' => 'Pontianak',
                'no_hp' => '0812345695',
                'instagram' => 'susigram',
            ],
            [
                'email' => 'tomi@gmail.com',
                'nama_customer' => 'Tomi',
                'username' => 'tomi',
                'password' => bcrypt('tomi123'),
                'alamat' => 'Balikpapan',
                'no_hp' => '0812345696',
                'instagram' => 'tomigram',
            ],
            [
                'email' => 'umar@gmail.com',
                'nama_customer' => 'Umar',
                'username' => 'umar',
                'password' => bcrypt('umar123'),
                'alamat' => 'Malang',
                'no_hp' => '0812345697',
                'instagram' => 'umargram',
            ],
        ];

        // Menentukan ID untuk setiap member dengan format MEM0000001, MEM0000002, dll
        $lastMember = DB::table('members')->orderBy('id', 'desc')->first();
        $lastId = $lastMember ? (int)substr($lastMember->id, 3) : 0;

        // Menentukan ID untuk setiap member, pastikan tidak ada duplikasi
        foreach ($members as &$member) {
            do {
                $lastId++;
                $newId = 'MEM' . str_pad($lastId, 7, '0', STR_PAD_LEFT);
            } while (DB::table('members')->where('id', $newId)->exists());  // Pastikan ID belum ada di database

            $member['id'] = $newId;
        }

        // Menyimpan data member dengan ID yang sudah di-generate
        foreach ($members as $member) {
            ModelsMember::create($member);
        }
    }
}
