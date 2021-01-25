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
    <div class="card-body">
        <h5 class="card-title">Total Pembayaran : Rp. {{number_format($value->total)}}</h5>
        <h5>----------------------------------------</h5>
        <h6>{{$value->namePayment}}</h6>
        <h6>No Rekening: {{$value->norek}}</h6>
        <br>
        Batas Pembayaran :
        Tanggal {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 23:59 WIB


        <br>
        <br>
        <a href="/pesanview">
        <button class="btn btn-primary" style="float:center;" value="editdata">Bayar Sekarang</button>

        </a>
    </div>
</div>

<br>
@endforeach


@endsection