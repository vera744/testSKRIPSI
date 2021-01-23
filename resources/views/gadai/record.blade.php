
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('layouts.auths')

@section('title','Record Transaksi')

@section('content')
<br>
    <h3 style="text-align:center">Record Transaksi Gadai</h3>
<br>


<div class="row justify-content center"style="height: 500px">
  <div class="col-12">
    <table class="table" style="text-align:center">
       <tr>
        <th scope="col" >
          <a href="/gadai" >Transaksi Aktif</a>
        </th>
        
        <th scope="col" class="active">
          <a href="/record" >Record Transaksi</a>
        </th>
      </tr>
    </table>
    
    <tbody>
      @if (count($mortgages)> 0 )
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Nama Transaksi</th>
                <th>Status</th>
                <th></th>
              </tr>
              
              @foreach($mortgages as $value)
                <tr>
                  <td>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</td>
                
                  @if ($value->status == "Ecom")
                    <td>Gagal</td>
                  @else
                    <td>{{$value->status}}</td>
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

                          <div class="modal-body bg-dark">
                            <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="max" width="max" style="border: 2px solid #275996" alt="">
                            
                            <div class="table-responsive">
                              <table class="table-dark table-borderless col-12">
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
                                    @if($value->status == "Ditolak")
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
                                <tr>
                                  <td>
                                    Status
                                  </td>
                                  @if ($value->status == "Ecom")
                                    <td style="color: rgb(255, 42, 42)">
                                      <strong>
                                          Gagal
                                        </strong>
                                    </td>
                                    @elseif($value->status == "Ditolak")
                                      <td style="color: rgb(255, 42, 42)">
                                        <strong>
                                            {{$value->status}}
                                          </strong>
                                      </td>
                                    @else
                                      <td style="color: rgb(62, 201, 115)">
                                        <strong>
                                          {{$value->status}} 
                                        </strong>
                                      </td>
                                    @endif
                                </tr>
                              </table>
                            </div>
                          </div>
                        
                          <div class="modal-footer">
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
        </div>
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