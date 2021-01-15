<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    protected $guarded = [];

    protected $fillable = [
       'kondisi_id', 'namaKondisi',
    ];

    protected $table = 'kondisi';
}
