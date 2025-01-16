<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi
    protected $table = 'pesanans';
    protected $keyType = 'string';

    // Kolom yang diizinkan untuk diisi (fillable)
    protected $guarded = [];

    // Relasi ke tabel pengguna
    public function member()
    {
        return $this->belongsTo(member::class, 'id_member');
    }

    // Relasi ke detail pesanan
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'id_pesanan');
    }
}
