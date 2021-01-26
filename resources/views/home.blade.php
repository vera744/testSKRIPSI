@extends('layouts.auths')

@section('title','Home')

@section('content')

@if(Auth::user()->role=="member" )
<div class="row admin">
  <div class="col-4">
    <div class="bordered-center ungu" style="background-color:#7C69EF">
    
    @if(count($transaksi)<1)
      <h2>Anda tidak punya transaksi untuk saat ini</h2>
      <a href="gadai/add" style="color: floralwhite">Ingin mulai transaksi?</a>
    @else
    <h2> <br> Anda punya {{count($transaksi)}} transaksi saat ini<br> <a href="gadai"  style="color: cornsilk">Tinjau transaksi anda</a> </h2>
    @endif

        
    </div>
    
  
    <div class="bordered-center" style="background-color: #FFC107">
    
      <h2><br> Ingin membeli produk? <br> <a href="/ecom" style="color: floralwhite">Cari Disini</a>      </h2>
     
    </div>  
    <div class="bordered-center" style="background-color: #42BA96"data-toggle="collapse" data-target="#hijau">
      <h2> <br> <br><a href="#" style="color: floralwhite">Syarat & Ketentuan</a></h2>
    </div>   
  
  </div>

  {{-- batas --}}
  <div class="col-8" style="margin-top: 10px">
    <h1> Halo, {{ Auth::user()->name }}</h1>
    <h2 style="color: black">@php
      date_default_timezone_set("Asia/Bangkok");
    echo date("d M y");
  @endphp</h2>  
    <h2 id="clock" style="color: black"></h2>
    <hr>


    <div id="hijau" class="collapse">
      <h1>Tata Cara Transaksi</h1>

      <img src="{{asset('images/tatacarah.png')}}" alt="" srcset="" width="800px" height="400px">
      <hr>
      <h1>Syarat Ketentuan</h1>
      <img src="{{asset('images/snk.png')}}" alt="" srcset="" width="800px" height="400px">
      <hr>
    </div>
    
    <div id="kuning" class="collapse">
     
      <hr>
    </div>


  </div>
</div>

@endif
{{-- batas user --}}
@if(Auth::user()->role=="admin" )
<div class="row admin">
  <div class="col-4">
    <div class="bordered-center ungu" style="background-color:#7C69EF"data-toggle="collapse" data-target="#ungu" id="colungu">
      <h2>{{count($registered)}}</h2>
      <a href="#">
        <img src="{{asset('images/user.png')}}" width="100">
      </a>
        
    </div>
    <div class="bordered-center" style="background-color: #42BA96"data-toggle="collapse" data-target="#hijau">
      <h2>{{count($ditinjau)}}</h2>
      <a href="#">
        <img src="{{asset('images/trans.png')}}" width="100">
      </a>
    </div>
  
    <div class="bordered-center" style="background-color: #FFC107" data-toggle="collapse" data-target="#kuning" >
      <h2>{{count($gagal)}}</h2>
      <a href="#">
        <img src="{{asset('images/prods.png')}}" width="100">
      </a>
    </div>    
  </div>


  {{-- batas --}}
  <div class="col-8 admin" style="margin-top: 10px">
    <h1>Panel Admin</h1>
    <h2>@php
      date_default_timezone_set("Asia/Bangkok");
    echo date("d M y");
  @endphp</h2>  
    <h2 id="clock"></h2>
      
    <hr>
    <div id="ungu" class="collapse">
      <h1>Pengguna</h1>
     <h2> Sebanyak {{count($registered)}} orang telah bergabung dengan layanan.</h2>
     <hr>
    </div>

    <div id="hijau" class="collapse">
      <h1>Transaksi</h1>
       @if (count($ditinjau)<1)
      <h2>Semua transaksi telah anda tinjau. <br> Sejauh ini belum ada transaksi terbaru.</h2>
      
      @endif
      @if (count($ditinjau)>0)
      <h2>Anda memiliki {{count($ditinjau)}} transaksi baru.</h2>
      {{-- <a href="manageGadai" class="btn style1">Tinjau sekarang</a> --}}
       {{-- ..... --}}

       @foreach($mortgage as $value)
      
             
     
          <div class="row">
            <div class="col-4">
              <br>
             <h2>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</h2>
             <h5>{{$value->productName}}</h5>
             <br>
            </div>
          </div>
          @endforeach
          <a class="btn btn-success" href="manageGadai">Tinjau sekarang</a>
          
       {{-- ..... --}}
      @endif
      <hr>
    </div>
    
    <div id="kuning" class="collapse">
       @if(count($gagal)<1)
      <br>
      <h1>Atur Produk</h1>
      <h2>Belum ada produk baru untuk saat ini</h2>
      <a href="manageProduct" class="btn btn-success">Tinjau data produk yang tersedia.</a>
     @endif
  
    @if(count($gagal)>0)
      <h2>Terdapat {{count($gagal)}} produk baru</h2>   
      <a href="manageProduct" class="btn btn-success">Tinjau sekarang</a>
      @endif
      <hr>
    </div>

    <img src="{{asset('images/dash.png')}}" width="450px">

  </div>
</div>

@endif 

<script>

function currentTime() {
  var date = new Date(); /* creating object of Date class */
  var hour = date.getHours();
  var min = date.getMinutes();
  var sec = date.getSeconds();
  hour = updateTime(hour);
  min = updateTime(min);
  sec = updateTime(sec);
  document.getElementById("clock").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */
  var t = setTimeout(function(){ currentTime() }, 1000); /* setting timer */
}

function updateTime(k) {
  if (k < 10) {
    return "0" + k;
  }
  else {
    return k;
  }
}

currentTime();

</script>
@endsection


