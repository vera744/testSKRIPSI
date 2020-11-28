<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;

class GadaiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $userLogin = auth()->User()->id;
        $mortgages = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName', 'productDetail', 'productDescription')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['sedang ditinjau', 'diterima', 'sedang berlangsung'])
        ->get();

        return view('gadai.index')->with('mortgages', $mortgages);
    }

    public function record(){
        $userLogin = auth()->User()->id;
        $mortgagesRecord = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName', 'productDetail', 'productDescription')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['selesai', 'ditolak'])
        ->get();
        
        return view('gadai.record')->with('mortgages', $mortgagesRecord);
    }

    public function getEntryDataForAjax(int $id) 
    {
      $entries = new Entry(); 
      $entry = $entries->where('id', $id)->get();

      echo json_encode($entry);
    }

    public function add(){
        return view('gadai.add');
    }

}
