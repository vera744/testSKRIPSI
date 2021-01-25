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
    <script src="{{ asset('js/dropdown.js') }}" defer></script>

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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
            /* tr{
                border: 5px solid #E8F1FF  }
            th{
                
            } */

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

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md ">
            <div class="container mt-2">
                <a class="navbar-brand" href="/">
                    <img src="/images/logs.png" alt="" srcset="" width="30" height="30" style="margin-top: -10px">
                </a>
               

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if(Auth::User()->role == 'admin')
                        <div class="flex-center position-ref height-header">
                            <div class="top-left links">
                            
                                <a href="{{ url('manageGadai')}}" style="background-color: #e3f2fd;">Manage Mortgage Transactions</a>
                                <a href="{{ url('') }}">Blablabla</a>
                                </div>
                                
                    @else
                        <div class="flex-center position-ref height-header">
                            <div class="top-left links">
                                <a href="/gadai">GADAI</a>
                                <a href="/ecom" >E-COMMERCE</a>
                            </div>
                              
                            </div>
                                <form action="{{route('search')}}" method="GET" class="form-inline my-2 my-lg-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query" id="query" value="{{request()->input('query')}}">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>     
                        </div>
                
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="dropdown" id="markasread" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="bi-bell-fill" style="font-size: 1.8rem; color: #19365C;"></i><span class="badge" style="background-color: grey ; color:#e3f2fd ">{{count(auth()->user()->unreadNotifications)}}</span>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @forelse(auth()->user()->unreadNotifications as $notification)
                                        @include('notifications.'.snake_case(class_basename($notification->type)))
                                    @empty
                                        <li class="dropdown-item">
                                            <a href="#" style="font-size: 14px">Tidak ada notifikasi baru</a>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/ecom/cart"><i class="bi-cart-fill" style="font-size: 1.8rem; color: #19365C;"></i>
                                <span class="badge badge-secondary">{{Session::has('cart') ? Session::get('cart')->$totalqty: ''}}</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                    <a class="dropdown-item" href="/changepassword">Change Password</a> 
                                    <a class="dropdown-item" href="/pesanview">Pesanan Saya</a>    
                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 container">
            @yield('content')
        </main>
    </div>
    
    <div class="bottom" style="background-color: rgb(25, 54, 92);color:white">
        <div class="container-fluid text-center text-md-left">
          <div class="row">
            <div class="col-md-6 mt-md-2 mb-3">
              <h5 class="text-uppercase font-weight-bold">Info Kontak</h5>
              <hr>
              <p style="color: white">Email : gardadanaindonesia@gmail.com <br> Telp : +021 888 999 <br> Instagram : @gardadanaindonesia</p>
            </div>
      
            <hr class="clearfix w-100 d-md-none pb-3">

            <div class="col-md-6 mt-md-2 mb-3">
              <h5 class="text-uppercase font-weight-bold">Gadai & E-Commerce</h5>
              <hr>
              <p style="color: white">Menyediakan pinjaman dan menjual produk secondhand berkualitas. <br> Solusi untuk segala keperluan anda. Bergabung hari ini dan rasakan kelebihannya. Mudah dan aman.</p>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-center py-3"><strong>© 2020</strong>  
        </div>
    </div>
</body>
</html>
