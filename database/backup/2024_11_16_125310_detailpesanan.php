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
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_produknostok');
            $table->integer('total_produk');
            $table->integer('subtotal_harga_produk');
            $table->timestamps();

            // Foreign key untuk id_pesanan
            $table->foreign('id_pesanan')->references('id')->on('pesanans')->onDelete('cascade');
            // Foreign key untuk id_produk
            $table->foreign('id_produknostok')->references('id')->on('produknostoks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
    }
};
