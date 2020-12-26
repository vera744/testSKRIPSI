
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')
@section('title','Profile')
@section('content')
 
<br>
    <h3 style="text-align:center"> Profile</h3>
<br>

    <!-- <div class="card-body">
        <div class="form-group row">
            <label for="nama" class="col-md-4 col-form-label text-md-right">Nama: </label>

            <div class="col-md-6">
                    <input class="col-md-6" type="text" name="name" required="required">

                            </div>
        </div>
  
    </div> -->

    @if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif
    <div class="card-body">
    @foreach($users as $value)
    <form id="formUpdate" action="/profile/{{$value->id}}">
    {{ csrf_field() }}


 
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Nama  :</label>
      <div class="col-md-6">
      <input type="text" id="name" class="form-control" value="{{$value->name}}" disabled >
      </div>
    </div>

    <div class="form-group row">
      <label for="dob" class="col-md-4 col-form-label text-md-right">Tanggal Lahir  :</label>
      <div class="col-md-6">
      <input type="text" id="dob" class="form-control" value="{{$value->dob}}" disabled >
      </div>
    </div>

    <div class="form-group row">
      <label for="nomorHP" class="col-md-4 col-form-label text-md-right">Nomor Handphone  :</label>
      <div class="col-md-6">
      <input type="text" id="nomorHP"  name="nomorHP" class="form-control" value="{{$value->nomorHP}}" disabled required numeric>
     
      </div>
    </div>

    <div class="form-group row">
      <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat  :</label>
      <div class="col-md-6">
      <input type="text" id="alamat" name="alamat" class="form-control" value="{{$value->alamat}}" disabled required>
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">Email  :</label>
      <div class="col-md-6">
      <input type="text" id="email"  name="email" class="form-control" value="{{$value->email}}" disabled required>
      </div>
    </div>
   
  

<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="btnEdit"  class="btn btn-primary" value="editdata" onclick="myFunc()">
                                    {{ __('Edit') }}
                                </button>
                                <button type="submit" id="btnSubmit"  class="btn btn-primary" value="submitdata" disabled onclick="func()"> Submit Data
                                </button>
                            </div>
                        </div>
</div>
     
</form>
  @endforeach


<script>
  function myFunc(){
    document.getElementById("nomorHP").disabled=false;
    document.getElementById("alamat").disabled=false;
    document.getElementById("email").disabled=false;
    document.getElementById("btnSubmit").disabled=false;
    document.getElementById("btnEdit").disabled=true;
    document.getElementById("btnEditPass").hidden=false;
  }

  function func(){
    document.getElementById("nomorHP").disabled=true;
    document.getElementById("alamat").disabled=true;
    document.getElementById("email").disabled=true;
    document.getElementById("btnSubmit").disabled=true;
    document.getElementById("btnEdit").disabled=false;
    document.getElementById("btnEditPass").hidden=true;
  }
</script>
@endsection