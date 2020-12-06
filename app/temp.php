<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class temp extends Model
{
    //

    
    protected $fillable = [
        'productID', 'productName','productPrice', 'productDetail', 'productQuantity', 'productDescription','fotoProduk','customerID','loan', 'status'
    ];
    
    protected $table ='temp';
}
