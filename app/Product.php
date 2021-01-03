<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productID', 'productName','productPrice', 'productCondition', 'productQuantity','productCategory','productBrand','fotoProduk'
    ];

    protected $table = 'products';

     public function mortgages(){
      return $this->hasOne('App\Mortgage', 'productID', 'productID');
    }
}
