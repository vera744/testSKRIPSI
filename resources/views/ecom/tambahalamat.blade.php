@extends('layouts.layoutEcommerce')

@section('content')

<div class="container">
<form action="/alamat/tambahbaru" method="POST" enctype="multipart/form-data">
            {{-- @method('patch') --}}
            @csrf

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Alamat') }}</div>

                <div class="card-body">


                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Penerima') }}</label>

                            <div class="col-md-6">
                                <input id="namaPenerima" type="text" class="form-control @error('namaPenerima') is-invalid @enderror" name="namaPenerima" placeholder="Nama Penerima" value="{{ old('namaPenerima') }}" required autocomplete="namaPenerima" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="nomorHP" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Ponsel') }}</label>

                            <div class="col-md-6">
                                <input id="nomorHP" type="text" placeholder="Nomor ponsel yang dapat dihubungi" class="form-control @error('nomorHP') is-invalid @enderror" name="nomorHP" value="{{ old('nomorHP') }}" required autocomplete="nomorHP" autofocus>

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
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Alamat Lengkap Pengiriman"  @error('alamat') is-invalid @enderror  required autocomplete="alamat">
                                </textarea>
                                
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
                                <select name="provinsi" id="provinsi" class="form-control" @error('provinsi') @enderror is-invalid>
                                    <option value="">Pilih Provinsi</option>    
                                    
                                    @foreach($provinsi as $value)
                                        <option value="{{$value['province_id']}}" namaprovinsi="{{$value['province']}}">{{$value['province']}}</option>
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
                            <label for="kota" class="col-md-4 col-form-label text-md-right">{{ __('Kota') }}</label>

                            <div class="col-md-6">
                                <select name="kota" id="kota" class="form-control" @error('kota') @enderror is-invalid>
                                    <option value="">Pilih Kota</option>
                                </select>

                                @error('kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        
        //ini ketika provinsi tujuan di klik maka akan eksekusi perintah yg kita mau
        //name select nama nya "provinve_id" kalian bisa sesuaikan dengan form select kalian
        $('select[name="provinsi"]').on('change', function(){

            // kita buat variable provincedid untk menampung data id select province
            let provinceid = $(this).val();
    
            //kita cek jika id di dpatkan maka apa yg akan kita eksekusi
            if(provinceid){

                // jika di temukan id nya kita buat eksekusi ajax GET
                jQuery.ajax({

                // url yg di root yang kita buat tadi
                    url:"/kota/"+provinceid,

                    // aksion GET, karena kita mau mengambil data
                    type:'GET',

                    // type data json
                    dataType:'json',

                    // jika data berhasil di dapat maka kita mau apain nih
                    success:function(data){

                        // jika tidak ada select dr provinsi maka select kota kosong / empty
                        $('select[name="kota"]').empty();

                        // jika ada kita looping dengan each
                        $.each(data, function(key, value){

                            // perhtikan dimana kita akan menampilkan data select nya, di sini saya memberi name select kota adalah kota_id
                            $('select[name="kota"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                        });
                    }
                });
            }else {
                $('select[name="kota"]').empty();
            }
        });
    });
</script>