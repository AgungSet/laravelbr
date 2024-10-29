<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id(); // Menambahkan kolom id sebagai primary key
            $table->string('nama_member'); // Kolom untuk nama anggota
            $table->string('alamat'); // Kolom untuk alamat
            $table->string('no_hp')->unique(); // Ubah kolom untuk nomor HP menjadi string
            $table->string('instagram')->nullable(); // Kolom untuk Instagram, bisa nullable
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
