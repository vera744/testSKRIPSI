@extends('layouts.layoutEcommerce')

@section('content')

    <h2>Your Cart</h2>
    @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

    @if(Session::has('cart'))
    
    <table class="table">
        <thead>
            <tr>
                <th class="table-image"></th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th class="column-spacer"></th>
                <th></th>
            </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                        <td class="table-image">
                        <td>{{ $product->productName}}</td>
                        <td>{{$product->productQuantity}}</td>
                        <td>{{$product->productPrice}}</td>
                        <td class=""></td>
                        <td>
                            <!-- <form action="{{ url('cart', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger btn-sm" value="Remove">
                            </form>

                            <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
                                {!! csrf_field() !!}
                                <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                            </form> -->
                        </td>
                    </tr>
                    @endforeach
        </tbody>
    </table>


<!-- 
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{$product['qty']}}</span>
                            <strong>{{$product['item']['title']}}</strong>
                            <span class="label succes">{{$product['price']}}</span> -->
                            <!-- <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown_toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="">Reduce by 1</a></li>
                                    <li><a href="">Reduce All</a></li>

                                </ul>
                            </div> -->
                            <!-- <form action="/ecom/cart/{$product->productID}" method="POST">
                                {{ csrf_field()}}
                                {{method_field('DELETE')}}
                                <button type="submit" class="cart-options">X</button> -->
                            <!-- </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <strong>Total: {{$totalPrice}}</strong>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Checkout</button>
            </div>
        </div> -->
    @else
    <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h2>No Items in Cart</h2>
            </div>
        </div>
    @endif

    @include('_partials.might-like_')
@endsection