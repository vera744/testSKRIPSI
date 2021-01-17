@extends('layouts.auths')
@section('title','Home')

@section('content')

@if(Auth::user()->role=="member" )
<h3>HELLO GAISS</h3>
@endif

@if(Auth::user()->role=="admin" )

  <div class="bordered-center col-3" style="background-color:#7C69EF">
    <h2>{{count($registered)}}<br>pengguna <br>
        telah bergabung</h2>
  </div>
  <div class="bordered-center col-3" style="background-color: #42BA96">
    @if (count($ditinjau)<1)
    <h2>Belum ada <br> transaksi baru sejauh ini.</h2>
    @endif
    @if (count($ditinjau)>0)
    <h2>Anda memiliki <br> {{count($ditinjau)}} <br> transaksi baru.</h2>
    <a href="http://" style="color: white">Tinjau sekarang</a>
    @endif
  </div>
  <div class="bordered-center col-3" style="background-color: #FFC107">
    <h2>Terdapat <br>{{count($gagal)}} <br> produk baru<br>    <a href="http://" style="color: white">Tinjau sekarang</a>
    </h2>
  </div>

@endif


@endsection
