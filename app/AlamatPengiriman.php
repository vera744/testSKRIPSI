<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $fillable = [
        'userID', 'nomorHP', 'alamat', 'nama',
    ];

    protected $table = 'alamatpengirimans';

}
