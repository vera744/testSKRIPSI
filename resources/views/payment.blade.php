
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')
@section('title','Pembayaran')
@section('content')

@foreach($mortgages as $value)


<div>
    <div  class="d-flex justify-content-center">
        <h1 style="text-align: center">PEMBAYARAN</h1>
    </div>
    <div style="border: 1px solid #19365C;border-radius: 10px; margin:10px">
     <div style="margin: 10px">
        <h2>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</h3>
        <label>Durasi Pinjaman : </label>
        @php
            $date1=date_create(date('Y-m-d'));
        $date2=date_create($value->startDate);

      if($date2<$date1){
        $diff=date_diff($date2,$date1); 
        $div=$diff->format("%a")/30;
        $rounded = round($div);
      }

      else {
        $diff=date_diff($date1,$date1);
        $div=$diff->format("%a")/30;
        $rounded = round($div);
      }
      
      echo ($rounded);
      echo (" bulan");
        @endphp
        <br>
        <label>Pinjaman : Rp. {{number_format($value->loan)}}</label> <br>
        @php

        $raterate = 0.03;
        $bunga = $raterate * $value->loan * $rounded;
        @endphp
        <label>Bunga Pinjaman : Rp. {{number_format($bunga)}}</label> <br>
        <label>Total Pembayaran : Rp. </label>
        @php
        echo number_format($bunga+$value->loan);
        @endphp

     </div>
    </div>

    <div class="d-flex justify-content-center">

        <a href="/manage/complete/{{$value->mortgageID}}" class="btn style1">Bayar</a>
    </div>

</div>


@endforeach




<script>
</script>
@endsection