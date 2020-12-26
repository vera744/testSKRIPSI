<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\listProduk;
use App\kategoriProduk;

class EcomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $brand = listProduk::all();
        $category = kategoriProduk::all();
        $products = Product::latest()->paginate(6);
       
       return view('ecom.index', compact('products','brand','category'));
    }

    public function productdetails($id){
        $products = Product::find($id);
        $category = kategoriProduk::all();
        $brand = listProduk::all();
        return view('prouctdetails', compact('products','brand','category'));
    }

    // public function detail(){
    //     $products = Product::
    //     select('productID', 'productName', 'productPrice', 'productDetail','productDescription', 'fotoProduk')
    //     ->get();

    //     return view('ecom.detailproduct')->with('products', $products);
    // }

  
}
