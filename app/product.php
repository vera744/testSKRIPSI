<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productID', 'productName','productPrice', 'productDetail', 'productQuantity', 'productDescription','fotoProduk'
    ];

    protected $table = 'products';
}
