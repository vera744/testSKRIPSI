<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\listProduk;
use App\kategoriProduk;
use App\Province;
use App\City;

class EcomController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

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
                $data_ongkir = $response['rajaongkir']['results'][0]['costs'][0]['cost'];
                return json_encode($data_ongkir);
            }
            
    }

    public function index(){
    
       $products = Product::
           join('mortgages', "products.productID", "=", "mortgages.productID")
           ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
           ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
           ->join('list_produk', "products.productBrand", "=", "list_produk.id")
           ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
           ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
           ->whereIn('status', ['ecom'])
           ->where('productQuantity', "=", "1")
           ->get();
   
           return view('ecom.index')->with('products', $products);
    }

    public function productdetail($id){
        $provinsi = $this->get_province();

        $provinsiAsal = Province::select('province_id','title')
        ->where('province_id', "=", 6)->get();
        
        $kotaAsal = City::select('city_id','cityTitle')
        ->where('city_id', "=", 151)->get();


        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi','keterangan_kondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->where('products.productID', "=", $id)
        ->get();
        
        return view('ecom.detailproduct', compact('products','provinsi','provinsiAsal','kotaAsal'));
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
           ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
           ->whereIn('status', ['ecom'])
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
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['ecom'])
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
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['ecom'])
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
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->whereIn('status', ['ecom'])
        ->where('productQuantity', "=", "1")
        ->where('namakategori', "=", "elektronik")
        ->get();

        return view('ecom.produkkategori')->with('products', $products);
    }

    public function back($id){
        $products = Product::
        join('mortgages', "products.productID", "=", "mortgages.productID")
        ->join('mortgage_details', "mortgages.mortgageID", "=", "mortgage_details.mortgageID")
        ->join('kategori_produk', "products.productCategory", "=", "kategori_produk.id")
        ->join('list_produk', "products.productBrand", "=", "list_produk.id")
        ->join('kondisi',"products.productCondition","=","kondisi.kondisi_id")
        ->select('products.productID', 'productName', 'productPrice','productWeight', 'namaKondisi', 'fotoProduk', 'mortgage_details.status', 'namaKategori', 'merekProduk', 'loan', 'productQuantity')
        ->where('products.productID', "=", $id)
        ->get();
        
        return view('ecom.detailproduct')->with('products', $products);
    }

    // public function detail(){
    //     $products = Product::
    //     select('productID', 'productName', 'productPrice', 'namaKondisi', 'fotoProduk')
    //     ->get();

    //     return view('ecom.detailproduct')->with('products', $products);
    // }

  
}
