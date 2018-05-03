<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <title>Ultima Planta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" type="image/x-icon" href="img-up/favicon.ico">
<style>
    .main{
min-height:500px;
    }
</style>

</head>

<body>

<nav class="navbar nav-tabs navbar-expand-sm bg-dark navbar-dark sticky-top pb-0">
    <div class="container-fluid ">

      <div class="col-12 col-sm-2 mt-2">
        <a class="navbar-brand" href="/">
          <img src="img-up/up.png" alt="logo" style="width:40px;">Ultima Planta
        </a>
      </div>
      <div class="col-12 col-sm-10 align-self-end">
        <ul class="nav nav-menu justify-content-end">
          <li class=" pb-0 nav-item btn  ">
            <a class="pb-0 nav-link" href="#ubi">Ubicacion</a>
          </li>
          <li class=" pb-0 nav-item btn">
            <a class="pb-0 nav-link" href="#about">Sobre nosotros</a>
          </li>
          <li class=" pb-0 nav-item btn">
            <a class="pb-0 nav-link" href="#contact">Contactar</a>
          </li>
          @if (Route::has('login'))
        <div class="top-right links">
            @auth
                 <li class="pb-0 nav-item btn">
                    <a class="pb-0 nav-link" href="{{ url('/home') }}">perfil</a>
                </li>
                @else
                <ul class="pb-0">
                    <li class=" pb-0 nav-item btn px-1">
                        <a class="pb-0 nav-link
                        @if(Request::path()=='login' )
                            active
                        @endif" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="pb-0 nav-item btn px-1 ">
                        <a class="pb-0 nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endauth
            </div>
        @endif
        </ul>
      </div>

    </div>
  </nav>
<div class="main">

@yield('content')

</div>
  <footer class="h-25 pt-4 bg-dark text-light text-center mt-4">
    <p class="pt-4">Ultima Planta &copy;2017</p>
    <p>Developers: Krilitos & RGC</p>
  </footer>
</body>
</html>
