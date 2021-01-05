@extends('layouts.layoutEcommerce')

@section('title', "E-Commerce")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')


<div class="search-container container">
    <h1>Hasil Pencarian</h1>
    <p>{{$products->count()}} Hasil untuk '{{request()->input('query')}}'</p>
    
<div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class = "card-header">
                    <strong>Kategori</strong>
                </div>
                <div class="card-body">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="/produkkategoriHP">Handphone
                        <!-- <img src="kategori/phone.png" width="30" height="30" alt="">Handphone -->
                    </a>

                    <a class="navbar-brand" href="/produkkategoriLaptop">Laptop
                        
                    </a>

                    <a class="navbar-brand" href="/produkkategoriElektronik">Elektronik
                    </a>
                    </nav>
                    
                </div>
            </div>
        </div>
    
       
    <div class="col-md-9">
            <div class="card" width="100" height="100">
                <div class="card-header">
                    <strong>
                        Produk
                    </strong>
                </div>

               
    <div class="card-body">

                <div class="row">
                @if (count($products)> 0 )
                @foreach($products as $value)
                <div class="col-md-4">
             
                
                <a href="/ecom/detailproduct/{{$value->productID}}" class="productName">
                    <div class="card" style="width: 250px; height: 350px;">
                        <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="250" width="250">
                        <div class="card-body">
                            {{ $value->namaKategori }}
                            <h6>
                            {{ $value->merekProduk }}
                            {{ $value->productName }}
                            </h6>
                            <h6>
                                Rp. {{ number_format($value->loan) }}
                            </h6>
                            
                        </div>
                    </div>
                    </a>      
                </div>
                @endforeach
                @else
                <nav class="navbar navbar-light bg-light">
        <p class="font-weight-bold" style="text-align:center">Produk tidak ditemukan</p>
                @endif
            </div>
        
                </div>

</div>

   
@endsection

@section('extra-js')

@endsection
