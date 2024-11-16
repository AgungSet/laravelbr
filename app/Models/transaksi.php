<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $guarded = [];

    // Relasi ke tabel pengguna
    public function member()
    {
        return $this->belongsTo(Member::class, 'id_member');
    }

    // Relasi ke detail transaksi
    public function detailTransaksi()
    {
        return $this->hasMany(detailtransaksi::class, 'id_transaksi');
    }
}
