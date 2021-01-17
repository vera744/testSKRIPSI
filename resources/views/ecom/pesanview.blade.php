
@extends('layouts.layoutEcommerce')
@section('title', "Pesan")

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

<div class="card">
    <div class="card-body">
    <h5 class="card-title">ID Transaksi : {{$value->id}}</h5>
        <h5 class="card-title">Total Pembayaran : Rp. {{number_format($value->total)}}</h5>
        <h5>----------------------------------------</h5>
        <h6>{{$value->namePayment}}</h6>
        <h6>No Rekening: {{$value->norek}}</h6>
        <br>
        Batas Pembayaran :
        Tanggal {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 25:39 WIB

        <br>
        <button class="btn btn-info" style="float:center;" value="editdata">Bayar</button>
    </div>
</div>
</form>
<br>
@endforeach

@else

<h3>Tidak ada transaksi yang perlu dibayar</h3>
@endif
@endsection