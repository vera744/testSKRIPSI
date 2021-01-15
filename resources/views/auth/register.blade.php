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
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

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
                            <label for="nomorHP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="nomorHP" type="text" class="form-control @error('nomorHP') is-invalid @enderror" name="nomorHP" value="{{ old('nomorHP') }}" required autocomplete="nomorHP" autofocus>

                                @error('nomorHP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat" autofocus>

                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="provinsi" class="col-md-4 col-form-label text-md-right">{{ __('Provinsi') }}</label>

                            <div class="col-md-6">
                                <input id="prvinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{ old('provinsi') }}" required autocomplete="provinsi" autofocus>

                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <input id="kota" type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota') }}" required autocomplete="kota" autofocus>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorKTP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor KTP') }}</label>

                            <div class="col-md-6">
                                <input id="nomorKTP" type="text" class="form-control @error('nomorKTP') is-invalid @enderror" name="nomorKTP" value="{{ old('nomorKTP') }}" required autocomplete="nomorKTP" autofocus>

                                @error('nomorKTP')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fotoKTP" class="col-md-4 col-form-label text-md-right" >{{ __('Foto KTP') }}</label>

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
                            <label for="fotodenganKTP" class="col-md-4 col-form-label text-md-right">{{ __('Foto Selfie dengan KTP') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Kata Sandi') }}</label>

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
                            <div class="col-md-6 offset-md-4">
                                <h7>Sudah punya akun?</h7>
                                <br>
                                <a href="/login">Masuk</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
