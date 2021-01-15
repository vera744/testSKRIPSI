<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\User;
use App\TotalTransaction;
use App\DetailTransaction;
use App\AlamatPengiriman;
use App\PaymentMethod;


class CartController extends Controller
{

    public function get_province(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: b2685bfdc389138af911b61ac0957e88"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
        echo "cURL Error #:" . $err;
        } else {
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);

            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir result
            $data_pengirim = $response['rajaongkir']['results'];

            return $data_pengirim;
        }
    }

    public function get_city($id){
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?&province=$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "key: b2685bfdc389138af911b61ac0957e88"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
          }
    }

    public function get_ongkir($origin, $destination, $weight, $courier){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$weight&courier=$courier",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: b2685bfdc389138af911b61ac0957e88"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $response=json_decode($response,true);
            $data_ongkir = $response['rajaongkir']['results'];
            return json_encode($data_ongkir);
        }
    }
        

    public function add(Request $req, $id){
        $userLogin = auth()->User()->id;
        $cartsekarang = Cart::where('IDProduct', '=', $id)->where('customerID', '=', $userLogin)->first();
        $stocklama = Product::where('productID', '=', $id)->first()->productQuantity;
        $stocknew = $stocklama - 1;
        $reqproductid = $id;
        
        $price= Product::where('productID','=',$id)->first()->productPrice;

        if ($cartsekarang != null){
            Session::flash('dataada','Produk ini sudah mencapai batas pembeliaan produk');
        }
        else{
            $cart = new Cart();
            $userID = auth()->User()->id;
            $user = User::where('id', '=', $userID);
            $qty = 1;
            $totalPrice = $qty * $price;
            $cart->IDProduct = $id;
            $cart->quantity = 1;
            $cart->total_price = $totalPrice;
            $cart->customerID = $userID;
            $cart->save();
        }
        return redirect('ecom');

    }

    public function index()
    {
        $userLogin = auth()->User()->id;
        $cart = Cart::
        join('products', 'products.productID', '=', 'carts.IDProduct')
        ->select('carts.id', 'carts.IDProduct', 'carts.total_price', 'carts.quantity', 'productName', 'customerID', 'fotoProduk')
         ->where('customerID', '=', $userLogin)
        ->get();

        $total_price = 0;
        $totalqty = 0;

        foreach ($cart as $c) {
            $total_price += $c->total_price;
            $totalqty += 1;
        
        }
         return view('/ecom/cart', compact('cart', 'total_price'));
    }

    public function destroy(Request $req){
         $findcartid = $req->cartid;
         $findcart = Cart::find($findcartid)->first();
       
        $findcart->delete();
        return back()->with('success_message', 'Item has been removed');
    }

    public function checkout(Request $req){
        $provinsi = $this->get_province();

        $userLogin = auth()->User()->id;
        $userName = auth()->User()->name;
        $userNomor = auth()->User()->nomorHP;
        $userAlamat = auth()->User()->alamat;
     
        $grandtotal = 0;
        $testongkir = 10000;
        $total = 0;
        $cart = Cart::
        join('products', 'products.productID', '=', 'carts.IDProduct')
        ->select('carts.id', 'carts.IDProduct', 'carts.total_price', 'carts.quantity', 'productName', 'customerID', 'fotoProduk')
        ->where('customerID', '=', $userLogin)
        ->get();

        $user = User::select('id','name', 'dob', 'nomorHP','alamat','provinsi','kota','email', 'password')
        ->where('id', "=", $userLogin)
        ->get();
      
        foreach($cart as $c){
            $grandtotal += $c->total_price;
        }
        $total = $testongkir + $grandtotal;

        $alamat = AlamatPengiriman::select('id', 'userID','namaPenerima', 'nomorHP','alamat','provinsi','kota',)
        ->where('userID', "=", $userLogin)
        ->get();

        $alamatUpdate = DB::table('users')->pluck('provinsi', 'kota');

        foreach($alamatUpdate as $kota => $value){
    
        }

        $metode = PaymentMethod::all();
        
        return view('/ecom/checkout', compact('user', 'cart', 'grandtotal', 'total', 'testongkir', 'alamat', 'metode'));

    }

    public function pesan(Request $req){
        $userLogin = auth()->User()->id;

        $cart = Cart::
        join('products', 'products.productID', '=', 'carts.IDProduct')
        ->select('carts.id', 'carts.IDProduct', 'carts.total_price', 'carts.quantity', 'productName', 'customerID', 'fotoProduk')
        ->where('customerID', '=', $userLogin)
        ->get();

        $headertransaction = new TotalTransaction();
        $headertransaction->customerID = $userLogin;
        $headertransaction->pesan = $req->pesan;
        $headertransaction->paymentID = $req->id;
        $headertransaction->ongkirID = $req->ongkirID;
        $grandtotal = 0;

        foreach($cart as $c){
            $grandtotal += $c->total_price;
        }

        $headertransaction->grandtotal = $grandtotal;
        $headertransaction->save();
        

        if(TotalTransaction::all()->first() != NULL){
            $idheader = TotalTransaction::all()->last();
            $akhir = $idheader->id;

            foreach($cart as $c){
                $detailtransaction = new DetailTransaction();

                $detailtransaction->IDProduct = $c->IDProduct;
                $detailtransaction->total_price = $c->total_price;
                $detailtransaction->quantity = $c->quantity;
                $detailtransaction->transaction_id = $akhir;
                $detailtransaction->save();
            }
        }

        Cart::truncate();

        $detail = TotalTransaction::
        join('detailtransactions', 'detailtransactions.transaction_id', '=', 'totaltransactions.id')
        ->join('products', 'detailtransactions.IDProduct', '=', 'products.productID')
        ->select('transaction_id', 'detailtransactions.quantity', 'fotoProduk', 'total_price', 'grandtotal', 'productName')
        ->where('grandtotal', '!=', '0')
        ->get();

        return view('/ecom/checkout', compact('user', 'detail'));
    }

    // public function checkoutpage(){
    //     $userLogin = auth()->User()->id;

    //     $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
    //     ->where('id', "=", $userLogin)
    //     ->get();

    //     $detail = TotalTransaction::
    //     join('detailtransactions', 'detailtransactions.transaction_id', '=', 'totaltransactions.id')
    //     ->join('products', 'detailtransactions.IDProduct', '=', 'products.productID')
    //     ->select('transaction_id', 'detailtransactions.quantity', 'fotoProduk', 'total_price', 'grandtotal', 'productName')
    //     ->where('grandtotal', '!=', '0')
    //     ->get();
    //     return view('/ecom/checkout', compact('user', 'detail'));

    // }

    public function editalamat(){
        $userLogin = auth()->User()->id;

        $alamat = AlamatPengiriman::select('id', 'userID','namaPenerima', 'nomorHP','alamat','provinsi','kota')
        ->where('userID', "=", $userLogin)
        ->get();

        $user = User::select('id','name', 'dob', 'nomorHP','alamat','provinsi','kota', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();

        return view('/ecom/editalamat', compact('alamat', 'user'));
    }
    public function editalamatID($userID){
      
        return view('/ecom/checkout');
    }

    public function destroyalamat(Request $req){
        $findalamatid = $req->id;
        $findalamat = AlamatPengiriman::find($findalamatid)->delete();

       return back()->with('success_message', 'Alamat has been removed');
   }

    public function tambahalamat()
    {
        $provinsi = $this->get_province();

        return view('/ecom/tambahalamat', compact('provinsi'));
    }

    public function tambahalamatbaru(Request $request)
    {
        $userLogin = auth()->User()->id;
        
        $alamatpengiriman = new AlamatPengiriman();
        $alamatpengiriman->userID = $userLogin;
        $alamatpengiriman->namaPenerima = $request->input('namaPenerima');
        $alamatpengiriman->nomorHP = $request->input('nomorHP');
        $alamatpengiriman->alamat = $request->input('alamat');
        $alamatpengiriman->provinsi = $request->input('provinsi');
        $alamatpengiriman->kota = $request->input('kota');

        $alamatpengiriman->save();

        // $alamat = AlamatPengiriman::select('userID','namaPenerima', 'nomorHP','alamat')
        // ->where('userID', "=", $userLogin)
        // ->get();

        
        return redirect()->route('editalamat');

    }

    public function backcheckout(){
        return redirect()->route('ecom.checkout');
    }

    

  //$list= DB::table('list_produk')->groupby('jenisProduk','id', 'merekProduk', 'created_at', 'updated_at')->get();

  
}
