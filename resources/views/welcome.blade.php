<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Gadai & E-Commerce</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            html, body {
                background-color: rgb(232,241,255);
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .height-header{
                height : 8vh;
                background-color :  #e3f2fd;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 20px;
            }

            .top-left{
                position: absolute;
                left: 10px;
                top: 20px;
            }

            .title {
                font-size: 84px;
            }
            .header{
                background-color: #e3f2fd;
                top: 30px;
                bottom: 30px;
            }

            .links > a {
                color: gray;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                /* letter-spacing: .1rem; */
                text-decoration: none;
                /* text-transform: uppercase; */
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

            .links > a:hover{
              color:black ;
            }
            .m-b-md {
                margin-bottom: 30px;
            }

            .card{
                display: flex;
                border: none 1px gray;
              border-radius: 25px;
            }

            .tentangKami{
              background: url("/images/jp.jpg");
            }
            .tataCara{
              height: max;
              margin-top: 50px;
              margin-bottom: 50px;
              
               padding: 10px;
            }

            h1{
              margin-top: 10px;
              font-weight: bold; text-align: center;
            }

            #logs{
              border:1px  hsl(233,73%,56%) solid;
              border-radius: 5px;
              padding: 8px;
              color: hsl(233,73%,56%);
              margin-right: 5px;
             
            }

            #logs:hover{
              color:  hsl(233,73%,56%);
              background-color: white;
              border: none;
            }
            #regs:hover{
              color:  hsl(233,73%,56%);
              background-color: white;
            }

            #regs{
              border:1px none;
              background-color: hsl(233,73%,56%);
              border-radius: 5px;
              padding: 8px;
              color: white; 
            }
          

            .carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='black' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}


            
        </style>
    </head>
    <body>
    
  


    <div class="flex-center position-ref height-header">
        <div class="top-left links">
         
          <a class="navbar-brand" href="#">
            <img src="images/logs.png" alt="" srcset="" width="30" height="30" style="margin-top: -10px">
          </a>

            <a href="#" id="tatacaraa">Tata Cara</a>
            <a href="#" id="snk">Syarat Ketentuan</a>
            <a href="#" id="tentangkamii" >Tentang Kami</a>
            </div>
                @if (Route::has('login'))
                    
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}" id="logs">Masuk</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" id="regs">Daftar</a>
                            @endif
                        @endauth
                    </div>
                @endif
             </div>
         </div>
               
    </div>
            

    <div class="content d-flex justify-content-center mt-3">
                <div id="carouselExampleIndicators" class="carousel slide col-8" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner" style="border-radius: 20px">
                        <div class="carousel-item active">
                        <img src="images/car11.jpg" class="d-block w-100" alt="first slide">
                        </div>
                        
                        <div class="carousel-item">
                        <img src="images/car1.jpg" class="d-block w-100" alt="second slide">
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

    <div class="container">
      <div class="row mt-5">          
        <div class="row">
          <div class="col-8 col-sm-6">
            <h1 id="scrollTTC">Tata Cara</h1>
            <img src="{{asset('images/tatacarah.png')}}" alt="" srcset="" width="1000px" height="600px">
            <h1 id="scrollsnk">Syarat & Ketentuan</h1>
            <img src="{{asset('images/snk.png')}}" alt="" srcset="" width="1000px" height="600px">
          </div>
          <div class="col-4 col-sm-6">
            {{-- <img src="images/ttcara.jpg" class="d-block w-100" alt="second slide">       --}}
          </div>
        </div>
      
    </div>
{{-- //////////////////////////////////////////////////// --}}


<div class="row mt-5">
        
          
  <div class="row">
    <div class="col-8 col-sm-6">
      <img src="images/ttkami.jpg" class="d-block w-100" alt="second slide">

    </div>
    <div class="col-4 col-sm-6">
      
      <h1 id="scrollTTK">Tentang Kami</h1>
      Kami menyediakan layanan pinjaman dana untuk anda. Dengan bunga 3% per bulan dari barang agunan anda. Selain pinjaman dana, anda juga bisa membeli sejumlah produk yang tersedia di website kami. Produk yang kami tawarkan merupakan product secondhand namun dengan kualitas yang masih baik. Bergabunglah hari ini dan rasakan kemudahannya!
    </div>
  </div>

</div>
          

           

    </div>
</div>

<div class="row mt-5 justify-content-center">
  <div class="col-12">
      <div class="bottom" style="background-color: rgb(25, 54, 92);color:white">
          <div class="container-fluid text-center text-md-left">
              <div class="row align-text-center">

                  <div class="col-md-6 mt-md-2 mb-3">
                      <h5 class="text-uppercase font-weight-bold">Info Kontak</h5>
                      <hr>
                      <p style="color: white">Email : gardadanaindonesia@gmail.com <br> Telp : +021 888 999 <br> Instagram : @gardadanaindonesia</p>
                  </div>
          
                  <hr class="clearfix w-100 d-md-none mb-3">

                  <div class="col-md-6 mt-md-2 mb-3">
                      <h5 class="text-uppercase font-weight-bold">Gadai & E-Commerce</h5>
                      <hr>
                      <p style="color: white">Menyediakan pinjaman dan menjual produk secondhand berkualitas. <br> Solusi untuk segala keperluan anda. Bergabung hari ini dan rasakan kelebihannya. Mudah dan aman.</p>
                  </div>

              </div>

              <div class="footer-copyright text-center py-3"><strong>© 2020</strong></div>
          </div>
      </div>  

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    </body>
</html>
