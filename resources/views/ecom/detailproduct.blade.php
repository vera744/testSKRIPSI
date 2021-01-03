@extends('template.homeLogin')

@section('title', "Detail Produk")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('container')

@foreach($products as $value)

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
    </div>
    <div class="col-md-6">

      <h5 name="name" id="name">{{ $value->merekProduk }} {{ $value->productName }}</h5>
      <p class="mb-2 text-muted text-uppercase small">{{ $value->namaKategori }}</p>
     
      <p><span class="mr-1" name="price" id="price"><strong> Rp. {{ number_format($value->loan) }}</strong></span></p>

     
      <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          <tbody>
            <tr>
              <th class="pl-0 w-25" scope="row" name="quantity" id="quantity"><strong>Kuantitas</strong></th>
              <td>{{ $value->productQuantity }}</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Warna</strong></th>
              <td>Hitam</td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Kondisi</strong></th>
              <td></td>
            </tr>
            <tr>
              <th class="pl-0 w-25" scope="row"><strong>Tahun Pembuatan</strong></th>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr>
    
      <button type="button" class="btn btn-primary btn-md mr-1 mb-2">Beli Sekarang</button>
      
        <a href="/ecom/add-to-cart/{{$value->productID}}">
        <button type="button" class="btn btn-light btn-md mr-1 mb-2"><i
          class="fas fa-shopping-cart pr-2"></i>Masukkan Keranjang</button>
        </a>
    </div>
  </div>

</section>
<!--Section: Block Content-->


@endforeach

@endsection