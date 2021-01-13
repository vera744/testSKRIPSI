<?php

namespace App\Http\Controllers;

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


class CartController extends Controller
{
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

        $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();
        
        // if(AlamatPengiriman::all() == NULL){

            // $alamatpengiriman = new AlamatPengiriman();
            // $alamatpengiriman->userID = $userLogin;
            // $alamatpengiriman->nama = $userName;
            // $alamatpengiriman->nomorHP = $userNomor;
            // $alamatpengiriman->alamat = $userAlamat;
    
            // $alamatpengiriman->save();

        // }

        // else{

        // $alamatcek = AlamatPengiriman::select('userID')->get();

        // foreach($alamatcek as $a){
        //     if($userLogin == $a->userID){
        //         $alamatpengiriman = new AlamatPengiriman();
        //         $alamatpengiriman->userID = $userLogin;
        //         $alamatpengiriman->nama = $userName;
        //         $alamatpengiriman->nomorHP = $userNomor;
        //         $alamatpengiriman->alamat = $userAlamat;
        
        //         $alamatpengiriman->save();
        //     }
        // }

    //}
      
        foreach($cart as $c){
            $grandtotal += $c->total_price;
        }
        $total = $testongkir + $grandtotal;

        $alamat = AlamatPengiriman::select('userID','nama', 'nomorHP','alamat')
        ->where('userID', "=", $userLogin)
        ->get();

        return view('/ecom/checkout', compact('user', 'cart', 'grandtotal', 'total', 'testongkir', 'alamat'));

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

        $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();

         $detail = TotalTransaction::
        join('detailtransactions', 'detailtransactions.transaction_id', '=', 'totaltransactions.id')
        ->join('products', 'detailtransactions.IDProduct', '=', 'products.productID')
        ->select('transaction_id', 'detailtransactions.quantity', 'fotoProduk', 'total_price', 'grandtotal', 'productName')
        ->where('grandtotal', '!=', '0')
        ->get();

        return view('/ecom/checkout', compact('user', 'detail'));
    }

    public function checkoutpage(){
        $userLogin = auth()->User()->id;

        $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();

        $detail = TotalTransaction::
        join('detailtransactions', 'detailtransactions.transaction_id', '=', 'totaltransactions.id')
        ->join('products', 'detailtransactions.IDProduct', '=', 'products.productID')
        ->select('transaction_id', 'detailtransactions.quantity', 'fotoProduk', 'total_price', 'grandtotal', 'productName')
        ->where('grandtotal', '!=', '0')
        ->get();
        return view('/ecom/checkout', compact('user', 'detail'));

    }

    public function editalamat(){
        $userLogin = auth()->User()->id;

        $alamat = AlamatPengiriman::select('id','nama', 'nomorHP','alamat')
        ->where('id', "=", $userLogin)
        ->get();

        $user = User::select('id','name', 'dob', 'nomorHP','alamat', 'email', 'password')
        ->where('id', "=", $userLogin)
        ->get();

        return view('/ecom/editalamat', compact('alamat', 'user'));
    }
    public function editalamatID($userID){
      
        return view('/ecom/checkout');
    }

    public function tambahalamat()
    {
       
        return view('/ecom/tambahalamat');
    }

    public function tambahalamatbaru()
    {
        $userLogin = auth()->User()->id;

        return view('/ecom/tambahalamat');
    }


  
}
