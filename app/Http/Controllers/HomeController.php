<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\temp;
use App\product;
use App\mortgage_detail;
use App\Mortgage;

use App\User;
use App\listProduk;
use App\kategoriProduk;
use App\Kondisi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->User()){
            
            $ditinjau = mortgage_detail::
            select('status')
            ->whereIn('status', ['sedang ditinjau'])
            ->get();

            $gagal = mortgage_detail::
            select('status')
            ->whereIn('status', ['Gagal'])
            ->get();
            
            $registered = User::
            select('id')
            ->get();

        
            return view('home',compact('ditinjau','registered','gagal'));
        }
        else{
            return view('welcome');
        }
    }
}
