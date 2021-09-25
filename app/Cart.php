<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['nama', 'harga', 'pembeli', 'produkid', 'jumlah', 'terbeli', 'namatoko', 'gambar', 'created_at', 'updated_at'];
}
