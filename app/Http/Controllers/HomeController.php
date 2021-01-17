<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\temp;
use App\product;
use App\mortgage_detail;
use App\Mortgage;

use App\listProduk;
use App\kategoriProduk;
use App\Kondisi;
use App\City;

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
            
            return view('home')->with('ditinjau', $ditinjau);
        }
        else{
            return view('welcome');
        }
    }

    public function findCityName(Request $request){
      
        $list= City::select('title','city_id','type')->where('province_id', $request->id)->take(100)->get();

        return response()->json($list);
    }
}
