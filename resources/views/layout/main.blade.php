<?php 
$route = \Request::route()->getName();
$user = auth()->user();
$cookie = $_COOKIE["theme"];

?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="@if($cookie == 'light') /storage/css/flatly.bootstrap.min.css @else /storage/css/darkly.bootstrap.min.css  @endif" id="linktheme">
    @yield('css')

    <title>@yield('title')</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
      <a class="navbar-brand" href="/">Laravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item @if($route == 'home') active @endif">
            <a class="nav-link" href="/">Home <span class="sr-only"></span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategori
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/elektronik" >Elektronik</a>
              <a class="dropdown-item" href="#">Olahraga</a>
              <a class="dropdown-item" href="#">Fashion</a>
            </div>
          </li>
          @auth
            <li class="nav-item @if($route == 'timeline') active @endif">
              <a class="nav-link" href="/timeline">Linimasa <span class="sr-only"></span></a>
            </li>
          @endauth
          <li>
        </ul>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">





          @auth
          <li class="dropdown" style="list-style:none">
            <form class="form-inline">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" autocomplete="off">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <div class="dropdown-menu " aria-labelledby="navbarDropdowns" style="display:hidden;" id="downsearch">
                   
            </div>
            </li>
          @endauth






        @guest
          <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-3">  
                  <button id="themechanger" class="btn btn-info" onclick="event.preventDefault(); document.getElementById('themeform').submit();">@if($cookie == 'light') Gelap @else Cerah  @endif</button>
              </li>
              <li class="nav-item @if($route == 'login') active @endif">
                  <a class="nav-link" href="{{ route('login') }}">Masuk <span class="sr-only"></span></a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item @if($route == 'register') active @endif">
                    <a class="nav-link" href="{{ route('register') }}">Daftar <span class="sr-only"></span></a>
                </li>
              @endif
          </ul>
          <!-- Navbar kanan -->
        @else 
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-3">
                <button id="themechanger" class="btn btn-info" onclick="event.preventDefault(); document.getElementById('themeform').submit();">@if($cookie == 'light') Gelap @else Cerah  @endif</button>
            </li>
            <li class="nav-item mr-3 @if($route == 'cart') active @endif">
                <a class="nav-link" href="/cart">Keranjang<span class="sr-only"></span></a>
            </li>
            <li class="nav-item mr-3 @if($route == 'profile') active @endif">
                <a class="nav-link" href="/profile/{{$user->id}}">{{$user->name}} <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ml-auto">
              <a class="nav-link text-white btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar<span class="sr-only"></span></a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </li>
          </ul>
        @endguest
    </div>
    </nav>

    <form id="themeform" action="{{ route('change.theme') }}" method="POST" style="display: none;">
      @csrf
    </form>

    @yield('container')

    <div class="footer-copyright text-center py-3 bg-dark text-white mt-5 @yield('botom')">© 2020 Hak Cipta:
      <a href="http://localhost:8000/"> Laravel</a>
    </div>

    <script>
      console.log("%cStop!", "color: red; font-size:40px;");
      console.log('%cIni adalah fitur dari mesin penjelajah untuk pengembang. Jika seseorang meminta anda untuk menyalin sesuatu disini, mungkin mereka ingin memiliki akses ke akun anda!', 'font-size:15px;')
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <script src="/storage/js/jquery.min.js"></script> -->
    <!-- <script src="/storage/js/jquery-3.5.1.slim.min.js"></script>  -->
    <script src="/storage/js/popper.min.js"></script>
    <script src="/storage/js/bootstrap.min.js"></script>

    <script>
      function ajaxs(query = '')
      {
        $.ajax({
          url:"{{ route('search') }}",
          data:{_token: {{csrf_token()}}, query:query},
          method:'post',
          dataType:'json',
          success: function(data){
            console.log(data.data);
            $('#downsearch').css({'display' : 'inline'}).html(data.data);
          }
        });
      }

      $('#search').on('keyup', function(){
        var query = $(this).val();
        ajaxs(query);
      });
    </script>
    @yield('js')
  </body>
</html>
