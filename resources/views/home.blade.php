@extends('layouts.auths')
@section('title','Home')

@section('content')

@if(Auth::user()->role=="member" )
<h3>HELLO MEMBER</h3>
@endif

@if(Auth::user()->role=="admin" )

@if($ditinjau)
<div class="container">
    <div class="row">
      <div class="col-sm">
        <div class="bordered-center" style="text-align: center">
            <h2>Anda mempunyai <br>
                {{count($ditinjau)}} <br>
                transaksi baru</h2>
            <button class="btn style1">Tinjau Sekarang</button>
        </div>
        
      </div>
      <div class="col-sm">
        <div class="bordered-center" style="text-align: center">
            <h2>Ada produk <br>
                {{count($ditinjau)}} <br>
                transaksi baru</h2>
            <button class="btn style1">Tinjau Sekarang</button>
        </div>
        
      </div>
      <div class="col-sm">
        <div class="bordered-center" style="text-align: center">
            <h2>Anda mempunyai <br>
                {{count($ditinjau)}} <br>
                transaksi baru</h2>
            <button class="btn style1">Tinjau Sekarang</button>
        </div>
        
      </div>
    </div>
  </div>

@endif


@endif


@endsection
