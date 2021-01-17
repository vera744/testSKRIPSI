<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'productID', 'productName','productPrice', 'productWeight', 'productCondition', 'productQuantity','productCategory','productBrand','fotoProduk'
    ];

    protected $table = 'products';

     public function mortgages(){
      return $this->hasOne('App\Mortgage', 'productID', 'productID');
    }

    public function cart()
    {
        return $this->hasOne('App\Cart', 'productID', 'id');
    }
}
