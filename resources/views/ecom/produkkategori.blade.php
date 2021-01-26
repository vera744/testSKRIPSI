@extends('layouts.layoutEcommerce')

@section('title', "E-Commerce")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class = "card-header">
                    <strong>Kategori</strong>
                </div>
                
                <div class="card-body">
                    <nav class="navbar navbar-light bg-light">
                        <a class="navbar-brand" href="/produkkategoriHP">Handphone
                        <!-- <img src="kategori/phone.png" width="30" height="30" alt="">Handphone --></a>
                        <a class="navbar-brand" href="/produkkategoriLaptop">Laptop</a>
                        <a class="navbar-brand" href="/produkkategoriElektronik">Elektronik</a>
                    </nav>
                </div>
            </div>
        </div>
    
        <div class="col-md-9">
            <div class="card" width="100" height="100">
                <div class="card-header">
                    <strong>Produk</strong>
                </div>

               <div class="card-body">
               @if (count($products)> 0 )
                    <div class="row">
                        @foreach($products as $value)
                        <div class="col-md-4">
                            <a href="/ecom/detailproduct/{{$value->productID}}" class="productName">
                                <div class="card" style="width: 250px; height: 350px;">
                                    <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="250" width="250">
                                    <div class="card-body">
                                        {{ $value->namaKategori }}
                                        <h6>
                                        {{ $value->merekProduk }}
                                        {{ $value->productName }}</h6>
                                        <h6>
                                        Rp. {{ number_format($value->loan) }}</h6>
                                    </div>
                                </div>
                            </a>      
                        </div>
                        @endforeach
                    </div>
                @else
                <div class="row">
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <p class="font-weight-bold" style="text-align:center">Anda tidak mempunyai transaksi untuk saat ini</p>
                        </div>
                            
                        <div class="row justify-content-center">
                            <div class="d-flex justify-content-center">
                                <img src="/images/nodata.jpg" alt="" srcset="" width="300px" height="300px">
                            </div>
                        </div>
                    </div>
                </div>
                        <!-- <nav class="navbar navbar-light bg-light">
                        <p class="font-weight-bold" style="text-align:center">Tidak Ada Produk Dalam Kategori Ini</p> -->
                @endif
                    
                </div>
            </div>
        </div>  
    </div>
</div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
   
@endsection

