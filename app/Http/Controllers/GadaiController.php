<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GadaiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view('gadai.index');
    }

    public function add(){
        return view('gadai.add');
    }

    public function store(Request $request){

        $userID = auth()->User()->id;
        DB::table('temp')->insert([
            'productName'=>$request->namaProduk,
            'productPrice'=>$request->nilaiPinjaman,
            'customerID'=>$userID,
            'loan'=>$request->nilaiPinjaman
        ]);

      
        return view('gadai.add');
       

    }
}
