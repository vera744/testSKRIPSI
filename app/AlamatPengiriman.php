<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlamatPengiriman extends Model
{
    protected $fillable = [
        'userID', 'alamat','provinsi','kota','namaPenerima', 'nomorHP',
     ];

    protected $table = 'alamatpengirimans';

    
    public function user(){
        return $this->belongsTo('App\User', 'userID', 'id');
    }

}
