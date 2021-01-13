<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\temp;
use App\product;
use App\Mortgage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mortgage_Detail;
use DateTime;

use Illuminate\Support\Facades\Mail;
use App\Mail\AcceptGadaiEmail;

class manageGadaiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
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
        ->select('users.name', 'users.email as custEmail')
        ->where('mortgages.mortgageID',"=",$id)
        ->get();
        
        foreach($data as $value){
            Mail::to($value->custEmail)->send(new AcceptGadaiEmail($value->name));
    
            return redirect ('manageGadai')->with(['success' => 'Request gadai dari ' .$value->name. ' berhasil diterima!']);
        }

    }

    public function reject($id){
        DB::table('mortgage_details')->where('mortgageID',"=",$id)->update(['status'=>"Ditolak"]);


        return redirect ('manageGadai');  
    }

    public function record(){
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
        ->whereIn('status', ['Ditolak', 'Selesai','Gagal'])
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

}
