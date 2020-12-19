<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mortgage_Detail extends Model
{
    protected $fillable = [
        'mDetailID', 'mortgageID', 'loan','duration','startDate','endDate'
    ];

    protected $table = 'mortgage_details';
}
