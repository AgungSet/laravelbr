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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_member');
            $table->text('catatan_pesanan')->nullable();
            $table->date('tanggal');
            $table->integer('total_harga_pesanan');
            $table->string('status_pesanan');
            $table->timestamps();

            // Foreign key untuk id_member
            $table->foreign('id_member')->references('id')->on('members')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
