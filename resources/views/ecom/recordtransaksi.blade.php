
@extends('layouts.layoutEcommerce')

@section('title', "Pesan")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')


<a href="/pesanview">
    <button class="btn btn-primary" style="float:center;font-size:15px;" value="editdata">Perlu Dibayar</button>
  </a>
  
  <a href="/recordtransaksi">
    <button class="btn btn-primary" style="float:center;font-size:15px;" value="editdata">Riwayat Transaksi</button>
  </a>

<br>
<br>

@if (count($sudahbayar)> 0 )

@foreach($sudahbayar as $value)
<div class="card">
    <div class="card-header">
        ID Transaksi : {{$value->id}}
    </div>
    <div class="card-body">
      <label class="col-md-3 col-form-label text-md-left" style="font-size:30px"></label>
      <label class="col-md-3 col-form-label text-md-left" style="font-size:20px">Total Pembayaran</label>
      <label class="col-md-5 col-form-label text-md-left" style="font-size:20px;color:#f95a37; font-weight:bold; font-family:sans-serif">Rp. {{number_format($value->total)}}</label>
      
      <hr>
      <label class="col-md-3 col-form-label text-md-left" style="font-size:30px"></label>
      <label class="col-md-3 col-form-label text-md-left" style="font-size:15px">Metode Pembayaran</label>
      <label class="col-md-3 col-form-label text-md-left" style="font-size:15px">{{$value->namePayment}}</label>

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
<br>
@endforeach
@else
<div style="height: 400px">

    <p class="font-weight-bold" style="text-align:center">Anda Belum Melakukan Transaksi</p>
    
    <div class="d-flex justify-content-center">
      <img src="/images/nodata.png" alt="" srcset="" width="300px" height="300px">
    </div>
</div>
@endif
@endsection