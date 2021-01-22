<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title')</title>

  
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<style>

   html, body {
            background-color: rgb(232,241,255);
            color: black;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 600;
            height: 100vh;
            margin: 0;
        }
        a {
                color: gray;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                /* letter-spacing: .1rem; */
                text-decoration: none;
                /* text-transform: uppercase; */
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

            .card-header{
                text-align: center;background-color:#19365C;
                color: white;
                
                border: 1px solid #19365C;
                ;border-radius: 2px;
            }

            .card{
                border: 1px solid #19365C;
                ;border-radius: 2px;
                color: #19365C;
                
            }

            h3{
                color: #19365C
            }
            
            p{
                color: #19365C
            }
            
            .btn.style1{
              border:1px none;
              background-color: hsl(233,73%,56%);
              border-radius: 15px;
              padding: 14px;
              color: white;
             
            }
            tr{
                border: 5px solid #E8F1FF  }
            th{
                
            }

            th.active{
                background-color: #19365C;
                border-radius: 30px;
                
                
            }

            th.active a{
                color: white;
            }

            th a{
                color: #19365C;
            }

            .bordered-center {
            border: 1px none #19365C;
            border-radius: 10px;
            padding: 10px;
           
            color: white;
            margin: 10px;
            margin-left: 5%;
            text-align: center;
            height: 150px;
            width: 250px;
            }

            .row.admin h2{
                font-size: 17pt;
                color: aliceblue;
            }
            .row.admin h5{
                font-size: 17pt;
                color: aliceblue;
            }
           


            .col-8.admin h1{
                color: white;
            }
            
            .col-8.admin{
                border: 3px;
                background-color: #2981c9a4;
                border-radius: 10px;
            }
        


</style>
<body>
    {{-- <div id="app"> --}}
        <nav class="navbar">
                <a class="navbar-brand" href="/">
                <img src="/images/logs.png" alt="" srcset="" width="30" height="30" style="margin-top: -10px">
                </a>
                
                {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar">
                        @if(Auth::User()->role == 'admin')
                       
                            <div class="top-left links">
                            
                                <a href="{{ url('manageGadai')}}" style="background-color: #e3f2fd;">Manage Transaksi Gadai</a>
                                <a href="{{ url('manageProduct') }}">Manage Produk</a>
                            </div>
                                
                    @else
                       
                            <div class="top-left links">
                             <a href="/gadai">GADAI</a>
                            <a href="/ecom" >E-COMMERCE</a>
                            </div>
                               
                       
                
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                    <a class="dropdown-item" href="/changepassword">Ubah Kata Sandi</a>    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            
                        @endguest
                    </ul>
                
            
        </nav>

        <main class="col-12">
            @yield('content')
        </main>
    {{-- </div> --}}
</body>
</html>
