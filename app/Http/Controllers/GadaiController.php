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

use App\listProduk;
use App\kategoriProduk;
use App\Kondisi;

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
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName', 'namaKondisi', 'fotoProduk','startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['sedang ditinjau', 'sedang berlangsung','sudah ditinjau'])
        ->get();


        return view('gadai.home')->with('mortgages', $mortgage);

    }

    public function record(){
        $userLogin = auth()->User()->id;
        $mortgagesRecord = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName', 'namaKondisi', 'fotoProduk', 'startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['selesai', 'ditolak', 'gagal'])
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
      
        //$list= DB::table('list_produk')->groupby('jenisProduk','id', 'merekProduk', 'created_at', 'updated_at')->get();
        $category = kategoriProduk::all();
        $kondisi = Kondisi::all();
        
        return view('gadai.add', compact('category','kondisi'));
    }
    public function findProductName(Request $request){
      
        $list= listproduk::select('merekProduk','id')->where('kategori_id', $request->id)->take(100)->get();

        return response()->json($list);
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
        $product->productCategory = $request->get('jenisProduk');
        $product->productBrand = $request->get('merekProduk');
        $product->productCondition = $request->get('kondisiProduk');
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

        
        return redirect('/gadai');
        
    }
}
