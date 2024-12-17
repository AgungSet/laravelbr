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
    public function produknostok()
    {
        return $this->belongsTo(Produknostok::class, 'id_produknostok');
    }

    // Relasi ke tabel pesanan
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }
}
