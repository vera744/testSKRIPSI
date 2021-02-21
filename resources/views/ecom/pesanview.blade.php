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
  <button class="btn btn-primary" style="float:center;font-size:15px;" value="editdata">Perlu Dibayar</button>
</a>

<a href="/recordtransaksi">
  <button class="btn btn-primary" style="float:center;font-size:15px;" value="editdata">Riwayat Transaksi</button>
</a>

<br>
<br>

@if (count($belumbayar)> 0 )

@foreach($belumbayar as $value)
  <form action="/bayar/{{$value->id}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{method_field('POST')}}

    <div class="card" style="500px">
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
        <label class="col-md-3 col-form-label text-md-left" style="font-size:30px"></label>
        <label class="col-md-3 col-form-label text-md-left" style="font-size:15px">Nomor Rekening</label>
        <label class="col-md-3 col-form-label text-md-left" style="font-size:15px">{{$value->norek}}</label>
        <br>
        <br>
        <label class="col-md-3 col-form-label text-md-left" style="font-size:30px"></label>
        <label class="col-md-5 col-form-label text-md-center" style="font-size:20px">a/n PT. Garda Dana Indonesia, tbk</label>
        <br>
        <label class="col-md-3 col-form-label text-md-left" style="font-size:30px"></label>
        <label class="col-md-5 col-form-label text-md-center" style="font-size:15px;color:red">Batas Pembayaran :
          {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 23:59 WIB
        </label>

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
          <br>
          <div class="text-center">
            <button class="btn btn-success" style="float:center;font-size:15px;font-weight:bold" value="editdata">Bayar Sekarang</button>
          </div>
          <br>

    </div>
</div>
</form>
<br>
@endforeach


@else
    <div style="height: 400px">

        <p class="font-weight-bold" style="text-align:center">Anda Tidak Memiliki Transaksi yang Harus Dibayar</p>
        
        <div class="d-flex justify-content-center">
          <img src="/images/nodata.png" alt="" srcset="" width="300px" height="300px">
        </div>
    </div>
@endif
@endsection
