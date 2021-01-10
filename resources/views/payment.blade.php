
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')
@section('title','Pembayaran')
@section('content')

@foreach($mortgages as $value)


<div id="paymentBox">
    <div  class="d-flex justify-content-center">
        <h1 style="text-align: center">PEMBAYARAN</h1>
    </div>
    <div style="border: 1px solid white;border-radius: 10px; margin:10px">
     <div style="margin: 10px">
        <h2>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</h3>
        <label>Durasi Pinjaman : {{$value->duration/30}}</label><br>
        <label>Pinjaman : Rp. {{number_format($value->loan)}}</label> <br>
        @php
        $raterate = 0.03;
        $bunga = $raterate * $value->loan;
        @endphp
        <label>Bunga Pinjaman : Rp. {{number_format($bunga)}}</label> <br>
        <label>Total Pembayaran : Rp. </label>
        @php
        echo number_format($bunga+$value->loan);
        @endphp

     </div>
    </div>

</div>


@endforeach




<script>
</script>
@endsection