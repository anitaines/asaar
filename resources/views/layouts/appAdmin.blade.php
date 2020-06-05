<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">
      {{-- SEO --}}
      <meta name="description" content="Sitio Oficial de la Asociación Asperger Argentina">
      <meta name="keywords" content="Asperger, Síndrome de Asperger, CEA, TEA, Trastorno del Espectro Autista, Condición del Espectro Autista, Autismo, Asociación sin fines de lucro">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
      <title>@yield("title") Asociación Asperger Argentina</title>

      <link rel="icon" href="/media/logos/favicon.png" sizes="any" type="image/png">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700|Raleway:500,700&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Gidugu&display=swap" rel="stylesheet">

      <!-- Styles -->
      <link rel="stylesheet" href="/css/stylesResp.css">

  </head>

  <body>

    {{-- @yield('defer') --}}

    <header id="header" class="main_header admin_header">

      <div class="header_itemsContainer">

        <div class="div_header_logo">
          {{-- <a href="/"> --}}
            <img class="img_header_logo"src="/media/logos/logo.svg" alt="Logotipo Asociación Asperger Argentina">
          {{-- </a> --}}
        </div>

        <div class="menu_container">

          <div class="div_header_nav">

            <div class="menu_container_line1">
            <div class="divh1_header_nav">
              <h1 class="h1_header_nav">Sitio interno - AsAAr</h1>
              </div>

              {{-- DESKTOP SMALL --}}
            <div class="container_header_nav2_992v">
                {{-- <div class="div_header_nav2_992v"> --}}
                  <a class="a_header_nav2_992v" href="#"><div class="div_header_nav2_992v">Cambiar contraseña</div></a>
                  {{-- </div> --}}
                {{-- <div class="div_header_nav2_992v"> --}}
                  <a class="a_header_nav2_992v" href="/"><div class="div_header_nav2_992v">Log-out</div></a>
                  {{-- </div> --}}
              </div>

              </div>

              {{-- NAV DESKTOP --}}
            <nav class="header_nav">
              <a class="a_header_nav" href="/control-panel">Panel de control</a>
              {{-- <div class="separador"></div> --}}
              <a class="a_header_nav" href="/generar-noticias">Nueva noticia</a>

              <a class="a_header_nav" href="/generar-imagen">Crear imagen para redes sociales</a>

              <a class="a_header_nav" href="/administrar-carousel">Administrar carousel de inicio</a>

              <a class="a_header_nav" href="/administrar-imagenes">Administrar imágenes guardadas</a>

            </nav>
          </div>

          <div class="container_header_nav2">
            {{-- <div class="div_header_nav2"> --}}
              <a class="a_header_nav2" href="#"><div class="div_header_nav2">Cambiar contraseña</div></a>
              {{-- </div> --}}
            {{-- <div class="div_header_nav2"> --}}
              <a class="a_header_nav2" href="/"><div class="div_header_nav2">Log-out</div></a>
              {{-- </div> --}}

              {{-- NAV MOBILE --}}
              <div class="dropdown-newMobile">
                <p class="button-newMobile">Menú ▼</p>
                <div class="dropdown-content-newMobile dropdown-content-display">
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/control-panel">Panel de control -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/generar-noticias">Nueva noticia -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/generar-imagen">Crear imagen para redes sociales -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/administrar-carousel">Administrar carousel de inicio -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/administrar-imagenes">Administrar imágenes guardadas -</a>
                    </div>
                  </div>
                </div>

            </div>
          </div>
        </div>
      </header>


    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/linksNavAdmin.js') }}"></script>

    </body>

</html>
