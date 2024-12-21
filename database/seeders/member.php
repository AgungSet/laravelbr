<?php

namespace Database\Seeders;

use App\Models\member as ModelsMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Password;

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
                'password' => bcrypt('dianpass'),
                'alamat' => 'Surabaya',
                'no_hp' => '0812345681',
                'instagram' => 'dianna',
            ],
            [
                'email' => 'eka@gmail.com',
                'nama_customer' => 'Eka',
                'username' => 'eka',
                'password' => bcrypt('ekasmile'),
                'alamat' => 'Yogyakarta',
                'no_hp' => '0812345682',
                'instagram' => 'ekagram',
            ],
            [
                'email' => 'fahmi@gmail.com',
                'nama_customer' => 'Fahmi',
                'username' => 'fahmi',
                'password' => bcrypt('fahmi2023'),
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
                'password' => bcrypt('hadiman'),
                'alamat' => 'Semarang',
                'no_hp' => '0812345685',
                'instagram' => 'hadigram',
            ],
            [
                'email' => 'indra@gmail.com',
                'nama_customer' => 'Indra',
                'username' => 'indra',
                'password' => bcrypt('indrapass'),
                'alamat' => 'Bogor',
                'no_hp' => '0812345686',
                'instagram' => 'indrainsta',
            ],
            [
                'email' => 'joko@gmail.com',
                'nama_customer' => 'Joko',
                'username' => 'joko',
                'password' => bcrypt('jokosmile'),
                'alamat' => 'Medan',
                'no_hp' => '0812345687',
                'instagram' => 'jokogram',
            ],
            [
                'email' => 'kevin@gmail.com',
                'nama_customer' => 'Kevin',
                'username' => 'kevin',
                'password' => bcrypt('kevin2023'),
                'alamat' => 'Denpasar',
                'no_hp' => '0812345688',
                'instagram' => 'kevingram',
            ],
            [
                'email' => 'linda@gmail.com',
                'nama_customer' => 'Linda',
                'username' => 'linda',
                'password' => bcrypt('lindasmile'),
                'alamat' => 'Makassar',
                'no_hp' => '0812345689',
                'instagram' => 'lindagram',
            ],
            [
                'email' => 'mira@gmail.com',
                'nama_customer' => 'Mira',
                'username' => 'mira',
                'password' => bcrypt('mirapass'),
                'alamat' => 'Palembang',
                'no_hp' => '0812345690',
                'instagram' => 'miragram',
            ],
            [
                'email' => 'novi@gmail.com',
                'nama_customer' => 'Novi',
                'username' => 'novi',
                'password' => bcrypt('novipass'),
                'alamat' => 'Pekanbaru',
                'no_hp' => '0812345691',
                'instagram' => 'novigram',
            ],
            [
                'email' => 'oki@gmail.com',
                'nama_customer' => 'Oki',
                'username' => 'oki',
                'password' => bcrypt('okismile'),
                'alamat' => 'Solo',
                'no_hp' => '0812345692',
                'instagram' => 'okigram',
            ],
            [
                'email' => 'putra@gmail.com',
                'nama_customer' => 'Putra',
                'username' => 'putra',
                'password' => bcrypt('putrapass'),
                'alamat' => 'Bandung',
                'no_hp' => '0812345693',
                'instagram' => 'putragram',
            ],
            [
                'email' => 'ratna@gmail.com',
                'nama_customer' => 'Ratna',
                'username' => 'ratna',
                'password' => bcrypt('ratnapass'),
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
                'password' => bcrypt('tomipass'),
                'alamat' => 'Balikpapan',
                'no_hp' => '0812345696',
                'instagram' => 'tomigram',
            ],
            [
                'email' => 'umar@gmail.com',
                'nama_customer' => 'Umar',
                'username' => 'umar',
                'password' => bcrypt('umar2023'),
                'alamat' => 'Malang',
                'no_hp' => '0812345697',
                'instagram' => 'umargram',
            ],
        ];

        foreach ($members as $member) {
            ModelsMember::create($member);
        }
    }
}
