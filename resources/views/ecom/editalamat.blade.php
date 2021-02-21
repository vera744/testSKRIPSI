@extends('layouts.layoutEcommerce')

@section('title', "Alamat")
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@section('content')

@if ($message = Session::get('delete'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif

@if($message = Session::get('tambahAlamat'))
<div class="alert alert-success alert-block">
  <button type="button" class="close" data-dismiss="alert">×</button> 
  <strong>{{ $message }}</strong>
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-2">
            <a href="/tambahalamatt">
                <button id="btnAdd" class="btn btn-primary" style="float:center;" value="editdata">
                                                    {{ __('Tambah Alamat') }}
                </button>
            </a>
        </div>
    </div>

    <br>

   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Alamat Pengiriman
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="" style="">
                            <tr>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">Nomor Handphone</th>
                            <th class="align-middle" scope="col">Alamat</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @foreach($alamat as $alamat)         


                        <tbody>
                            <tr>
                            <td class="align-middle"> {{$alamat->namaPenerima}}</td>
                            <td class="align-middle"> {{$alamat->nomorHP}}</td>
                            <td class="align-middle"> {{$alamat->alamat}}, {{$alamat->title}}, {{$alamat->cityTitle}}</td>
                            <td class="text-right">
                            <form action="{{ url('/destroyalamat') }}" method="post"><br>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$alamat->id}}">
                                <input type="hidden" name="userID" value="{{$alamat->userID}}">
                                <input type="hidden" name="namaPengiriman" value="{{$alamat->namaPenerima}}">
                                <input type="hidden" name="nomorHP" value="{{$alamat->nomorHP}}">
                                <input type="hidden" name="alamat" value="{{$alamat->alamat}}">
                                <input type="hidden" name="provinsi" value="{{$alamat->title}}">
                                <input type="hidden" name="kota" value="{{$alamat->cityTitle}}">
                                <button type="submit" class="btn btn-danger" style="float:center;">Hapus Alamat</button>
                            </form>
                            <td>
                            <form action="{{ url('/pilihalamat') }}" method="post"><br>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$alamat->id}}">
                                <input type="hidden" name="userID" value="{{$alamat->userID}}">
                                <input type="hidden" name="namaPengiriman" value="{{$alamat->namaPenerima}}">
                                <input type="hidden" name="nomorHP" value="{{$alamat->nomorHP}}">
                                <input type="hidden" name="alamat" value="{{$alamat->alamat}}">
                                <input type="hidden" name="provinsi" value="{{$alamat->title}}">
                                <input type="hidden" name="kota" value="{{$alamat->cityTitle}}">
                                <button type="submit" class="btn btn-success" style="float:center;">Pilih Alamat</button>
                            </form>
                            </td>
                            
                            </td>
                            </tr>
                            
                        </tbody>
                        @endforeach

                        </table>
                    </div>
                </div>
                    
                <br>
                <br>    
            </div>
        </div>
</div>

@endsection