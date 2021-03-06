<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      {{-- SEO --}}
      <meta name="description" content="Sitio Oficial de la Asociación Asperger Argentina">
      <meta name="keywords" content="Asperger, Síndrome de Asperger, CEA, TEA, Trastorno del Espectro Autista, Condición del Espectro Autista, Autismo, Asociación sin fines de lucro">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield("title") Asociación Asperger Argentina</title>

      <link rel="icon" href="/media/logos/favicon.png" sizes="any" type="image/png">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700|Raleway:500,700&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Gidugu&display=swap" rel="stylesheet">

      <!-- Styles -->
      <link rel="stylesheet" href="/css/stylesRespAdmin.css?v={{$cssVersion}}">

  </head>

  <body>

    <header id="header" class="main-header admin-header">

      <div class="logo-container">
        <a href="/control-panel">
          <img src="/media/logos/logo.svg" alt="Logotipo Asociación Asperger Argentina">
        </a>
      </div>

      <nav class="mobile-nav">
        {{-- <div class="h1-container">
          <h1>Sitio interno - AsAAr</h1>
        </div> --}}

        <div class="bloque2">
          {{-- <a href="#">
            <div class="menu-button">Cambiar contraseña</div>
          </a> --}}
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form-mobile').submit();">
            <div class="menu-button">
              Logout
              <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </a>
        </div>

        <div class="dropdown-newMobile">
          <p class="button-newMobile">Menú ▼</p>
          <ul class="dropdown-content-newMobile dropdown-content-display">
            <li class="dropdown-item-newMobile">
              <a href="/control-panel">Panel de control -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/generar-noticias">Nueva noticia -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/generar-imagen">Crear imagen para redes sociales -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/administrar-carousel">Administrar carousel de inicio -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/administrar-imagenes">Administrar imágenes guardadas -</a>
            </li>
            {{-- <li class="dropdown-item-newMobile">
              <a href="/administrar-imagenes">Cambiar contraseña -</a>
            </li> --}}
          </ul>
        </div>

      </nav>

      <nav class="desktop-nav">
        <div class="bloque1">

          <div class="h1-container">
            <h1>Sitio interno - AsAAr</h1>
          </div>

          <div class="bloque2 desktop-small">
            {{-- <a href="#">
              <div class="menu-button">Cambiar contraseña</div>
            </a> --}}
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form-desktop-small').submit();">
              <div class="menu-button">
                Logout
                <form id="logout-form-desktop-small" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </div>
            </a>
          </div>

          <ul class="menu-list">
            <li>
              <a href="/control-panel">Panel de control</a>
            </li>
            <li>
              <a href="/generar-noticias">Nueva noticia</a>
            </li>
            <li>
              <a href="/generar-imagen">Crear imagen para redes sociales</a>
            </li>
            <li>
              <a href="/administrar-carousel">Administrar carousel de inicio</a>
            </li>
            <li>
              <a href="/administrar-imagenes">Administrar imágenes guardadas</a>
            </li>
          </ul>
        </div>

        <div class="bloque2 desktop-large">
          {{-- <a href="#">
            <div class="menu-button">Cambiar contraseña</div>
          </a> --}}
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form-desktop-large').submit();">
            <div class="menu-button">
              Logout
              <form id="logout-form-desktop-large" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </div>
          </a>
        </div>

      </nav>

    </header>

    @yield('content')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/linksNavAdmin.js') }}"></script> --}}
    <script>
    var dropdownMobile = document.querySelector(".button-newMobile");
    var dropdownMobileContent = document.querySelector(".dropdown-content-newMobile");

    dropdownMobile.onclick = function(){
      dropdownMobileContent.classList.toggle("dropdown-content-display");
      if (dropdownMobile.innerHTML == "Menú ▲"){
        dropdownMobile.innerHTML = "Menú ▼";
      }else{
        dropdownMobile.innerHTML = "Menú ▲";
      }
    }
    </script>

    </body>

</html>
