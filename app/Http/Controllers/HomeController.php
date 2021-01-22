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
            $userLogin = auth()->User()->id;

            $transaksi = Mortgage::
            join('users', 'mortgages.customerID', "=", "users.id")
            ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
            ->join('products',"mortgages.productID", "=", "products.productID")
            ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
            ->join('list_produk', "products.productBrand", "=", "list_produk.id")
            ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
            ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName','productWeight', 'namaKondisi', 'keterangan_kondisi','fotoProduk','startDate','endDate', 'namaKategori', 'merekProduk')
            ->where('customerID', "=", $userLogin)
            ->whereIn('status', ['sedang ditinjau','sedang berlangsung'])->get();

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

            $mortgage = Mortgage::
            join('users', 'mortgages.customerID', "=", "users.id")
            ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
            ->join('products',"mortgages.productID", "=", "products.productID")
            ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
            ->join('list_produk', "products.productBrand", "=", "list_produk.id")
            ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
            ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName','productWeight', 'namaKondisi', 'fotoProduk','startDate','endDate','namaKategori', 'merekProduk')->whereIn('status', ['sedang ditinjau'])->get();
            return view('home',compact('ditinjau','registered','gagal','mortgage','transaksi'));
        }
        else{
            return view('welcome');
        }
    }

    public function findCityName(Request $request){
      
        $list= City::select('cityTitle','city_id','type')->where('province_id', $request->id)->take(100)->get();

        return response()->json($list);
    }
}
