<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Cart;
use Illuminate\Support\Facades\DB;
use App\User;



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
         //$product = Product::where('productID', '=', $req->productID)->first();

        // $product = session::forget('cart', $id);
        // if(empty($product)) {
        //     return back();
        // }
        $findcart->delete();
        return back()->with('success_message', 'Item has been removed');
    }

    public function checkout(Request $req){
        $cart = Cart::all();
        
    }
}
