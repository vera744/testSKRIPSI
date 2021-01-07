<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Cart;
use Illuminate\Support\Facades\DB;



class CartController extends Controller
{
    public function add(Request $request, $id){
        
        $products = Product::
        select('productID', 'productName', 'productPrice', 'fotoProduk', 'productPrice','productQuantity')
        ->where('productID', "=", $id)
        ->first();

        
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($products,  $products->$id, $products->productName, $products->productPrice);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return back();

        // Cart::session(auth()->id())->add(array(
        //     'id' => $product->id,
        //     'name' => $product->name,
        //     'price' => $product->price,
        //     'quantity' => 1,
        //     'attributes' => array(),
        //     'associatedModel' => $product

        // ));

        // return back();
    }

    public function index()
    {
        $products = Product::
        select('productID', 'productName', 'productPrice', 'fotoProduk', 'productPrice','productQuantity')
        ->first();

        if (!Session::has('cart')){
            return view('ecom.cart');

        }
        $mightAlsoLike = Product::inRandomOrder()->take(4)->get();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        return view('ecom.cart')->with([
            'products'=> $cart->items, 
            'totalPrice'=>$cart->totalPrice,
            'mightAlsoLike' => $mightAlsoLike,
            'products' => $products,
        ]);
    }

    public function destroy($id){
        $product = session::forget('cart', $id);
        if(empty($product)) {
            return back();
        }
        $product->destroy($id);
        return back()->with('success_message', 'Item has been removed');
    }
}
