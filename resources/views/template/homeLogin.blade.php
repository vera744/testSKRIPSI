<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title')
        </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <style>
            html, body {
                background-color: rgb(232,241,255);
            color: black;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 600;
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
                top: 18px;
            }

            .top-left{
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .header{
                background-color: #e3f2fd;
                top: 30px;
                bottom: 30px;
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

            .m-b-md {
                margin-bottom: 30px;
            }

            h3{
                text-align: center;
            }
            
        </style>
    </head>
    <body>


    @if(Auth::User()->role == 'admin')
        <div class="flex-center position-ref height-header">
            <div class="top-left links">
                
                <a class="navbar-brand" href="/">
                    <img src="{{asset('images/logs.png')}}" width="30" height="30" style="margin-top: -10px">
                  </a>
                <a href="{{ url('manageGadai')}}" style="background-color: #e3f2fd;">Manage Mortgage Transactions</a>
                <a href="{{ url('') }}">Blablabla</a>
                </div>
                    @if (Route::has('login'))
                        
                        <div class="top-right links">
                            @auth
                        <a href="#">Hallo, {{Auth::User()->name}}</a>
                            <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>     
        </div>

    @else
        <div class="flex-center position-ref height-header">
            <div class="top-left links">
            
                <a class="navbar-brand" href="/">
                  <img src="{{asset('images/logs.png')}}" width="30" height="30" style="margin-top: -10px">
                </a>
                <a href="{{ url('gadai') }}">GADAI</a>
                <a href="{{ url('ecom') }}" >E-COMMERCE</a>
                </div>
                    @if (Route::has('login'))
                        
                        <div class="top-right links">
                            @auth
                            <ul class="navbar-nav ml-auto">
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
                        </ul>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>     
        </div>

        @endif
        <div class="container-fluid">
            @yield('container')
        </div>

        {{-- Ajax --}}
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    </body>
</html>
