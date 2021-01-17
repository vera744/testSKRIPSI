
@extends('layouts.layoutEcommerce')
@section('title', "Pesan")

@section('content')
<a href="/pesanview">
<button class="btn btn-info" style="float:center;" value="editdata">Perlu Dibayar</button>
</a>
<a href="/recordtransaksi">
<button class="btn btn-info" style="float:center;" value="editdata">Record Transaksi</button>
</a>
<br>
<br>
@if (count($sudahbayar)> 0 )

@foreach($sudahbayar as $value)
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
    </div>
</div>
<br>
@endforeach
@else
<h3>Anda belum pernah melakukan transaksi</h3>
@endif
@endsection