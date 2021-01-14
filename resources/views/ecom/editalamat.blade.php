@extends('layouts.layoutEcommerce')

@section('content')

<a href="/tambahalamatt">
    <button id="btnAdd" class="btn btn-info" style="float:center;" value="editdata">
                                        {{ __('Tambah Alamat') }}
    </button>
    </a>
    <a href="/backcheckout">
    <button id="btnAdd" class="btn btn-info" style="float:center;" value="editdata">
                                        {{ __('Kembali') }}
    </button>
    </a>
    <br>
    <br>

@foreach($user as $user)

<div class="card">
    <div class="card-body">
    <h5 class="card-title">Nama : {{$user->name}}</h5>
    <h5 class="card-title">Nomor Handphone : {{$user->nomorHP}}</h5>
    <h5 class="card-title">Alamat : {{$user->alamat}}</h5>
    </div>
</div>
<br>

@endforeach


@foreach($alamat as $alamat)         

<div class="card">
    <div class="card-body">
    <h5 class="card-title">Nama : {{$alamat->namaPenerima}}</h5>
    <h5 class="card-title">Nomor Handphone : {{$alamat->nomorHP}}</h5>
    <h5 class="card-title">Alamat : {{$alamat->alamat}}</h5>

    <form action="{{ url('/destroyalamat') }}" method="post"><br>
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$alamat->id}}">
                        <input type="hidden" name="userID" value="{{$alamat->userID}}">
                        <input type="hidden" name="namaPengiriman" value="{{$alamat->namaPenerima}}">
                        <input type="hidden" name="nomorHP" value="{{$alamat->nomorHP}}">
                        <input type="hidden" name="alamat" value="{{$alamat->alamat}}">
                        <button type="submit" class="btn btn-info" style="float:center;">Delete</button>
                        </form>
    </div>
    
</div>
<br>

@endforeach

@endsection