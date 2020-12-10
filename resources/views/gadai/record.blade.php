
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

@extends('template.homeLogin')

@section('title','Gadai')

@section('container')
<br>
    <h3 style="text-align:center"> Gadai</h3>
<br>


<table class="table" style="text-align:center">
   
<tr>

<th scope="col" style="background-color:white">
  <a href="/gadai" style="color:black">Transaksi Aktif</a>
</th>
<th scope="col" style="background-color:grey">
  <a href="/record" style="color:white">Record Transaksi</a>
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
    <td>Transaksi M{{sprintf("%03d",$value->mortgageID)}}</td>
    <td>{{$value->status}}</td>
    <td><div class="dropdown">
      <a data-toggle="modal" data-target="#exampleModalLong{{$value->mortgageID}}" class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
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
          <div class="modal-body">
            <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="max" width="max" style="border: 2px solid #275996" alt="">
            <label for="name">Nama: {{$value->name}}</label>
            <br>
            <label for="mortgageID">Gadai ID: Transaksi M{{sprintf("%03d",$value->mortgageID)}}</label>
            <br>
            <label for="productName">Nama Produk: {{$value->productName}}</label>
            <br>
            <label for="productDetail">Rincian Produk: {{$value->productDetail}}</label>
            <br>
            <label for="productDescription">Nama Produk: {{$value->productDescription}}</label>
            <br>
            <label for="status">Status: {{$value->status}}</label>
            <br>
            <label for="loan">Pinjaman: {{$value->loan}}</label>

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
 
  @endif
  
  </tbody>
  <form action="{{ url('gadai/add')}}">
    <input type="submit" class="btn btn-primary" value="Request">
</form>
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