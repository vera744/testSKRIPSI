@extends('layouts.layoutEcommerce')

@section('content')

@if ($message = Session::get('delete'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@elseif ($message = Session::get('pilih'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
    <strong>{{ $message }}</strong>
  </div>
@endif

<a href="/tambahalamatt">
    <button id="btnAdd" class="btn btn-info" style="float:center;" value="editdata">
                                        {{ __('Tambah Alamat') }}
    </button>
</a>
    <form action="{{ url('/checkout') }}" method="post">
                        {{ csrf_field() }}
                <button id="btnAdd" class="btn btn-info" style="float:center;" value="back">
                                        {{ __('Kembali') }}
                </button>
    </form>

    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nama Penerima</th>
                            <th scope="col">Nomor Handphone</th>
                            <th scope="col">Alamat</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        @foreach($alamat as $alamat)         

                        <tbody>
                            <tr>
                            <td> <br> {{$alamat->namaPenerima}}</td>
                            <td> <br>{{$alamat->nomorHP}}</td>
                            <td> <br>{{$alamat->alamat}}, {{$alamat->provinsi}}, {{$alamat->kota}}</td>
                            <td>
                            <form action="{{ url('/destroyalamat') }}" method="post"><br>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$alamat->id}}">
                                <input type="hidden" name="userID" value="{{$alamat->userID}}">
                                <input type="hidden" name="namaPengiriman" value="{{$alamat->namaPenerima}}">
                                <input type="hidden" name="nomorHP" value="{{$alamat->nomorHP}}">
                                <input type="hidden" name="alamat" value="{{$alamat->alamat}}">
                                <input type="hidden" name="provinsi" value="{{$alamat->provinsi}}">
                                <input type="hidden" name="kota" value="{{$alamat->kota}}">
                                <button type="submit" class="btn btn-info" style="float:center;">Delete</button>
                            </form>
                            <td>
                            <form action="{{ url('/pilihalamat') }}" method="post"><br>
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$alamat->id}}">
                                <input type="hidden" name="userID" value="{{$alamat->userID}}">
                                <input type="hidden" name="namaPengiriman" value="{{$alamat->namaPenerima}}">
                                <input type="hidden" name="nomorHP" value="{{$alamat->nomorHP}}">
                                <input type="hidden" name="alamat" value="{{$alamat->alamat}}">
                                <input type="hidden" name="provinsi" value="{{$alamat->provinsi}}">
                                <input type="hidden" name="kota" value="{{$alamat->kota}}">
                                <button type="submit" class="btn btn-info" style="float:center;">Pilih Alamat</button>
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