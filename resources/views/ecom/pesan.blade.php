@extends('layouts.layoutEcommerce')
@section('title', "Pesan")

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
        Tanggal {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 25:39 WIB


        <br>
        <br>
        <a href="/pesanview">
        <button class="btn btn-info" style="float:center;" value="editdata">Bayar Sekarang</button>

        </a>
    </div>
</div>

<br>
@endforeach


@endsection