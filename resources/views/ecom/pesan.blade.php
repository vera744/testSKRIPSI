@extends('layouts.layoutEcommerce')
@section('title', "Pesan")

@section('content')

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
        <button class="btn btn-info" style="float:center;" value="editdata">OKE</button>
    </div>
</div>
<br>
@endforeach


@endsection