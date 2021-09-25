<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elektronik extends Model
{
    protected $fillable = ['nama', 'harga', 'deskripsi','stock','terbeli', 'namatoko', 'gambar'];
}
