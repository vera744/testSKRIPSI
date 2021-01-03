
@extends('template.homeLogin')

@section('title','Request Gadai')

@section('container')

<div class="formGadai">
<h3>FORM REQUEST GADAI</h3>
    
    <div class="container">
        <form action="/gadai/store" method="POST" enctype="multipart/form-data">
            {{-- @method('patch') --}}
            @csrf
    
            <div class="form-group">
                <label for="">Jenis Produk</label>

                <select class="form-control input-sm jenisProduk" name="jenisProduk" id="jenisProduk_id">
                    <option value="0" disabled="true" selected="true">Pilih</option>
                    @foreach($category as $value)
                    
                    <option value="{{$value->id}}">{{$value->namaKategori}}</option> 
                    @endforeach
                </select>
            </div>
    
            <div class="form-group"> 
                <label for="">Merek Produk</label>

                <select class="form-control input-sm productName" name="merekProduk" id="">
                    <option value="0" disabled="true" selected="true">Merek Produk</option>
                </select>
            </div>

            <label for="">Nama Produk</label> <br>
            <input class="col-md-6" type="text" name="namaProduk" required="required"> <br> <br>
        
            <label for="">Nilai Pinjaman</label> <br>
            <input class="col-md-6" type="number" name="nilaiPinjaman" required="required"> <br> <br>

            <div class="form-group">
                <label for="">Kondisi Produk</label>

                <select class="form-control input-sm" name="kondisiProduk" id="kondisiProduk_id">
                    <option value="0" disabled="true" selected="true">Kondisi Produk</option>
                    @foreach($kondisi as $value)
                    
                    <option value="{{$value->kondisi_id}}">{{$value->namaKondisi}}</option> 
                    @endforeach
                </select>
            </div> <br> <br>
        
            <label for="">Foto Produk</label> <br>
            <input id="fotoProduk" type="file" value="Pilih Foto" name="fotoProduk" value="{{ old('fotoProduk') }}" required autocomplete="fotoProduk" autofocus accept="image/jpeg, image/jpg, image/png"> <br> <br>
        
            <input type="submit" value="input data" class="btn btn-primary">
        </form>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change','.jenisProduk', function(){
                // console.log("yeay berubah");

                var cat_id=$(this).val();
                // console.log(cat_id);
                
                var div=$(this).parent().parent();

                var op=" ";
                

                $.ajax({
                    type:'get',
                    url:'{!!URL::to('findProductName')!!}',
                    data:{'id':cat_id},
                    success:function(data){
                        // console.log('success');

                        // console.log(data);
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