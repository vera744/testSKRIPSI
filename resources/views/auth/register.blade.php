@extends('layouts.app')

@section('title','Register')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Nama Lengkap Anda" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorHP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="nomorHP" type="text" placeholder="Nomor yang Dapat Dihubungi" class="form-control @error('nomorHP') is-invalid @enderror" name="nomorHP" value="{{ old('nomorHP') }}" required autocomplete="nomorHP" autofocus>

                                @error('nomorHP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" placeholder="Alamat Lengkap Sesuai KTP" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}<span>*</span></label>
                            <div class="col-md-6">
                                <select name="provinsi" id="provinsi" class="form-control provinsi @error('provinsi') is-invalid @enderror" required autocomplete="provinsi" autofocus>
                                    <option value="0">Provinsi Sesuai KTP</option>
                                    @foreach ($province as $value)
                                        <option value="{{$value->province_id}}">{{$value->title}}</option>
                                    @endforeach
                                </select>
                                
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}<span>*</span></label>
                            <div class="col-md-6">
                                <select class="form-control input-sm kota" name="kota" id="" required autocomplete="kota" autofocus>
                                    <option value="0" disabled="true" selected="true">Kota Sesuai KTP</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email Harus Valid" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorKTP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor KTP') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="nomorKTP" type="text" placeholder="NIK Sesuai KTP" class="form-control @error('nomorKTP') is-invalid @enderror" name="nomorKTP" value="{{ old('nomorKTP') }}" required autocomplete="nomorKTP" autofocus>

                                @error('nomorKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotoKTP" class="col-md-4 col-form-label text-md-right" >{{ __('Foto KTP') }}<span>*</span></label>

                            <div class="col-md-6">

                            <!-- <button style="display:block;widthะ120px; height :30px;"'onclick-"document getElementById('getFile').click()">Unggah Berkas< /button>
                            <input type='file' id="getFile" style="display:none" >       -->
                                <input id="fotoKTP" type="file" value="Pilih Foto" name="fotoKTP" value="{{ old('fotoKTP') }}" required autocomplete="fotoKTP" autofocus accept="image/jpeg, image/jpg, image/png">

                                @error('fotoKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotodenganKTP" class="col-md-4 col-form-label text-md-right">{{ __('Foto Selfie dengan KTP') }}<span>*</span></label>

                            <div class="col-md-6">
                                
                                <input id="fotodenganKTP" type="file" name="fotodenganKTP" value="{{ old('fotodenganKTP') }}" required autocomplete="fotodenganKTP" autofocus accept="image/jpeg, image/jpg, image/png">

                                @error('fotodenganKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small>Masukkan kata sandi yang kuat (minimal 8 karakter dengan 1 huruf besar dan 1 angka)</small>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}<span>*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
        
                    </form>
                    
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-md-5">
                                    <p>Sudah punya akun?
                                        <a class="" href="/login">Masuk</a> 
                                    </p>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

 {{-- Ajax --}}
        
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('change','.provinsi', function(){
            // console.log("yeay berubah");

            var cat_id=$(this).val();
                
            
            var div=$(this).parent().parent().parent().parent();

            var op=" ";
            

            $.ajax({
                type:'get',
                url:'{!!URL::to('findCityName')!!}',
                data:{'id':cat_id},
                success:function(data){
                    // console.log('success');

                    // console.log(data);
                    // console.log(data.length);

                    op+='<option value="0" selected disabled>Kota Sesuai KTP</option>';
                    for(var i=0;i<data.length;i++){
                        op+='<option value="'+data[i].city_id+'">'+data[i].type+''+" "+''+data[i].cityTitle+'</option>';
                    }
                    
                    div.find('.kota').html(" ");
                    div.find('.kota').append(op);
                
                },
                error:function(){

                }
            });
        });
    });
</script>
