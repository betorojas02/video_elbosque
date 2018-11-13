<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Videos El Bosque</title>
  
   

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    
  
  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/a.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('css/mdb.min.css')}}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
</head>
<body>
  <div id="app">

    <header>
        
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar success-color">
            <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <strong> Videos El Bosque</strong>
                    </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7"
                aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">

                        <ul class="navbar-nav mr-auto">
                                <li><a class="nav-link" href="{{ url('/home')}}">Inicio</a></li>
                              </ul>


                              <form class="form-inline" role="search" action="{{url('/buscar')}}">
                                <div class="md-form my-0">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Que quieres ver?" name="search">
                                    <button class="btn btn-outline-primary waves-effect  my-2 my-sm-0" type="submit">Search</button>
                                </div>
                            </form>
                  <ul class="navbar-nav mr-auto">
                        
                        <!-- Authentication Links -->
                        @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                          </li>
                          @else
                          <li>
                              <a  class="nav-link" href="{{ url('/crear-video')}}">Subir video</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
                              
                              <div class="dropdown-menu dropdown-menu-right dropdown-success" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                                  {{ __('Cerrar Sesion') }}
                                </a>
                                <a class="nav-link" href="{{ route ('perfil',['slug'=> Auth::user()->slug ])}}">{{__('Perfil')}}</a>
                                
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
        

        <section>
                <div class="">
                    <img src="{{ asset('img/bos.jpg') }}" style="height:; width: 100%">
                </div>
                </div>
            </section>
    </header>
        
      <main class="py-4">

            <div class="container-fluid mb-5">

                    <!--Grid row-->
                    <div class="row" style="margin-top: -400px;">
                            <div class="col-md-12">
                            <div class="card hoverable pb-5 mx-md-3">
                                    <div class="card-body">
          @yield('content')
        </div>
    </div>
</div>
</div>
</div>
      </main>


<!-- Footer -->
<footer class="page-footer font-small black">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 py-5">
          <div class="mb-5 flex-center">

            <!-- Facebook -->
            <a class="fb-ic">
             <a href = "https://www.facebook.com/universidadelbosque/?ref=br_rs"> <i class="fa fa-facebook fa-lg white-text mr-md-5 mr-3 fa-2x" > </i></a>
            </a>
            <!-- Twitter -->
            <a class="tw-ic">
            <a href = "https://twitter.com/search?q=Universidad%20El%20Bosque&src=typd">  <i class="fa fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
           
            <!--Instagram-->
            <a class="ins-ic">
            <a href = "https://www.instagram.com/uelbosque/?hl=en">  <i class="fa fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
            </a>
           
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Videos El Bosque
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" ></script>
  <script  src="{{ asset('js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->

  <!-- MDB core JavaScript -->
  <script  src="{{ asset('js/mdb.min.js') }}"></script>

  <script  src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
  {!! toastr()->render() !!}
     
</body>
</html>