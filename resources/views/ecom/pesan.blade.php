@extends('layouts.layoutEcommerce')

@section('title', "Pembayaran")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')
@if ($message = Session::get('sukses'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif

  @foreach($detail as $value)
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
        <div class="text-center">
          <a href="/pesanview" class="text-center">
            <button class="btn btn-success" style="float:center;" value="editdata">Bayar Sekarang</button>
          </a>
        </div>
      </div>
    </div>
   @endforeach             

<br>


@endsection