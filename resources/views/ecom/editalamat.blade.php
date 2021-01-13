@extends('layouts.layoutEcommerce')

@section('content')

@foreach($user as $user)
<a href="/editalamat/{{$user->id}}" method="post">
{{ csrf_field() }}

<div class="card">
    <div class="card-body">
    <h5 class="card-title">Nama : {{$user->nama}}</h5>
    <h5 class="card-title">Nomor Handphone : {{$user->nomorHP}}</h5>
    <h5 class="card-title">Alamat : {{$user->alamat}}</h5>
    </div>
</div>
<br>
</a>

@endforeach


                     

<div class="card">
    <div class="card-body">
    <a href="/tambahalamatt"   id="btnEdit" class="btn btn-info" style="float:center;" value="editdata">
                    {{ __('Tambah Alamat Baru') }}
 
    
    </a>
    </div>
</div>

@endsection