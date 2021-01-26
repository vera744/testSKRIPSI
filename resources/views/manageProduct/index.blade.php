
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')

@section('title','Manage Product')



@section('content')
<div class="unrev">
    <div class="col-12" >
        <p class="font-weight-bold" style="font-size: 25pt">Produk Baru</p>
        @if (count($unreviewed)<1)
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#nodata">Belum ada produk baru untuk saat ini</button>
        <div id="nodata" class="collapse">
          <img src="/images/nodata.png" alt="" srcset="" width="300px" height="300px">
        </div>
        @endif
        @if (count($unreviewed)>0)
        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Tinjau Sekarang</button>
        @endif
        <div id="demo" class="collapse">
            @if(count($unreviewed)>0)
            
            <div class="card-body">
                <div class="row">
                    @foreach($unreviewed as $value)
                    <div style="margin: 50px">
                        
                            <div class="card" style="width: 250px; height: 400px;">
                                <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="250" width="250">
                                <div class="card-body">
                                    {{ $value->namaKategori }}
                                    <h6>
                                        {{ $value->merekProduk }}
                                        {{ $value->productName }}
                                    </h6>

                                    <h6>
                                        Rp. {{ number_format($value->productPrice) }},-
                                    </h6>
                                                                    <a href="manageProduct/edit/{{$value->productID}}" class="btn btn-primary">Edit Data</a>

                                </div>
                            </div>
                       
                        
                    </div>
                    @endforeach
                </div>
            </div>
        </div> 
            @endif
        </div>
    </div>  

<div class="reviewed" style="margin-top: 10px">
     <div class="col-12">
        <p class="font-weight-bold" style="font-size: 25pt">Data Produk</p>
        
        <div class="card-body">
            <div class="row">
                @foreach($product as $value)
                <div class="col-md-2.5 mb-3" style="margin: 10px">
                    
                        <div class="card" style="width: 250px; height: 400px;">
                            <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="250" width="250">
                            <div class="card-body">
                                
                                <h6>
                                    {{ $value->productName }}
                                </h6>
                                <h6>
                                    {{ $value->productWeight }} gram
                                </h6>

                                <h6>
                                    Rp. {{ number_format($value->productPrice) }},-
                                </h6>
                                                                <a href="manageProduct/edit/{{$value->productID}}" class="btn btn-primary">Sunting Data</a>

                            </div>
                        </div>
                    
                    
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection