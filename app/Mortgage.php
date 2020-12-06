<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    protected $fillable = [
         'mortgageID', 'productID', 'customerID', 'adminID', 'duration',
    ];

    protected $table = 'mortgages';

    public function products(){
        return $this->belongsTo('App\product', 'productID', 'productID');
    }
}
