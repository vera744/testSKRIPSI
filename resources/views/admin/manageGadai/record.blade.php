<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')

@section('title','Manage Record')

@section('content')

<br>
    <h3 style="text-align:center"> Transaksi Gadai</h3>
<br>

<div style="height: 500px">
<table class="table" style="text-align:center">
  <tr>
    <th scope="col" >
     <a href="/manageGadai">Tinjauan Masuk</a>
    </th>
    <th scope="col" class="active"  >
      <a href="/recordadmin" >Tinjauan Berjalan</a>
    </th>
    <th scope="col">
      <a href="/tinjauanSelesai">Tinjauan Selesai</a>
     </th>
  </tr>
</table>

@if (count($mortgages)> 0 )

  <div class="table-responsive">
    <table class="table">
      <tr>
        <th>Nama Transaksi</th>
        <th>Status</th>
        <th>Sisa Hari</th>
        <th>Detail</th>
      </tr>
      
      @foreach($mortgages as $value)
 
    <tbody id="myTable">
    <tr>
      <td>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</td>
      <td>{{$value->status}}</td>
      @php
      $date1=date_create(date('Y-m-d'));
      $date2=date_create($value->endDate);

      if($date2>$date1){
        $diff=date_diff($date1,$date2); 
      }

      else {
        $diff=date_diff($date2,$date2);
      }
    @endphp

  
   
        @if ($diff->format("%a")==0)
        <td>-</td>
        @else
        <td>{{$diff->format("%a")}} hari</td>
        @endif

        <td>
          <div class="dropdown">
            <a data-toggle="modal" data-target="#exampleModalLong{{$value->mortgageID}}" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false"></a>
          </div>
      
          <!-- Modal -->
          <div class="modal fade" id="exampleModalLong{{$value->mortgageID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Transaksi M{{sprintf("%03d",$value->mortgageID)}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="max" width="max" style="border: 2px solid #275996" alt="">
                  <label for="name">Nama: {{$value->name}}</label>
                  <br>
                  <label for="mortgageID">ID Gadai: Transaksi M{{sprintf("%03d",$value->mortgageID)}}</label>
                  <br>
                  <label for="productKategori">Kategori Produk: {{$value->namaKategori}}</label>
                  <br>
                  <label for="productMerk">Merek Produk: {{$value->merekProduk}}</label>
                  <br>
                  <label for="productName">Nama Produk: {{$value->productName}}</label>
                  <br>
                  <label for="productCondition">Kondisi Produk: {{$value->namaKondisi}}</label>
                  <br>
                  <label for="status">Status: {{$value->status}}</label>
                  <br>
                  <label for="loan">Pinjaman: {{$value->loan}}</label>

                  @if ($value->startDate!=null && $value->endDate!=null)
                    <br>
                    <label for="">Tanggal Mulai Pinjaman :{{date('d-m-Y', strtotime($value->startDate))}}</label>
                    <br>
                    <label for="">Tanggal Berakhir Pinjaman : {{date('d-m-Y', strtotime($value->endDate))}}</label> <br>
                  @endif

                  <hr>
                  
                  <form action="/manage/input_transaction/{{$value->mortgageID}}">
                    @if ($value->startDate!=null)
                      <label for="">Tanggal Mulai Pinjaman</label> <br>
                      <input type="text" name="" id=""disabled value="{{date('d-m-Y', strtotime($value->startDate))}}">
                      
                      <br>
                    @else
                      <label for="">Tanggal Mulai Pinjaman</label>
                      <br>
                      <input type="date" name="tglstart" id="tglstart">
                      <br>
                    @endif
                      
                    <label for="">Tanggal Berakhir Pinjaman</label>
                    <br>
                    <input id="endDate" type="date" name="endDate">
                    <br>  
                    <label for="">Nilai Pinjaman</label>
                    <br>
                    <input class="col-md-6" type="number" name="loans" id="loans" required="required" value="{{$value->loan}}">
                    <br>
                    <br>
                    <input type="submit" value="Mulai Pinjaman" class="btn btn-primary">
                  </form>
                </div>
                
                <div class="modal-footer">
                  <a href="/manage/reject/{{$value->mortgageID}}" class="btn btn-danger">Tolak Transaksi</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>

      @endforeach
    </table>
  </div>
  <div class="row justify-content-center">
    {{ $mortgages->onEachSide(5)->links() }}
  </div>
@else
  <p class="font-weight-bold" style="text-align:center">Anda tidak mempunyai transaksi untuk saat ini</p>
  
  <div class="d-flex justify-content-center">
    <img src="/images/nodata.png" alt="" srcset="" width="300px" height="300px">
  </div>
@endif
  
</tbody>
</div>
  
@endsection

<script>
  
</script>
