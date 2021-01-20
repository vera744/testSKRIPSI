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
use DateTime;
use App\listProduk;
use App\kategoriProduk;
use App\Kondisi;

use Illuminate\Support\Facades\Mail;
use App\Mail\RequestGadaiEmail;

class GadaiController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $date1=date_create(date('Y-m-d'));
     
        DB::table('mortgage_details')->where('endDate',"=",$date1)->update(['status'=>'Gagal']);
       
        $userLogin = auth()->User()->id;
        $mortgages = Mortgage::
        join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName','productWeight', 'namaKondisi', 'keterangan_kondisi','fotoProduk','startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['sedang ditinjau', 'sedang berlangsung','sudah ditinjau'])
        ->paginate(5);


        return view('gadai.home',compact('mortgages'));

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
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName','productWeight', 'namaKondisi','keterangan_kondisi', 'fotoProduk', 'startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('customerID', "=", $userLogin)
        ->whereIn('status', ['selesai', 'ditolak', 'gagal','ecom'])
        ->paginate(5);
        
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
        $product->productWeight = $request->input('beratProduk');
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

        Mail::to(auth()->User()->email)->send(new RequestGadaiEmail());
        
        return redirect('/gadai')->with(['success' => 'Request gadai berhasil diajukan!']);
        
    }

    public function indexPayment($id){

        $mortgages = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName','productWeight', 'namaKondisi', 'fotoProduk', 'startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('mortgages.mortgageID', "=", $id)
        ->get();
        
        
        return view('payment')->with('mortgages', $mortgages);;
    }

    public function indexAppend($id){

        $mortgages = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName','productWeight', 'namaKondisi', 'fotoProduk', 'startDate','endDate', 'namaKategori', 'merekProduk')
        ->where('mortgages.mortgageID', "=", $id)
        ->get();
        
        
        return view('append')->with('mortgages', $mortgages);;
    }
}
