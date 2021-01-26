
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
            $today=date_create(date('Y-m-d'));
        $start=date_create($value->startDate);

      if($start<=$today){
        $diff=date_diff($start,$today); 
        $div=$diff->format("%a")/30;
        $rounded = round($div);

        if($div <1){
            $rounded=1;
        }
      }


        $raterate = 0.03;
        $bunga = $raterate * $value->loan * $rounded;
      
      echo ($rounded);
      echo (" bulan");
        @endphp
        <br>
        <label>Pinjaman : Rp. {{number_format($value->loan)}}</label> <br>
        <label>Bunga Pinjaman : Rp. {{number_format($bunga)}}</label> <br>
        <label>Total Pembayaran : Rp. {{number_format($bunga)}}</label>
        <label>Silahkan melakukan pembayaran bunga pinjaman terlebih dahulu</label>
       

     </div>
    </div>

    <div class="d-flex justify-content-center">

        <a href="/manage/append/{{$value->mortgageID}}" class="btn style1">Bayar</a>
    </div>

</div>


@endforeach




<script>
</script>
@endsection
