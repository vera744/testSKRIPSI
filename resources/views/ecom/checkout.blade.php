@extends('layouts.layoutEcommerce')

@section('content')
<br>
    <h3 style="text-align:center">Checkout</h3>
<br>

<div class="card">

 <form action="{{ url('/editalamat') }}" method="POST">
                        {{ csrf_field() }} 
@if(count($alamat) > 0 )


  @foreach($alamat as $alamat)
  <div class="card-body">
    <h3>Alamat Pengiriman</h3> <br>
    <h5 class="card-title">Nama : {{$alamat->nama}}</h5>
    <h5 class="card-title">Nomor Handphone : {{$alamat->nomorHP}}</h5>
    <h5 class="card-title">Alamat : {{$alamat->alamat}}</h5>

    <button id="btnEdit" class="btn btn-info" style="float:center;" value="editdata">
                                    {{ __('Edit') }}
    </button>

  </div>
@endforeach
@else
<div class="card-body">
<button id="btnEdit" class="btn btn-info" style="float:center;" value="editdata">
                                    {{ __('Tambah Alamat') }}
    </button>
</div>
</form>
@endif
</div>
<br>
<div class="card">
    <div class="card-body">
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Produk</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th></th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
                </thead>
            <tbody>

            
                @foreach($cart as $value)
              
                <tr>
               
                    <td> 
                    <img src="/storage/fotoProduk/{{$value->fotoProduk}}"height="150" width="150">
                    <label for="" >  {{$value->productName}}</label>
                    </td>
                
                    <td>{{$value->quantity}}</td>
                    <td>{{number_format($value->total_price)}}</td>
                    <th class="column-spacer"></th>
                    <th class="column-spacer"></th>
                    <th class="column-spacer"></th>

                    </tr>
                
                @endforeach
            </tbody>

    </table>
    <table class="table">
        <tr>
            <td>
                <label for="">Pesan: </label>
                <input id="pesan" type="text" name="pesan" > 
            </td>
            <th class="column-spacer"></th>
            
            <td>
                <label for="">JNE</label>
                <button id="btnEdit"  class="btn btn-info" style="float:center;" value="editdata">
                                    {{ __('Edit') }}
                </button>
               
            </td>
            <td>   Rp.{{number_format($testongkir)}}</td>
        
        </tr>
            <tr>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>

                <td>Total Pesanan: </td>
                <td>Rp. {{number_format($grandtotal)}}</td>
            </tr>
           
    </table>
   

   
</div>
</div>

<br>

<div class="card">
  <div class="card-body">
        <table class="table">
            <tbody>
            <tr>
                <td>Metode Pembayaran
                <button>Test</button>
                </td>
               
           
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            </tr>
            <tr>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <td>Subtotal untuk Produk: </td>
            <td>Rp. {{number_format($grandtotal)}}</td>

            </tr>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <td>Total Ongkos Kirim: </td>
            <td>Rp. {{number_format($testongkir)}}</td>

            <tr>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <th class="column-spacer"></th>
            <td>Total Pembayaran: </td>
            <td>Rp. {{number_format($total)}}</td>
            <tr>
           
            </tr>
            
            </tr>
           
            </tbody>
        </table>
        <tr>

            <button type="submit" class="btn btn-success">
                                        {{ __('Buat Pesanan') }}
            </tr>
  </div>
</div>

@endsection