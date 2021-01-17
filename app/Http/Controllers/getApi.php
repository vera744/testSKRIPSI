<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class getApi extends Controller
{
    public function index(){
        $response = Http::withHeaders([
            'key' => 'b2685bfdc389138af911b61ac0957e88',
            
        ])->get('https://api.rajaongkir.com/starter/province');
        return $response->body;
    }
}
