@extends('layouts.layoutEcommerce')
@section('title', "Checkout")

@section('content')
<br>
    <h3 style="text-align:center">Checkout</h3>
<br>
<form action="{{ url('/pesan') }}" method="POST">
                        {{ csrf_field() }}
<div class="card">
    <div class="card-body">
        <div class="form-group" >
            <select class="form-control input-sm" name="alamatpengiriman" id="kondisiProduk_id">
                <option value="0" disabled="true" selected="true">Alamat Pengiriman</option>
                @foreach($user as $value)
                    <option value="{{$value->id}}">{{$value->name}} |
                    {{$value->nomorHP}} |
                    {{$value->alamat}} |
                    {{$value->provinsi}} |
                    {{$value->kota}} 
                    </option> 
                    @endforeach
                 @foreach($alamat as $value)
                    <option value="{{$value->id}}">{{$value->namaPenerima}} |
                    {{$value->nomorHP}} |
                    {{$value->alamat}} |
                    {{$value->kota}} |
                    {{$value->provinsi}}
                    </option> 
                    @endforeach
                </select>
</div>
<a href="/editalamat" class="btn style1">
    {{ __('Edit Alamat') }}
</a>
</div>

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
                
                <div class="form-group col-md-8">
                    <label>
                        Pilih Ekspedisi<span>*</span>
                    </label>

                    <select name="kurir" id="kurir" class="form-control">
                        <option value="">Pilih kurir</option>
                        <option value="jne">JNE</option>
                        <option value="tiki">TIKI</option>
                        <option value="pos">POS INDONESIA</option>
                    </select>
                </div>
                
                <div class="form-group col-md-8">
                    <label>
                        Pilih Layanan<span>*</span>
                    </label>
                    <select name="layanan" id="layanan" class="form-control">
                        <option value="">Pilih layanan</option>
                    </select>
                </div>
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
                <div class="form-group">
                <select class="form-control input-sm" name="payID" id="payID">
                <option value="0" disabled="true" selected="true">Metode Pembayaran</option>
                @foreach($metode as $value)
                    
                    <option value="{{$value->id}}" name="payID" id="payID">{{$value->namePayment}}</option> 
                    @endforeach
                </select>
            </div>
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
</form>

@endsection