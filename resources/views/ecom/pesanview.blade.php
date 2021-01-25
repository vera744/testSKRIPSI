
@extends('layouts.layoutEcommerce')

@section('title', "Transaksi Anda")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
@if ($message = Session::get('sukses'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif
<a href="/pesanview">
<button class="btn btn-info" style="float:center;" value="editdata">Perlu Dibayar</button>
</a>
<a href="/recordtransaksi">
<button class="btn btn-info" style="float:center;" value="editdata">Record Transaksi</button>
</a>
<br>
<br>
@if (count($belumbayar)> 0 )

@foreach($belumbayar as $value)
<form action="/bayar/{{$value->id}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('POST')}}

<div class="card" style="500px">
    <div class="card-body">
    <h5 class="card-title">ID Transaksi : {{$value->id}}</h5>
        <h5 class="card-title">Total Pembayaran : Rp. {{number_format($value->total)}}</h5>
        <h5>----------------------------------------</h5>
        <h6>{{$value->namePayment}}</h6>
        <h6>No Rekening: {{$value->norek}}</h6>
        <br>
        Batas Pembayaran :
        Tanggal {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 23:59 WIB

        <br>
        <button class="btn btn-info" style="float:center;" value="editdata">Bayar</button>
        <br>
        <br>
        <h5>Detail Produk</h5>

          <table class="table">
          <thead>
              <tr>
              <th class="column-spacer"></th>
                  <th scope="col">Produk</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Harga</th>
                  <th></th>
                  <th class="column-spacer"></th>
                  <th></th>
              </tr>
                  </thead>


          <tbody>
          @foreach($detail as $detailprod)
              @if($value->id == $detailprod->transaction_id)
          <tr class="">
                      <td> 
                      <img src="/storage/fotoProduk/{{$detailprod->fotoProduk}}"height="150" width="150">
                    
                      </a>
                      <td class="align-middle"><strong>{{$detailprod->productName}}</strong></td>
                      <td class="align-middle ">{{$detailprod->quantity}}</td>
                      <td class="align-middle">Rp. {{number_format($detailprod->total_price)}},-</td>
          </tr>
          @endif
          @endforeach
          </tbody>
          </table>

    </div>
</div>
</form>
<br>
@endforeach

@else
<div style="height:500px">

<h3>Tidak ada transaksi yang perlu dibayar</h3>
</div>
@endif
@endsection
