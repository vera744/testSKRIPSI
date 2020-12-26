@extends('layouts.auths')

@section('title', "E-Commerce")

@section('searchBtn')
<form class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
@endsection
@section('content')

<div class="content d-flex justify-content-center mt-3">
                <div id="carouselExampleIndicators" class="carousel slide col-8" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        
                    </ol>

                    <div class="carousel-inner" style="border-radius: 10px">
                        <div class="carousel-item active">
                        <img src="images/sale.png" class="d-block w-100" alt="first slide">
                        </div>
                        
                        <div class="carousel-item">
                        <img src="images/sale (1).png" class="d-block w-100" alt="second slide">
                        </div>
                    
                    </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="color: black">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                </div>
      </div>
    </div>

<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class = "card-header">
                    <strong>Kategori</strong>
                </div>
                <div class="card-body">
                <nav class="navbar navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="kategori/phone.png" width="30" height="30" alt="">Handphone
                    </a>

                    <a class="navbar-brand" href="#">
                        <img src="kategori/phone.png" width="30" height="30" alt="">Laptop
                    </a>

                    <a class="navbar-brand" href="#">
                        <img src="kategori/phone.png" width="30" height="30" alt="">Elektronik
                    </a>
                    </nav>
                    
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card" width="100" height="100">
                <div class="card-header">
                    <strong>
                        Rekomendasi
                    </strong>
                </div>

                <div class="card-body">

                <div class="row">
                @foreach($products as $value)
                <div class="col-md-4">

                    <div class="card" style="width: 250px; height: 510px;">
                        <img src="storage/fotoProduk/{{$value->fotoProduk}}" class="card-img-top" height="300" width="250">
                        <div class="card-body">
                            <a href="{{ url('/productdetails/'.$value->id) }}" class="productName">
                                {{ $value->productName }}
                            </a>

                            <h6>
                                Rp. {{ $value->productPrice }}
                            </h6>

                            <p class="card-text">
                                {{ $value->productDetail }}
                            </p>

                            <h6>
                                Qty : {{ $value->productQuantity }} 
                            </h6>

                            
                        </div>
                    </div>      
                </div>
                @endforeach
            </div>
        
                </div>
            </div>    
        </div>
    </div>

</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
  
@endsection

