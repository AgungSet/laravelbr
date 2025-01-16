<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => generateCustomId('USR', User::class),
            'name' => 'Admin',
            'email' => 'Adminmbk@gmail.com',
            'password' => bcrypt('123'), // Pastikan password dienkripsi
        ]);

        $this->call([
            Kategori::class,
            Produk::class,
            member::class,
            produknostok::class,
        ]);
    }
}
