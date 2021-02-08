
@extends('layouts.auths')

@section('title','Request Gadai')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-8 ">
        <div class="card">
            <div class="card-header">
                Form Pengajuan Gadai
            </div>
        
                <div class="container">
                    <div class="card-body">
                        <div class="formGadai">    
                            <form action="/gadai/store" method="POST" enctype="multipart/form-data">
                                {{-- @method('patch') --}}
                                @csrf                    
                               <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-left" for="">Jenis Produk</label>

                                    <div class="col-md-7">
                                        <select class="form-control input-sm jenisProduk col-12" name="jenisProduk" id="jenisProduk_id">
                                            <option value="0" disabled="true" selected="true">Pilih</option>
                                            @foreach($category as $value)
                                                <option value="{{$value->id}}">{{$value->namaKategori}}</option> 
                                            @endforeach
                                        </select>
                                        
                                        <small>*Untuk jenis produk kamera, kondisi produk harus 
                                        <strong>96%-100%</strong> (tanpa lecet, ada garansi 
                                        <strong>dan</strong> box, kwitansi pembelian barang, fungsional)</small>
                                    </div>                                                
                                </div>
                                <div class="form-group row"> 
                                    <label class="col-md-5 col-form-label text-md-left" for="">Merek Produk</label>
                                    
                                    <div class="col-md-7">
                                        <select class="form-control input-sm productName col-12" name="merekProduk" id="">
                                            <option value="0" disabled="true" selected="true">Merek Produk</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row"> 
                                    <label class="col-md-5 col-form-label text-md-left" for="">Nama Produk</label>
                                    
                                    <div class="col-md-7">
                                        <input class="col-md-12 form-control" type="text" name="namaProduk" required="required" placeholder="Nama Produk"> <br>
                                        <small>
                                            *Harap menuliskan nama produk dengan format: 
                                            <strong>"</strong>(Jenis Produk) (Merek Produk) (Nama Produk)<strong>"</strong> <br> 
                                            Contoh : <strong>Handphone Samsung Galaxy Note 9</strong>
                                        </small>
                                    </div>
                                </div>

                                <div class="form-group row"> 
                                    <label class="col-md-5 col-form-label text-md-left" for="">Harga Jual Pasar (Barang Bekas Pakai)</label>
                                    
                                    <div class="col-md-7">
                                        <input class="col-md-12 form-control" type="number" name="nilaiPinjaman" required="required" placeholder="Harga Jual Pasar (dalam rupiah)">
                                    </div>
                                </div>
                                
                                <div class="form-group row"> 
                                    <label class="col-md-5 col-form-label text-md-left" for="">Berat Produk</label>
                                    
                                    <div class="col-md-7">
                                        <input class="col-md-12 form-control" type="number" name="beratProduk" required="required" placeholder="Berat Produk (Dalam Gram)"><br> 
                                        <small>*Berat produk dalam gram, contoh 1,7 kg = <strong>1700</strong> gram</small> 
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-left" for="">Kondisi Produk</label>
                                    
                                    <div class="col-md-7">
                                        <select class="form-control input-sm col-12" name="kondisiProduk" id="kondisiProduk_id">
                                            <option value="0" disabled="true" selected="true">Kondisi Produk</option>
                                            @foreach($kondisi as $value)                        
                                                <option value="{{$value->kondisi_id}}">{{$value->namaKondisi}} {{$value->keterangan_kondisi}}</option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-left" for="">Foto Produk</label>
                                    
                                    <div class="col-md-7" name="kondisiProduk" id="kondisiProduk_id">
                                        <input id="fotoProduk" type="file" value="Pilih Foto" name="fotoProduk" value="{{ old('fotoProduk') }}" required autocomplete="fotoProduk" autofocus accept="image/jpeg, image/jpg, image/png">
                                    </div>
                                </div>
                                
                                <hr>

                                <div class="form-group row justify-content-center">        
                                    <input type="submit" value="Ajukan Permintaan" class="btn btn-primary">
                                </div>
                            </form>
                        </div>    
                    </div>
                </div>
        </div>
    </div>
</div>

    
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.jenisProduk', function(){
                // console.log("yeay berubah");

                var cat_id=$(this).val();
                // console.log(cat_id);
                
                var div=$(this).parent().parent().parent().parent();

                var op=" ";
                

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findProductName')!!}',
                    data:{'id':cat_id},
                    success:function(data){
                        // console.log('success');

                        console.log(data);
                        // console.log(data.length);

                        op+='<option value="0" selected disabled>Merek Produk</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value="'+data[i].id+'">'+data[i].merekProduk+'</option>';
                        }
                        
                        div.find('.productName').html(" ");
                        div.find('.productName').append(op);
                    
                    },
                    error:function(){

                    }
                });
            });
        });
    </script>
@endsection