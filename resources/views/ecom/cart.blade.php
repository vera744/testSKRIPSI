@extends('layouts.layoutEcommerce')

@section('title', "Keranjang")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">


@section('content')
@if ($message = Session::get('Delete'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif

<br>
<h3 style="text-align:center">Keranjang Anda</h3>
<br>

    @if (count($cart)> 0 )

    <table class="table">
        <thead class="" style="background-color: #19365C;color:whitesmoke">
            <tr class="">
                <th class="table-image"></th>
                <th scope="col">Produk</th>
                <th scope="col" class="">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Berat Produk (gram)</th>
                <th scope="col">Aksi</th>
                {{-- <th class="column-spacer"></th> --}}
                <th></th>
            </tr>
                </thead>
            <tbody>
                @foreach($cart as $value)
                  
                <tr class="">
                    <td> 
                    <a href="/ecom/detailproduct/{{$value->IDProduct}}">
                    <img src="/storage/fotoProduk/{{$value->fotoProduk}}"height="150" width="150">
                   
                    </a>
                    <td class="align-middle"><strong>{{$value->productName}}</strong></td>
                    <td class="align-middle text-center">{{$value->quantity}}</td>
                    <td class="align-middle text-center" style="color: #f95a37; font-weight:bold">Rp. {{number_format($value->total_price)}},-</td>
                    <td class="align-middle text-center">{{$value->productWeight}}</td>
                    
                    <td class="align-middle">
                    <form action="{{ url('/destroy') }}" method="post"><br>
                        {{ csrf_field() }}
                        <input type="hidden" name="cartid" value="{{$value->id}}">
                        <input type="hidden" name="qty" value="{{$value->quantity}}">
                        <input type="hidden" name="flowerid" value="{{$value->total_price}}">
                        <button type="submit" class="btn btn-danger" style="float:center;">Hapus</button>
                        </form>
                    </td>
                  
                    </tr>
                @endforeach
            </tbody>

    </table>
    <form action="{{ url('/checkout') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                                <table class="table">
                                    <thead>
                                        <tr class="">
                                            <th class="text-right">
                                            <h4>Total Harga :</h4>
                                            </th>
                                            
                                            <th class="text-right">
                                            <h4 style="color: #f95a37; font-weight:bold; font-family:sans-serif"> Rp. {{number_format($total_price)}},- </h4>
                                            </th>
                                            
                                            <th class="text-center">
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('Pembayaran') }}
                                            </th>
                                        </tr>
                                    </thead>

                                </table>
                                            
                                </div>
                                </form>
    @else
    
    <div style="height: 400px">

        <p class="font-weight-bold" style="text-align:center">Anda belum memasukkan produk ke dalam keranjang</p>
        
        <div class="d-flex justify-content-center">
          <img src="/images/nodata.png" alt="" srcset="" width="300px" height="300px">
        </div>
    </div>
        
    @endif
@endsection