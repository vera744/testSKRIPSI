
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
        Tanggal {{ date('d-m-Y', strtotime($value->tglCO)) }}, pukul 23:59 WIB

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
        
    </div>
</div>
<br>
@endforeach
@else
<h3>Anda belum pernah melakukan transaksi</h3>
@endif
@endsection