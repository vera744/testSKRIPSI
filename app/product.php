<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productID', 'productName','productPrice', 'productDetail', 'productQuantity', 'productDescription',
    ];

    protected $table = 'products';
}
