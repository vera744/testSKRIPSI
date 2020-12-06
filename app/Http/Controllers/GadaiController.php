<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use App\temp;
use App\product;
use App\mortgage_detail;
use App\Mortgage;

class GadaiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $userLogin = auth()->User()->id;
        $mortgage = Mortgage::
        join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName', 'productDetail', 'productDescription', 'fotoProduk')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['sedang ditinjau', 'diterima', 'sedang berlangsung'])
        ->get();


        return view('gadai.index')->with('mortgages', $mortgage);
    }

    public function record(){
        $userLogin = auth()->User()->id;
        $mortgagesRecord = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName', 'productDetail', 'productDescription', 'fotoProduk')
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
    public function store(Request $request){
        
        if($request->hasFile('fotoProduk')){
            $file=$request->fotoProduk;
            $image = $file->getClientOriginalName();
            $request->file('fotoProduk')->move('storage/fotoProduk',$image);

        }
        
        $userID = auth()->User()->id;

        $product = new product();
        $product->productName = $request->input('namaProduk');
        $product->productPrice = $request->input('nilaiPinjaman');
        $product->fotoProduk= $image;
        $product->save();

        $mortgage = new Mortgage();
        $mortgage->productID = $product->id;
        $mortgage->customerID = $userID;
        $mortgage->save();

        $mortgageDetails = new mortgage_detail();
        $mortgageDetails->mortgageID = $mortgage->id;
        $mortgageDetails->loan = $request->input('nilaiPinjaman');
        $mortgageDetails->save();



        // temp::insert([
        //     'productName'=>$request->namaProduk,
        //     'productPrice'=>$request->nilaiPinjaman,
        //     'customerID'=>$userID,
        //     'loan'=>$request->nilaiPinjaman,
        //     'fotoProduk'=>$image
        // ]);


    //   $product=  product::create([
    //         'productName'=>$request->namaProduk,
    //         'productPrice'=>$request->nilaiPinjaman,
    //         'fotoProduk'=>$image
    //     ]);

      //  $product = DB::table('product')->select('ProductID')->where()->get()
    //   $product=DB::table('products')->latest('productID')->get();
    //   $productb=DB::table('products')->latest('created_at')->get();
    //   $productc=DB::table('products')->latest('updated_at')->get();
        //$productIDnew = $product->productID;
        // if($product){

        //     $mortg=Mortgage::create([
        //        'productID' => $product->productID,
        //        'customerID'=>$userID
        //     ]);
        // }

        
        // $mortgage = mortgage::all();
        // $mortgageIDnew = $mortgage->mortgageID;

        // mortgage_detail::insert([
        //     'mortgageID' => $mortgageIDnew,
        //     'loan'=>$request->nilaiPinjaman,
        // ]);
        

       
      
        return view('gadai.add');
       

    }
}
