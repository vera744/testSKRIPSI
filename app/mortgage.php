<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortgage extends Model
{
    protected $fillable = [
         'mortgageID', 'productID', 'customerID', 'adminID', 'duration',
    ];

    protected $table = 'users';
}
