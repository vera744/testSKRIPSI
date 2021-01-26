<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')

@section('title','Manage Gadai Transaction')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
  </div>
@endif 

@if ($message = Session::get('reject'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
  </div>
@endif 

<br>
    <h3 style="text-align:center"> Gadai</h3>
<br>

<div style="height: 500px">
<table class="table" style="text-align:center">
  <tr>
    <th scope="col" class="active">
      <a href="/manageGadai">Tinjauan Masuk</a>
    </th>
    <th scope="col">
     <a href="/recordadmin">Tinjauan Berjalan</a>
    </th>
    <th scope="col">
      <a href="/tinjauanSelesai">Tinjauan Selesai</a>
     </th>
  </tr>
</table>

<tbody>
  @if (count($temp)> 0 )
    <div class="table-responsive">
      <table class="table">
        <tr>
          <th>No</th>
          <th>Nama Transaksi</th>
          <th></th>
        </tr>
        
        @foreach($temp as $value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>Transaksi M{{sprintf("%03d",$value->mortgageID)}} </td>
            <td>
              <div class="dropdown">
                <a data-toggle="modal" data-target="#exampleModalLong{{$value->mortgageID}}" class="btn btn-secondary   dropdown-toggle" role="button" id="dropdownMenuLink"  aria-haspopup="true" aria-expanded="false" >
                </a>
              </div>
      
              <!-- Modal -->
              <div class="modal fade" id="exampleModalLong{{$value->mortgageID}}" tabindex="-1" role="dialog"   aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">
                       Transaksi M{{sprintf("%03d",$value->mortgageID)}} 
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                    </div>

                    <div class="modal-body">
                      <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="max" width="max" style="border: 2px solid #275996" alt="">
                      <label for="mortgageID">ID Gadai:Transaksi M{{sprintf("%03d",$value->mortgageID)}} </label>
                      <br>
                      <label for="status" style="color: blue">
                        STATUS : {{$value->status}}
                      </label>
                      <br>
                      <label for="productName">ID Pengguna: {{$value->customerID}}</label>
                      <br>
                      <label for="productKategori">Kategori Produk: {{$value->namaKategori}}</label>
                      <br>
                      <label for="productMerk">Merek Produk: {{$value->merekProduk}}</label>
                      <br>
                      <label for="productName">Nama Produk: {{$value->productName}}</label>
                      <br>
                      <label for="productPrice">Harga Produk: {{$value->productPrice}}</label>
                      <br> 
                      <label for="productQty">Jumlah Produk: {{$value->productQuantity}}</label>
                      <br>
                      <label for="loan">Pinjaman: {{$value->loan}}</label>
                    </div>

                    <div class="modal-footer">
                      {{-- <button type="button" class="btn btn-success" data-dismiss="modal">Terima Request</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tolak Request</button> --}}
                      <a href="/manage/acc/{{$value->mortgageID}}" class="btn btn-success">Terima Permintaan</a>
                      <a href="/manage/reject/{{$value->mortgageID}}" class="btn btn-danger">Tolak Permintaan</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        
      </table>
      
      <div class="row justify-content-center">
        {{ $temp->onEachSide(5)->links() }}
      </div>
      
      <div class="d-flex justify-content-center">
          {{-- {{ $temp->links()}} --}}
      </div>
    </div>
  @else
    <p class="font-weight-bold" style="text-align:center">Tidak ada transaksi tertunda saat ini</p>
    <div class="d-flex justify-content-center">
      <img src="/images/nodata.jpg" alt="" srcset="" width="300px" height="300px">
    </div>
  @endif
</tbody>
</div>
@endsection
