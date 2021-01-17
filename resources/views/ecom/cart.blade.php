@extends('layouts.layoutEcommerce')

@section('content')

    <h2>Your Cart</h2>

    @if (count($cart)> 0 )

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th class="table-image"></th>
                <th scope="col">Produk</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
                </thead>
            <tbody>
                @foreach($cart as $value)
                  
                <tr>
               
                    <td> 
                    <a href="/ecom/detailproduct/{{$value->IDProduct}}">
                    <img src="/storage/fotoProduk/{{$value->fotoProduk}}"height="150" width="150">
                   
                    </a>
                    <td>{{$value->productName}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{number_format($value->total_price)}},-</td>
                    <td>
                    <form action="{{ url('/destroy') }}" method="post"><br>
                        {{ csrf_field() }}
                        <input type="hidden" name="cartid" value="{{$value->id}}">
                        <input type="hidden" name="qty" value="{{$value->quantity}}">
                        <input type="hidden" name="flowerid" value="{{$value->total_price}}">
                        <button type="submit" class="btn btn-info" style="float:center;">Delete</button>
                        </form>
                    </td>
                  
                    </tr>
                @endforeach
            </tbody>

    </table>
    <form action="{{ url('/checkout') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                            <h4>Total Price :</h4>
                                            </th>

                                            <th>
                                            <h4> Rp. {{number_format($total_price)}},- </h4>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>
                                                
                                                <button type="submit" class="btn btn-success">
                                                    {{ __('Checkout') }}
                                                    </th>
                                        </tr>

                                    </thead>

                                </table>
                                            
                                </div>
                                </form>
    @else

    <h4>Tidak ada produk di dalam keranjangmu</h4>
        
    @endif
@endsection