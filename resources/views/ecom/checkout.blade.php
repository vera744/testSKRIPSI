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
                    {{$value->namaKota}} |
                    {{$value->namaProvinsi}}
                    @endforeach
                 @foreach($alamat as $value)
                    <option value="{{$value->id}}">{{$value->namaPenerima}} |
                    {{$value->nomorHP}} |
                    {{$value->alamat}} |
                    {{$value->namaKota}} |
                    {{$value->namaProvinsi}}
                    </option> 
                    @endforeach
                </select>
            </div>
            
            <input type="hidden" value="6" class="form-control" id="province_origin" name="province_origin">
                
            <input type="hidden" value="151" class="form-control" id="city_origin" name="city_origin">
    
            @foreach ($user as $value)
                <input type="hidden" value="{{$value->idProvinsi}}" class="form-control" id="provinsi" name="provinsi">
                    
                <input type="hidden" value="{{$value->idKota}}}}" class="form-control" id="kota" name="kota">
            @endforeach


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
                        Berat Produk
                    </label>
        
                    @foreach ($cart as $value)
                      
                        <input type="text" disabled name="beratProduk" id="beratProduk" class="form-control" value="{{$value->productWeight}}" placeholder="Masukkan Berat (Gram)">
                        <small>Dalam gram, contoh = 1700 / 1,7kg</small>
                      
                    @endforeach
                </div>
                
            </td>
            <td>   
                <div class="form-group col-md-6">
                    <label>Ongkir</label>
                        
                    <input id="ongkir" type="text" disabled placeholder="Rp.{{number_format(9000)}}" class="text-dark font-weight-bold  form-control @error('ongkir') is-invalid @enderror" name="ongkir" value=""  autocomplete="ongkir" autofocus>
                </div>
            </td>
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

<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
     $(document).ready(function(){
        $('select[name="kurir"]').on('change', function(){
            // kita buat variable untuk menampung data data dari  inputan
            // name city_origin di dapat dari input text name city_origin

            let origin = $("input[name=city_origin]").val();
            // name kota_id di dapat dari select text name kota_id
            let destination = $("input[name=kota]").val();
            // name kurir di dapat dari select text name kurir
            let courier = $("select[name=kurir]").val();
            // name weight di dapat dari select text name weight
            let weight = $("input[name=beratProduk]").val();
            // alert(courier);
            if(courier){
            console.log(origin + destination + weight);

                jQuery.ajax({
                    url:"/origin/"+origin+"/"+destination+"/"+weight+"/"+courier,
                    type:'GET',
                    dataType:'json',

                    success:function(data){
                    // console.log("asik")
                    // jika tidak ada select dr provinsi maka select kota kososng / empty
                        $('input[name="ongkir"]').empty();
                        // jika ada kita looping dengan each
                        $.each(data, function(key, value){
                            // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                            $('input[name="ongkir"]').attr("value", value.value);

                        });
                    }
                });
            }
        });
    });
</script>