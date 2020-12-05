
@extends('template.homeLogin')

@section('title','Request Gadai')

@section('container')

<div class="formGadai">
<h3>FORM REQUEST GADAI</h3>
    
<div class="container">
   <form action="/gadai/store" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="">Nama Produk</label> <br>
         <input class="col-md-6" type="text" name="namaProduk" required="required"> <br> <br>
        
         <label for="">Nilai Pinjaman</label> <br>
        <input class="col-md-6" type="number" name="nilaiPinjaman" required="required"> <br>

        <br><br>
        <label for="">Foto Produk</label> <br>
        <input id="fotoProduk" type="file" value="Pilih Foto" name="fotoProduk" value="{{ old('fotoProduk') }}" required autocomplete="fotoProduk" autofocus accept="image/jpeg, image/jpg, image/png">

       
    <br><br>
        <input type="submit" value="input data" class="btn btn-primary">
        
    </form>
</div>

@endsection