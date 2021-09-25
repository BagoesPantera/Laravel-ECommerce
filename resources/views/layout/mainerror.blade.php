<?php 
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
          <li class="nav-item">
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
        </ul>
        </div>
    </div>
    </nav>

    @yield('container')

    <div class="footer-copyright text-center py-3 bg-dark text-white mt-5 @yield('botom')">© 2020 Hak Cipta:
      <a href="http://localhost:8000/"> Laravel</a>
    </div>

    <script>
      console.log("%cStop!", "color: red; font-size:40px;");
      console.log('%cIni adalah fitur dari mesin penjelajah untuk pengembang. Jika seseorang meminta anda untuk menyalin sesuatu disini, mungkin mereka ingin memiliki akses ke akun anda!', 'font-size:15px;')
      console.log('%cGambar imut ini dibuat oleh 588ku ! cek disini -> https://pngtree.com/freepng/lost-question-mark_4697547.html', 'font-size:10px')
    </script>

    <script src="/storage/js/jquery.min.js"></script>
    <script src="/storage/js/jquery-3.5.1.slim.min.js"></script> 
    <script src="/storage/js/popper.min.js"></script>
    <script src="/storage/js/bootstrap.min.js"></script>
    @yield('js')
  </body>
</html>
