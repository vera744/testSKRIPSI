<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'namePayment', 'norek',
    ];

    protected $table = 'payment_methods';
}
