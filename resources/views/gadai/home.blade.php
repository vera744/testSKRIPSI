@extends('layouts.auths')

@section('title','Gadai')

@section('content')

@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
  </div>
@endif 
@if ($message = Session::get('requestEmail'))
  <div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
  </div>
@endif 

<br>
    <h3 style="text-align:center"> Gadai</h3>
<br>

<div class="row justify-content-md-center">
  <div class="col-12">
    <table class="table" style="text-align:center">
      <tr>
        <th scope="col-6" class="active">
          <a href="/gadai">Transaksi Aktif</a>
        </th>
        
        <th scope="col-6" >
          <a href="/record" >Record Transaksi</a>
        </th>
      </tr>
    </table>
    
    <tbody>
      @if (count($mortgages)> 0 )
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Nama Transaksi</th>
              <th>Status</th>
              <th></th>
            </tr>

            @foreach($mortgages as $value)
      
            <tr>
              <td>
                Transaksi M{{sprintf("%03d",$value->mortgageID)}} </td>
              <td>{{$value->status}}</td>
              <td>
                <div class="dropdown">
                  <a data-toggle="modal" data-target="#exampleModalLong{{$value->mortgageID}}" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink"  aria-haspopup="true" aria-expanded="false" >
                  </a>
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
                      
                      <div class="modal-body" style="background-color: rgb(232,241,255)">
                        <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="max" width="100px" style="border: 2px solid #275996" alt="">
                        <div class="row">
                          <div class="table-responsive">
                            <table class="table-light table-borderless col-12">
                              <tr>
                                <td>
                                  Gadai ID
                                </td>
                                <td>
                                  <strong>
                                    Transaksi M{{sprintf("%03d",$value->mortgageID)}}
                                  </strong>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Kategori Produk
                                </td>
                                <td>
                                    {{$value->namaKategori}}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Merek Produk
                                </td>
                                <td>
                                    {{$value->merekProduk}}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Nama Produk
                                </td>
                                <td>
                                    {{$value->productName}}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Berat Produk
                                </td>
                                <td>
                                    {{number_format($value->productWeight)}} Gram
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Status
                                </td>
                                <td>
                                  <strong>
                                    {{$value->status}}
                                  </strong>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  @if($value->status == "Sedang Ditinjau")
                                    Harga Pasar
                                  @else
                                    Jumlah Pinjaman
                                  @endif
                                </td>
                                <td>
                                    Rp. {{number_format($value->loan)}},-
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Kondisi Produk
                                </td>
                                <td>
                                    {{$value->namaKondisi}}
                                </td>
                              </tr>
                              @if($value->startDate && $value->endDate)
                                <tr>
                                  <td>
                                    Tanggal Mulai Pinjaman
                                  </td>
                                  <td>
                                    <strong>
                                      {{date('d-m-Y', strtotime($value->startDate))}}
                                    </strong>
                                  </td>
                                </tr>  
                                <tr>
                                  <td>
                                    Tanggal Akhir Pinjaman
                                  </td>
                                  <td style="color: rgb(255, 42, 42)">
                                    <strong>
                                      {{date('d-m-Y', strtotime($value->endDate))}}
                                    </strong>
                                  </td>
                                </tr>
                                <tr>
                                  
                                   
                                  <td>
                                    Sisa Hari
                                  </td>
                                  @php
                                    $date1=date_create(date('Y-m-d'));
                                    $date2=date_create($value->endDate);
                                    $diff=date_diff($date1,$date2);
                                  @endphp
                                  
                                  @if($diff->format("%a")>6)
                                  <td style="color: rgb(62, 201, 115)">
                                  @else
                                  <td style="color: rgb(255, 42, 42)">
                                  @endif
                                    <strong>
                                      @php
                                        $date1=date_create(date('Y-m-d'));
                                        $date2=date_create($value->endDate);
                                        $diff=date_diff($date1,$date2);
                                        echo $diff->format("%a hari");
                                      @endphp
                                    </strong>
                                  </td>
                                </tr>
                                  <td class="row justify-content-center">
                                    @if ($diff->format("%a")<7)
                                    
                                      <form action="/gadai/append/{{$value->mortgageID}}">
                                        <button class="btn style1">Perpanjang</button>
                                      </form>
                                    @endif
                                  </td>
                                  <td class="px-5">
                                    <a href="/gadai/payment/{{$value->mortgageID}}" class="btn style1">Bayar sekarang</a>
                                  </td>
                              @endif
                            </table>
                          </div>
                        </div>
                        <br>
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
        
            @endforeach
          </table>
        </div>
      @else
        <p class="font-weight-bold" style="text-align:center">Anda tidak mempunyai transaksi untuk saat ini</p>
        <div class="d-flex justify-content-center">
          <img src="/images/nodata.jpg" alt="" srcset="" width="300px" height="300px">
        </div>
      @endif
    </tbody>
  </div>
</div>

<div class="row justify-content-center">
{{ $mortgages->onEachSide(5)->links() }}
</div>
  

<div class="row d-flex justify-content-center">
  <form action="{{ url('gadai/add')}}">
    <input type="submit" class="btn style1" value="Request" style="">
  </form>
</div> 


@endsection

<script>
  $(document).ready(function () {
  $('.showQuickInfo').click(function () {
    $('#QuickInfo').toggleClass('is-active'); // MODAL

    var $entry = this.getAttribute('data-entry');
    getEntryData($entry);
  });
}

function getEntryData(entryId) {
  $.ajax({
    url: '/entries/getEntryDataForAjax/' + entryId,
    type: 'get',
    dataType: 'json',
    success: function (response) {
      if (response.length == 0) {
        console.log( "Datensatz-ID nicht gefunden.");
      } else { 
        // set values
        $('#mortgageID').val( response[0].mortgageID );         
        $('#status').val( response[0].status);
        // and so on
      }
    }
  });
}
</script>

