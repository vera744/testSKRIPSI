
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')
@section('title','Profile')
@section('content')

<br>
    <h3 style="text-align:center">Change Password</h3>
<br>

@foreach($users as $value)
<form id="formUpdatePass" action="/changepassword/{{$value->id}}">
    {{ csrf_field() }}

    <div class="form-group row">
      <label for="oldpass" class="col-md-4 col-form-label text-md-right">Kata Sandi Lama :</label>
      <div class="col-md-6">
      <input type="text" id="oldpass" class="form-control" name="current-password" required >
      </div>
    </div>

    <div class="form-group row">
      <label for="newpass" class="col-md-4 col-form-label text-md-right">Kata Sandi Baru :</label>
      <div class="col-md-6">
      <input type="text" id="newpass" class="form-control" name="new-password" required >
      </div>
    </div>

    <div class="form-group row">
      <label for="konfpass" class="col-md-4 col-form-label text-md-right">Konfirmasi Kata Sandi :</label>
      <div class="col-md-6">
      <input type="text" id="konfpass" class="form-control" name="konfirmasi-password" required>
      </div>
    </div>

    
<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="btnSubmit"  class="btn btn-primary" value="submitdata"> Submit Data
                                </button>
                            </div>
                        </div>
</div>

</form>

@endforeach
@endsection