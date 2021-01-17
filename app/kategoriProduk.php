<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategoriProduk extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'namaKategori',
    ];

    protected $table = 'kategori_produk';
}
