@extends('layouts.auths')

@section('title', "Detail Produk")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')

@foreach($product as $value)

<form action="/manageProduct/update/{{$value->productID}}" enctype="multipart/form-data">
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
            <h3>Ganti Foto Produk</h3>
            <input id="fotoProduk" type="file" value="Pilih Foto" name="fotoProduk" value="{{ old('fotoProduk') }}" required autocomplete="fotoProduk" autofocus accept="image/jpeg, image/jpg, image/png"> <br> <br>
            <br>
            <hr>
          <div class="table-responsive">
            <table class="table table-sm table-borderless mb-0">
              <tbody>
                <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Nama Produk  </strong></th>
                    <td><input type="text" name="name" value="{{$value->productName}}">
                    </td>
                </tr>
                <tr>
                    <th class="pl-0 w-25" scope="row"><strong>Harga Produk   </strong></th>
                    <td><input type="number" name="price" value="{{$value->productPrice}}"></td>

                </tr>

                <tr>
                  <th class="pl-0 w-25" scope="row" name="quantity" id="quantity"><strong>Kuantitas</strong></th>
                  <td name="productQuantity">{{ $value->productQuantity }}</td>
                </tr>

                <tr>
                  <th class="pl-0 w-25" scope="row"><strong>Berat Produk (*gram)</strong></th>
                  <td><input type="number" name="berat" value="{{$value->productWeight}}"></td>
                </tr>
              </tbody>
            </table>
        </div>
        <hr>
            <button type="submit">Save</button>
                </div>
              </div>    
            </div>  
      </div>
    </section>

@endforeach
 
</form>
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
  
</script>

