<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\listProduk;
use App\kategoriProduk;

class EcomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

       $products = Product::
           join('mortgages', "products.productID", "=", "mortgages.productID")
           ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
           ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
           ->join('list_produk', "products.productBrand", "=", "list_produk.id")
           ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
           ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
           ->whereIn('status', ['sedang berlangsung', 'diterima', 'gagal'])
           ->where('productQuantity', "=", "1")
           ->get();
   
           return view('ecom.index')->with('products', $products);
    }

    public function productdetail($id){
        
        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->where('products.productID', "=", $id)
        ->get();
        
        return view('ecom.detailproduct')->with('products', $products);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // $namaproduk = Product::select('namaProduk');
        // $merkproduk = listProduk::select('merekProduk');
        // $kategoriproduk = kategoriProduk::select('namaKategori');
        // $gabung = "{$namaproduk} {$merkproduk} {$kategoriproduk}";
        
        $products = Product::
           join('mortgages', "products.productID", "=", "mortgages.productID")
           ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
           ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
           ->join('list_produk', "products.productBrand", "=", "list_produk.id")
           ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
           ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
           ->whereIn('status', ['sedang berlangsung', 'diterima', 'gagal'])
           ->where('productQuantity', "=", "1")
           ->where('productName', 'like', "%$query%")
           ->get();
           
        //    ->orWhere( 'merekProduk', 'like', "%$query%")
        //    ->orWhere('namaKategori', 'like', "%$query%")
           
   
        return view('ecom.search-results')->with('products', $products);
    }

    public function handphone()
    {
        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['sedang berlangsung', 'diterima', 'gagal'])
        ->where('productQuantity', "=", "1")
        ->where('namakategori', "=", "handphone")
        ->get();

        return view('ecom.produkkategori')->with('products', $products);
    }

    
    public function laptop()
    {
        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['sedang berlangsung', 'diterima', 'gagal'])
        ->where('productQuantity', "=", "1")
        ->where('namakategori', "=", "laptop")
        ->get();

        return view('ecom.produkkategori')->with('products', $products);
    }

    
    public function elektronik()
    {
        
        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['sedang berlangsung', 'diterima', 'gagal'])
        ->where('productQuantity', "=", "1")
        ->where('namakategori', "=", "elektronik")
        ->get();

        return view('ecom.produkkategori')->with('products', $products);
    }

    // public function detail(){
    //     $products = Product::
    //     select('productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk')
    //     ->get();

    //     return view('ecom.detailproduct')->with('products', $products);
    // }

  
}
