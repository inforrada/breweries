<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME')}} @yield ('title')</title>
    <!-- link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    -->
    @vite (['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    
    @livewireStyles
      
    <link href="{{ asset('css/misestilos.css') }}" rel="stylesheet"/>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg cabecera">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="{{ route('home') }}"><img src="{{ asset('img/logo.png')}}" class="logo"> </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route ('bars.index') }}">Mejores bares</a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route ('bars.proposals',  Auth::user()) }}">Mis propuestas</a>
              </li>
              @endauth
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route ('wine.index') }}">Nuestra bodega</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="{{ route ('contact') }}">Contacto</a>
              </li>
            </ul>
            <span class="navbar-text text-white">
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->


                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                <form action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <li class="nav-item">
                        <button type="submit" class="nav-link text-white" >¿No soy {{ Auth::user()->name }}?</button>
                    </li>
                </form>




                @endguest
            </ul>
            </span>
          </div>
        </div>
      </nav>
    <main class="container">

        @yield('content')

    </main>

<x-footer />
<!-- script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<script>
    function confirmar (texto, titulo) {

        return confirm (texto, titulo);
    }
    </script>
@livewireScripts     
</body>

</html>
