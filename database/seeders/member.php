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
        ModelsMember::create([
            'email' => 'agungs@gmail.com',
            'nama_customer' => 'agung',
            'username' => 'agung',
            'password' => bcrypt('agung'),
            'alamat' => 'cimahi',
            'no_hp' => '0812345678'
        ]);
    }
}
