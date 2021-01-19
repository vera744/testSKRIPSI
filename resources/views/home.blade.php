@extends('layouts.auths')
@section('title','Home')

@section('content')

@if(Auth::user()->role=="member" )
<h3>HELLO GAISS</h3>
@endif

@if(Auth::user()->role=="admin" )
<div class="row admin">
  <div class="col-4">'
    <div class="bordered-center" style="background-color:#7C69EF"data-toggle="collapse" data-target="#ungu">
      <h2>{{count($registered)}}</h2>
        <img src="{{asset('images/user.png')}}" width="100">
    </div>
    <div class="bordered-center" style="background-color: #42BA96"data-toggle="collapse" data-target="#hijau">
      {{-- @if (count($ditinjau)<1)
      <h2>Belum ada <br> transaksi baru sejauh ini.</h2>
      @endif
      @if (count($ditinjau)>0)
      <h2>Anda memiliki <br> {{count($ditinjau)}} <br> transaksi baru.</h2>
      <a href="manageGadai" style="color: white">Tinjau sekarang</a>
      @endif --}}
      <h2>{{count($ditinjau)}}</h2>
      <img src="{{asset('images/trans.png')}}" width="100">
    </div>
  
    <div class="bordered-center" style="background-color: #FFC107" data-toggle="collapse" data-target="#kuning">
    {{-- @if(count($gagal)<1)
      <br>
      <h2>Belum ada <br> produk baru <br> untuk saat ini<br>
        <a href="manageProduct" style="color: white">Tinjau produk</a>
      </h2>
    
    @endif
  
    @if(count($gagal)>0)
    <div class="bordered-center" style="background-color: #FFC107">
      <h2>Terdapat <br>{{count($gagal)}} <br> produk baru<br>    <a href="manageProduct" style="color: white">Tinjau sekarang</a>
      </h2>
      @endif --}}
      <h2>{{count($gagal)}}</h2>
      <img src="{{asset('images/prods.png')}}" width="100">
    </div>    
  
  @endif
  
  
  </div>


  {{-- batas --}}
  <div class="col-8 admin" style="margin-top: 10px">
    <div id="ungu" class="collapse">
      <h1>Pengguna</h1>
     <h2> Sebanyak {{count($registered)}} orang telah bergabung dengan layanan.</h2>
     <hr>
    </div>

    <div id="hijau" class="collapse">
       @if (count($ditinjau)<1)
       <h1>Transaksi</h1>
      <h2>Semua transaksi telah anda tinjau. <br> Sejauh ini belum ada transaksi terbaru.</h2>
      
      @endif
      @if (count($ditinjau)>0)
      <h2>Anda memiliki <br> {{count($ditinjau)}} <br> transaksi baru.</h2>
      <a href="manageGadai" style="color: white">Tinjau sekarang</a>
      @endif
      <hr>
    </div>
    
    <div id="kuning" class="collapse">
       @if(count($gagal)<1)
      <br>
      <h1>Atur Produk</h1>
      <h2>Belum ada produk baru untuk saat ini</h2>
      <a href="manageProduct" class="btn style1">Tinjau data produk yang tersedia.</a>
    @endif
  
    @if(count($gagal)>0)
      <h2>Terdapat {{count($gagal)}} produk baru</h2>   
      <a href="manageProduct" class="btn style1">Tinjau sekarang</a>
      @endif
      <hr>
    </div>
  </div>
</div>
  
@endsection

