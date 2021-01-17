<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = [

        'IDProduct', 'quantity','productWeight', 'total_price', 'pesan',

    ];

    protected $table = 'detailtransactions';

    public function totaltransaction()
    {
        return $this->hasOne('App\TotalTransaction', 'id', 'transaction_id');
    
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'IDProduct', 'productID');
    }
}