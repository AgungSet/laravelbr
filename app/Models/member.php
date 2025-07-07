<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class member extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];
    protected $keyType = 'string';
    public $incrementing = false;

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk'); //MANY
    }
    public function transaksi()
    {
        return $this->hasMany(detailtransaksi::class, 'id_member');
    }
}
