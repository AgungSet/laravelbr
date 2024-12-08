<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailpesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanans';

    protected $guarded = [];
    // Relasi ke tabel produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    // Relasi ke tabel pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}
