<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

use App\User;
use App\temp;
use App\product;
use App\Mortgage;
use App\Mortgage_Detail;
use DateTime;

use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptGadaiEmail;
use App\Mail\RejectGadaiEmail;
use App\TotalTransaction;
use App\DetailTransaction;

use App\Notifications\AcceptRequest;

class manageGadaiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $date1=date_create(date('Y-m-d'));

        DB::table('mortgage_details')->where('endDate',"=",$date1)->where('status','=',"sedang ditinjau")->update(['status'=>'Gagal']);

       //buat cek si pembayaran
       DB::table('totaltransactions')->join('detailtransactions','totaltransactions.id',"=","detailtransactions.transaction_id")->join('products','detailtransactions.IDProduct',"=",'products.productID')->where('tglCO',"!=",$date1)->where('statusPayment',"=","Belum Dibayar")->update(['totaltransactions.statusPayment'=>'Gagal']);

       DB::table('totaltransactions')->join('detailtransactions','totaltransactions.id',"=","detailtransactions.transaction_id")->join('products','detailtransactions.IDProduct',"=",'products.productID')->where('tglCO',"!=",$date1)->where('statusPayment',"=","Gagal")->update(['products.productQuantity'=>1]);

       //cek pembayaran

        $temp = Mortgage::
        join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status','duration', 'loan', 'productName', 'namaKondisi', 'fotoProduk','startDate','endDate','namaKategori', 'merekProduk')->whereIn('status', ['sedang ditinjau'])
        ->paginate(5);

        return view('admin.manageGadai.index')->with('temp', $temp);
    }

    public function acc($id){
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['status'=>"Sudah Ditinjau"]);

        $data =  Mortgage::
        join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->select('users.id','users.name', 'users.email as custEmail')
        ->where('mortgages.mortgageID',"=",$id)
        ->get();
        
        foreach($data as $value){
            $user = User::find($value->id);

            Mail::to($value->custEmail)->send(new AcceptGadaiEmail($value->name));
            
            $user->notify(new AcceptRequest());

            return redirect ('manageGadai')->with(['success' => 'Request gadai dari ' .$value->name. ' berhasil diterima!']);
        }

    }

    public function reject($id){
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['status'=>"Ditolak"]);

        $data =  Mortgage::
        join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->select('users.name', 'users.email as custEmail')
        ->where('mortgages.mortgageID',"=",$id)
        ->get();
        
        foreach($data as $value){
            Mail::to($value->custEmail)->send(new RejectGadaiEmail($value->name));
    
            return redirect ('manageGadai')->with(['reject' => 'Request gadai dari ' .$value->name. ' berhasil ditolak!']);
        }
    }

    public function record(){

        $date1=date_create(date('Y-m-d'));
        DB::table('mortgage_details')->where('endDate',"=",$date1)->where('status','=',"sedang ditinjau")->update(['status'=>'Gagal']);
        
        $mortgagesRecord = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName', 'namaKondisi', 'fotoProduk','startDate','endDate', 'namaKategori', 'merekProduk')
        ->whereIn('status', ['Sudah Ditinjau', 'Sedang Berlangsung'])->orderBy('mortgages.mortgageID')
        ->paginate(5);
        
        return view('admin.manageGadai.record')->with('mortgages', $mortgagesRecord);
    }

    public function done(){
        $mortgagesRecord = DB::table('mortgages')
        ->join('users', 'mortgages.customerID', "=", "users.id")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('products',"mortgages.productID", "=", "products.productID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('customerID', 'name', 'mortgages.mortgageID', 'status', 'duration', 'loan', 'productName', 'namaKondisi', 'fotoProduk','startDate','endDate', 'namaKategori', 'merekProduk')
        ->whereIn('status', ['Ditolak', 'Selesai','Gagal','Ecom'])
        ->paginate(5);
        
        return view('admin.manageGadai.selesai')->with('mortgages', $mortgagesRecord);
    }
    public function skejul($id, Request $req){
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['endDate'=>$req->input('endDate')]);
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['loan'=>$req->input('loans')]);

        if($req->input('tglstart')){

            DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['startDate'=>$req->input('tglstart')]);
        }
        date('d-m-Y', strtotime($req->input('tglstart')));
               
        date('d-m-Y', strtotime($req->input('endDate')));
                    
        
        
        $end = $req->input('endDate');
        $start = $req->input('tglstart');
        $datetime1 = new DateTime($end);
        $datetime2 = new DateTime($start);
        $todate = new DateTime();
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format('%a');
        
        $sisaHari = $datetime1->diff($todate);
        $daysisa = $interval->format('%a');
        
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['duration'=>$daysisa]);
        
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['status'=>"Sedang Berlangsung"]);

        return redirect ('manageGadai');
    }

    public function append($id, Request $req){
    $date = new DateTime($req->input('endDate'));
    $day = $date->format('j');

    $date->modify("+3 month");
    $next_month_day = $date->format('j');
        
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['endDate'=>$date]);

        return redirect ('gadai');
    }

    public function compelete($id){
        $todate = new DateTime();
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['status'=>"Selesai"]);
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['endDate'=>$todate]);

        return redirect ('gadai');
        
    }

//MANAGE PRODUCT
    public function indexProduct(){
        $unreviewed = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->where('status', ['gagal'])
        ->where('productQuantity', "=", "1")
        ->get();

        $product = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->select('products.productID', 'productName', 'productPrice','productWeight','fotoProduk')
        ->where('status', ['ecom'])
        ->where('productQuantity', "=", "1")
        ->get();

        return view('manageProduct.index',compact('unreviewed','product'));
    }

    public function editProduct($id){
        $product = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->where('products.productID', "=", $id)->get();
     
        
        
        return view('manageProduct.edit',compact('product'));
    }

    public function updateProduct($id, Request $request){

        if($request->hasFile('fotoProduk')){
            $file=$request->fotoProduk;
            $image = $file->getClientOriginalName();
            $request->file('fotoProduk')->move('storage/fotoProduk',$image);

            product::where('productID', $id)
                    ->update(['fotoProduk' => $image]);
        }
        

        $name = $request->input('name');
        $price=$request->input('price');
        $berat=$request->input('berat');
        DB::table('products')->where('productID',"=",$id)->update(['productName'=>$name]);
        DB::table('products')->where('productID',"=",$id)->update(['productPrice'=>$price]);
        DB::table('products')->where('productID',"=",$id)->update(['productWeight'=>$berat]);
        
        DB::table('products')->
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->where('products.productID', "=", $id)->update(['status'=>'Ecom']);

        ;
        return redirect ('manageProduct');
    }
}