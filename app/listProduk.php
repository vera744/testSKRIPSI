<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listProduk extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'kategori_id', 'merekProduk',
    ];

    protected $table = 'list_produk';
}
