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
            
          
            

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md ">
            <div class="container">
                @if(Auth::User()->role == 'admin')
                <a class="navbar-brand" href="#">
                    <img src="images/logs.png" alt="" srcset="" width="30" height="30" style="margin-top: -10px">
                </a>
                @endif
                @if(Auth::User()->role == 'member')
                <a class="navbar-brand" href="">
                    <img src="images/logs.png" alt="" srcset="" width="30" height="30" style="margin-top: -10px">
                </a>
                @endif

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
                             <a href="{{ url('gadai') }}">GADAI</a>
                                <a href="{{ url('ecom') }}" >E-COMMERCE</a>
                                </div>
                                </div>
                            </div>     
                        </div>
                
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="">Profile</a>    
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
