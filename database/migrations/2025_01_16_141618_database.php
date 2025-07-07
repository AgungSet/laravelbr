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
        Schema::create('kategoris', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama_kategori');
            $table->string('deskripsi');
            $table->timestamps();
        });

        Schema::create('produks', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama_produk');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto');
            $table->string('deskripsi');
            $table->string('id_kategori', 10);
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('members', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('email')->unique();
            $table->string('nama_customer');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('instagram')->nullable();
            $table->timestamps();
        });

        Schema::create('produknostoks', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('nama_produknostok');
            $table->integer('harga');
            $table->string('foto');
            $table->string('deskripsi');
            $table->string('id_kategori', 10);
            $table->foreign('id_kategori')->references('id')->on('kategoris')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('keranjangs', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_produk', 10)->nullable();
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
            $table->string('id_produknostok', 10)->nullable();
            $table->foreign('id_produknostok')->references('id')->on('produknostoks')->onDelete('cascade');
            $table->string('id_member', 10)->nullable();
            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
            $table->integer('jumlah');
            $table->timestamps();
        });

        Schema::create('pesanans', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_member', 10);
            $table->text('catatan_pesanan')->nullable();
            $table->date('tanggal');
            $table->integer('total_harga_pesanan');
            $table->string('status_pesanan');
            $table->timestamps();

            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_pesanan', 10);
            $table->string('id_produknostok', 10);
            $table->integer('total_produk');
            $table->integer('subtotal_harga_produk');
            $table->timestamps();

            $table->foreign('id_pesanan')->references('id')->on('pesanans')->onDelete('cascade');
            $table->foreign('id_produknostok')->references('id')->on('produknostoks')->onDelete('cascade');
        });

        Schema::create('transaksis', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_member', 10);
            $table->text('catatan_transaksi')->nullable();
            $table->date('tanggal');
            $table->integer('total_harga_transaksi');
            $table->string('payment_status')->default('pending'); // Status pembayaran: pending, success, failed
            $table->string('snap_token', 100)->nullable(); // Untuk menyimpan snap token dari Midtrans
            $table->string('status_pesanan'); // midtrans
            $table->timestamps();

            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
        });

        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->string('id', 10)->primary();
            $table->string('id_transaksi', 10);
            $table->string('id_produk', 10);
            $table->integer('total_produk');
            $table->integer('subtotal_harga_produk');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategoris');
        Schema::dropIfExists('produks');
        Schema::dropIfExists('members');
        Schema::dropIfExists('produknostoks');
        Schema::dropIfExists('keranjangs');
        Schema::dropIfExists('pesanans');
        Schema::dropIfExists('detail_pesanans');
        Schema::dropIfExists('transaksis');
        Schema::dropIfExists('detail_transaksis');
    }
};
