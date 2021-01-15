@extends('layouts.layoutEcommerce')

@section('content')

<a href="/tambahalamatt">
    <button id="btnAdd" class="btn btn-info" style="float:center;" value="editdata">
                                        {{ __('Tambah Alamat') }}
    </button>
    </a>

    <a href="/backcheckout" method="post">
    <button id="btnAdd" class="btn btn-info" style="float:center;" value="editdata">
                                        {{ __('Kembali') }}
    </button>
    </a>
    <br>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @foreach($user as $user)
                            <h5 class="card-title">Nama : {{$user->name}}</h5>
                            <h5 class="card-title">Nomor Handphone : {{$user->nomorHP}}</h5>
                            <h5 class="card-title">Alamat : {{$user->alamat}}</h5>
                            <h5 class="card-title">Provinsi : {{$user->provinsi}}</h5>
                            <h5 class="card-title">Kota : {{$user->kota}}</h5>
                        @endforeach
                    </div>
                </div>
                    
                <br>
                <br>    
                
                <div class="card">
                    <div class="card-body">
                        @foreach($alamat as $alamat)         
                            <h5 class="card-title">Nama : {{$alamat->namaPenerima}}</h5>
                            <h5 class="card-title">Nomor Handphone : {{$alamat->nomorHP}}</h5>
                            <h5 class="card-title">Alamat : {{$alamat->alamat}}</h5>
                            <h5 class="card-title">Provinsi : {{$alamat->provinsi}}</h5>
                            <h5 class="card-title">Kota : {{$alamat->kota}}</h5>

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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection