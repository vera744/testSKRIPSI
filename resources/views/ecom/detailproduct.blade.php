@extends('layouts.layoutEcommerce')

@section('title', "Detail Produk")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')

@foreach($products as $value)
  <form method="POST" action="/ecom/add-to-cart/{{$value->productID}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('POST')}}

    <!--Section: Block Content-->
    <section class="mb-5">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          <div id="mdb-lightbox-ui"></div>
        
          <div class="mdb-lightbox">
            <div class="row justify-content-center">
              <div class="col-md-8">
                <img src="/storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="300" width="300">  
              </div>
            </div>
          </div>
      
          <div class="row justify-content-center">
            
          </div>
        </div>
    
        <div class="col-md-6">
          <h5 name="name" id="merekProduk">{{ $value->merekProduk }} {{ $value->productName }}</h5>
          
          <p class="mb-2 text-muted text-uppercase small" name="namaKategori">{{ $value->namaKategori }}</p>
     
          <h3><span class="mr-1" name="productPrice" id="productPrice"><strong> Rp. {{ number_format($value->productPrice) }},-</strong></span></h3>
        
          <hr>

          <div class="table-responsive">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                  <th class="pl-0 w-25" scope="row" name="quantity" id="quantity"><strong>Kuantitas</strong></th>
                  <td name="productQuantity">{{ $value->productQuantity }}</td>
                </tr>
         
                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Kondisi</strong></th>
                  <td name="namaKondisi">{{$value->namaKondisi}} {{$value->keterangan_kondisi}}</td>
                </tr>

                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Berat Produk</strong></th>
                  <td name="beratProduk">{{$value->productWeight}} Gram</td>
                </tr>
              </tbody>
            </table>
          </div>

          <hr>
          
          <div class="row">
            <label class="col-md-12 col-form-label text-md-center">
              <h3>
                <strong>
                  Cek Ongkir
                </strong> 
              </h3>
            </label>
          </div>
      
          <br>
          <br>

          <div class="row">
            <div class="col-6">
              <div class="form-group row">
                <label for="" class="col-md-6 col-form-label text-md-left">{{ __('Provinsi Asal') }}</label>
        
                <div class="col-md-12">
                  <input type="text" value="DKI Jakarta" class="form-control" id="" name="" disabled>
                  <input type="hidden" value="6" class="form-control" id="province_origin" name="province_origin">
                </div>
              </div>
            
              <div class="form-group row">
                <label for="" class="col-md-6 col-form-label text-md-left">{{ __('Kota Asal') }}</label>
            
                <div class="col-md-12">
                  <input type="text" value="Jakarta Barat" class="form-control" id="" name="" disabled>
                  <input type="hidden" value="151" class="form-control" id="city_origin" name="city_origin">
                      {{-- @foreach($kotaAsal as $value)
                        <select name="kotaAsal" id="kotaAsal" class="form-control" disabled >
                          <option value="{{$value->city_id}}">{{$value->citytTitle}}</option>
                        </select>
                      @endforeach --}}
                </div>
              </div>    
            </div>  
    
            <div class="col-6">
              <div class="form-group row">
                <label for="provinsi" class="col-md-7 col-form-label text-md-left">{{ __('Provinsi Tujuan ') }}</label>
                    
                <div class="col-md-12">
                  <select name="provinsi" id="provinsi" class="form-control" >
                    <option value="">Pilih Provinsi</option>
                      @foreach($provinsi as $value)
                        <option value="{{$value['province_id']}}" namaprovinsi="{{$value['province']}}">{{$value['province']}}</option>
                      @endforeach
                  </select>   
                </div>
              </div>
        
              <div class="form-group row">
                <label for="kota" class="col-md-6 col-form-label text-md-left">{{ __('Kota Tujuan') }}</label>
        
                <div class="col-md-12">
                  <select name="kota" id="kota" class="form-control" >
                    <option value="">Pilih Kota</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <br>

          <div class="form-group row">
            <label for="beratProduk" class="col-md-4 col-form-label text-md-left">{{ __('Berat Produk') }}</label>

            @foreach ($products as $value)
              <div class="col-md-6">
                <input type="text" disabled name="beratProduk" id="beratProduk" class="form-control" value="{{$value->productWeight}}" placeholder="Masukkan Berat (Gram)">
                <small>Dalam gram, contoh = 1700 / 1,7kg</small>
              </div>    
            @endforeach
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-left">
                Pilih Ekspedisi
            </label>

            <div class="col-md-6">
              <select name="kurir" id="kurir" class="form-control">
                  <option value="">Pilih kurir</option>
                  <option value="jne">JNE</option>
                  <option value="tiki">TIKI</option>
                  <option value="pos">POS INDONESIA</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="ongkir" class="col-md-4 col-form-label text-md-left">{{ __('Ongkir') }}</label>

            <div class="col-md-6">
              <input id="ongkir" type="text" disabled placeholder="9000" class="text-dark font-weight-bold bg-info form-control @error('ongkir') is-invalid @enderror" name="ongkir" value=""  autocomplete="ongkir" autofocus>
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-12 col-form-label text-md-center">
              <button type="submit" class="btn btn-success btn-md mr-1 mb-2">
                Masukkan Keranjang
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--Section: Block Content-->
  </form>
@endforeach
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        
        //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
        //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
        $('select[name="provinsi"]').on('change', function(){

            // kita buat variable provincedid untk menampung data id select province
            let provinceid = $(this).val();
    
            //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
            if(provinceid){

                // jika di temukan id nya kita buat eksekusi ajax GET
                jQuery.ajax({

                // url yg di root yang kita buat tadi
                    url:"/kota/"+provinceid,

                    // aksion GET, karena kita mau mengambil data
                    type:'GET',

                    // type data json
                    dataType:'json',

                    // jika data berhasil di dapat maka kita mau apain nih
                    success:function(data){

                        // jika tidak ada select dr provinsi maka select kota kosong / empty
                        $('select[name="kota"]').empty();

                        // jika ada kita looping dengan each
                        $.each(data, function(key, value){

                            // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                            $('select[name="kota"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                        });
                    }
                });
            }else {
                $('select[name="kota"]').empty();
            }
        });
 

    $('select[name="kurir"]').on('change', function(){

      // kita buat variable untuk menampung data data dari  inputan
      // name city_origin di dapat dari input text name city_origin

      let origin = $("input[name=city_origin]").val();
      // name kota_id di dapat dari select text name kota_id
      let destination = $("select[name=kota]").val();
      // name kurir di dapat dari select text name kurir
      let courier = $("select[name=kurir]").val();
      // name weight di dapat dari select text name weight
      let weight = $("input[name=beratProduk]").val();
      // alert(courier);
      if(courier){
        // console.log(origin + destination + weight);

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
            },
        });
      }
    });
  });
</script>

