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
        Schema::create('keranjangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_produk')->nullable();
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->unsignedBigInteger('id_produknostok')->nullable();
            $table->foreign('id_produknostok')->references('id')->on('produknostoks')->onDelete('cascade');
            $table->unsignedBigInteger('id_member')->nullable();
            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
