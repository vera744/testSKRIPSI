<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TotalTransaction extends Model
{
    protected $fillable = [
        'customerID', 'grandtotal', 'total', 'pesan', 'paymentID', 'ongkirID', 'grandtotal', 'tglCO', 'statusPayment'
    ];

    protected $table = 'totaltransactions';


    public function users()
    {
        return $this->hasOne('App\User', 'id', 'customerID');
    }

    public function detailtransaction()
    {
        return $this->belongsTo('App\DetailTransaction', 'transaction_id', 'id');
    }

    
}