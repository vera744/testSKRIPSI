<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('template.homeLogin')

@section('title','Manage Gadai Transaction')

@section('container')

<br>
    <h3 style="text-align:center"> Gadai</h3>
<br>

<table class="table" style="text-align:center">
  <tr>
    <th scope="col" style="background-color:grey" >
      <a href="/manageGadai" style="color:white">Transaksi Aktif</a>
    </th>
    <th scope="col" style="background-color:white">
     <a href="/record" style="color:black">Record Transaksi</a>
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
                      <label for="mortgageID">Gadai ID:Transaksi M{{sprintf("%03d",$value->mortgageID)}} </label>
                      <br>
                      <label for="status" style="color: blue">
                        STATUS : {{$value->status}}
                      </label>
                      <br>
                      <label for="productName">Customer ID: {{$value->customerID}}</label>
                      <br>
                      <label for="productName">Nama Produk: {{$value->productName}}</label>
                      <br>
                      {{-- <label for="productName">Harga Produk: {{$value->productPrice}}</label>
                      <br> --}}
                      <label for="productDetail">Rincian Produk: {{$value->productDetail}}</label>
                      <br>
                      {{-- <label for="productDetail">Jumlah Produk: {{$value->productQuantity}}</label>
                      <br> --}}
                      <label for="productDescription">Deskripsi Produk: {{$value->productDescription}}</label>
                      <br>
                      <label for="loan">Pinjaman: {{$value->loan}}</label>
                    </div>
                    <div class="modal-footer">
                      {{-- <button type="button" class="btn btn-success" data-dismiss="modal">Terima Request</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Tolak Request</button> --}}
                    <a href="/manage/acc/{{$value->mortgageID}}" class="btn btn-success">Terima Permintaan</a>
                    <a href="/manage/reject/{{$value->mortgageID}}" class="btn btn-danger">Tolak Permintaan</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
        <div class="d-flex justify-content-center">
          {{-- {{ $temp->links()}} --}}
        </div>
    </div>
  @else
    <p class="font-weight-bold" style="text-align:center">Tidak ada transaksi tertunda saat ini</p>
  @endif
</tbody>

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