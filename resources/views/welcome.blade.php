<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home | Gadai & E co</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
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

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .card{
                display: flex;
            }

            
        </style>
    </head>
    <body>
    
  


    <div class="flex-center position-ref height-header">
        <div class="top-left links">
         
            <a href="/" style="background-color: #e3f2fd;">LOGO</a>
            <a href="#" id="tatacaraa">TATA CARA</a>
            <a href="#" id="tentangkamii" >TENTANG KAMI</a>
            </div>
                @if (Route::has('login'))
                    
                    <div class="top-right links">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
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
            
    <div class="content">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="images/landscape1.jpg" class="d-block w-100" alt="first slide">
                        </div>
                        
                        <div class="carousel-item">
                        <img src="images/landscape2.jpg" class="d-block w-100" alt="second slide">
                        </div>
                    
                    </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                </div>
    </div>

    <div class="container">
    <div class="row">
            <div class="col-5">
                    {{-- <br><br>
                    <video src="/videos/video bts.webm" class="rounded mx-auto d-block" style="width:400px;"></video>
                    </div> --}}
                   
                       
            </div>
            
            <div class="tataCara">
                  <h1>TATA CARA</h1>
                <div class="card-group">
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 1</h5>
                        <p class="card-text">Masukkin data barang yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia hic, velit qui itaque alias quis error neque repellendus nostrum a necessitatibus nulla, iste eum unde enim ad fuga vitae doloremque!</p>
                      </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 2</h5>
                        <p class="card-text">Tunggu hasil tinjauan yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam commodi similique error, temporibus fugiat, labore in sit, dolor minima itaque a facilis quidem cum fuga cupiditate magnam qui quasi.</p>
                        </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 3</h5>
                        <p class="card-text">Schedule a meeting yada yada yada Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere excepturi, velit omnis ad porro harum fugit dolorum! Porro totam doloribus reiciendis, tenetur, recusandae dolorem, sed quidem earum impedit atque similique.</p>
                       </div>
                    </div>
                  </div>

                  <div class="card-group">
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 1</h5>
                        <p class="card-text">Masukkin data barang yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia hic, velit qui itaque alias quis error neque repellendus nostrum a necessitatibus nulla, iste eum unde enim ad fuga vitae doloremque!</p>
                      </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 2</h5>
                        <p class="card-text">Tunggu hasil tinjauan yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam commodi similique error, temporibus fugiat, labore in sit, dolor minima itaque a facilis quidem cum fuga cupiditate magnam qui quasi.</p>
                        </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 3</h5>
                        <p class="card-text">Schedule a meeting yada yada yada Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere excepturi, velit omnis ad porro harum fugit dolorum! Porro totam doloribus reiciendis, tenetur, recusandae dolorem, sed quidem earum impedit atque similique.</p>
                       </div>
                    </div>
                  </div>
                  <div class="card-group">
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 1</h5>
                        <p class="card-text">Masukkin data barang yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia hic, velit qui itaque alias quis error neque repellendus nostrum a necessitatibus nulla, iste eum unde enim ad fuga vitae doloremque!</p>
                      </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 2</h5>
                        <p class="card-text">Tunggu hasil tinjauan yada yada yada Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto veniam commodi similique error, temporibus fugiat, labore in sit, dolor minima itaque a facilis quidem cum fuga cupiditate magnam qui quasi.</p>
                        </div>
                    </div>
                    <div class="card">
                      {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                      <div class="card-body">
                        <h5 class="card-title">Step 3</h5>
                        <p class="card-text">Schedule a meeting yada yada yada Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere excepturi, velit omnis ad porro harum fugit dolorum! Porro totam doloribus reiciendis, tenetur, recusandae dolorem, sed quidem earum impedit atque similique.</p>
                       </div>
                    </div>
                  </div>
            </div>

            <div class="tentangKami">
                <h1 id="scrollTTK">Tentang Kami</h1>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error dignissimos repudiandae rem incidunt porro ea quae exercitationem assumenda totam corporis? Facere ipsam voluptatibus, nulla quas non nemo minus corrupti quae.
                Laborum incidunt sit, id accusamus blanditiis qui ut maiores optio iste tempora autem et temporibus modi rerum, laudantium mollitia placeat fugit similique sint, quo labore cum eius. Illo, commodi harum.
                Necessitatibus esse rem eaque sint ipsam iusto quae nam earum iure voluptatibus eos laudantium repudiandae sunt pariatur, saepe quaerat distinctio dolore, et dolores maiores dolorem! Consequuntur distinctio culpa quaerat dignissimos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error dignissimos repudiandae rem incidunt porro ea quae exercitationem assumenda totam corporis? Facere ipsam voluptatibus, nulla quas non nemo minus corrupti quae.
                Laborum incidunt sit, id accusamus blanditiis qui ut maiores optio iste tempora autem et temporibus modi rerum, laudantium mollitia placeat fugit similique sint, quo labore cum eius. Illo, commodi harum.
                Necessitatibus esse rem eaque sint ipsam iusto quae nam earum iure voluptatibus eos laudantium repudiandae sunt pariatur, saepe quaerat distinctio dolore, et dolores maiores dolorem! Consequuntur distinctio culpa quaerat dignissimos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error dignissimos repudiandae rem incidunt porro ea quae exercitationem assumenda totam corporis? Facere ipsam voluptatibus, nulla quas non nemo minus corrupti quae.
                Laborum incidunt sit, id accusamus blanditiis qui ut maiores optio iste tempora autem et temporibus modi rerum, laudantium mollitia placeat fugit similique sint, quo labore cum eius. Illo, commodi harum.
                Necessitatibus esse rem eaque sint ipsam iusto quae nam earum iure voluptatibus eos laudantium repudiandae sunt pariatur, saepe quaerat distinctio dolore, et dolores maiores dolorem! Consequuntur distinctio culpa quaerat dignissimos.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Error dignissimos repudiandae rem incidunt porro ea quae exercitationem assumenda totam corporis? Facere ipsam voluptatibus, nulla quas non nemo minus corrupti quae.
                Laborum incidunt sit, id accusamus blanditiis qui ut maiores optio iste tempora autem et temporibus modi rerum, laudantium mollitia placeat fugit similique sint, quo labore cum eius. Illo, commodi harum.
                Necessitatibus esse rem eaque sint ipsam iusto quae nam earum iure voluptatibus eos laudantium repudiandae sunt pariatur, saepe quaerat distinctio dolore, et dolores maiores dolorem! Consequuntur distinctio culpa quaerat dignissimos.
            </div>
    </div>
</div>
        
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
  
    </body>
</html>
