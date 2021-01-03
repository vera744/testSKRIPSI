
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')
@section('title','Profile')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>	
          <strong>{{ $message }}</strong>
        </div>
      @endif  
      
      <br>
      <h3 style="text-align:center">Update Password</h3>
      <br>
          
          <div class="card-body">
            <form method="POST" action="{{route('user.password.update')}}">
              @method('patch')
              @csrf
          
              <div class="form-group row">
                <label for="current_password" class="col-md-4 col-for-label">{{__('Current Password :')}}</label>
                
                <div class="col-md-6">
                  <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password">

                  @error('current_password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{$message}}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              
                
              <div class="form-group row">
                <label for="password" class="col-md-4 col-for-label">{{__('Password :')}}</label>
                
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  

                  @if($errors->any())
                    @foreach ($errors->all() as $error)
                    <span class="invalid-feedback" role="alert">
                      <strong>
                        {{ $error }}
                      </strong>
                    </span>
                    @endforeach
                  @endif
                </div>
              </div>
              
              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label">{{__('Confirm Password :')}}</label>
          
                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  
                </div>
              </div>
          
              <br>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Update Password
                  </button>
                </div>
              </div>
            </form>
            
          </div>
        
    </div>
  </div>
</div>



@endsection

{{-- @foreach($users as $value)

<form method="POST" id="formUpdatePass" action="/changepassword/{{$value->id}}">
  @method('patch')
  @csrf

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
          <button type="submit" id="btnSubmit"  class="btn btn-primary" value="submitdata"> Submit Data</button>
      </div>
    </div>
</form>

@endforeach 
--}}