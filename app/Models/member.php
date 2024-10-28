<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_produk'); //MANY
    }
}
