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

      <!-- Styles -->
      <link rel="stylesheet" href="/css/stylesResp.css">

  </head>

  <body>

    {{-- @yield('defer') --}}

    <header id="header" class="main_header">

      <div class="header_itemsContainer">

        <div class="div_header_logo">
          <a href="/">
            <img class="img_header_logo"src="/media/logos/logo.svg" alt="Logotipo Asociación Asperger Argentina">
          </a>
        </div>

        <div class="menu_container">

          <div class="div_header_nav">

            <div class="menu_container_line1">
            {{-- <div class="divh1_header_nav">
              <h1 class="h1_header_nav">ASOCIACIÓN ASPERGER ARGENTINA</h1>
              </div> --}}

              {{-- DESKTOP SMALL --}}
            {{-- <div class="container_header_nav2_992v">
                <div class="div_header_nav2_992v">
                  <a class="a_header_nav2_992v" href="#">Noticias</a>
                  </div>
                <div class="div_header_nav2_992v">
                  <a class="a_header_nav2_992v" href="/donar">DONAR</a>
                  </div>
              </div> --}}

              </div>

              {{-- NAV DESKTOP --}}
            {{-- <nav class="header_nav">
              <a class="a_header_nav" href="/">Inicio</a>

              <div class="dropdown">
                <a class="a_header_nav" href="/quienes-somos">Quiénes somos</a>
                <div class="dropdown-content">
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/quienes-somos">- Sobre la Asociación</a>
                  </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/quienes-somos#mision">- Misión</a>
                  </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/quienes-somos#autoridades">- Autoridades</a>
                  </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/quienes-somos#ayudar">- Cómo ayudar</a>
                  </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/quienes-somos#diptico">- Díptico</a>
                  </div>
                  </div>
                </div>

              <div class="dropdown">
                <a class="a_header_nav" href="/asperger-cea">Asperger/CEA</a>
                <div class="dropdown-content">
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/asperger-cea">- Sobre el síndrome</a>
                    </div>
                  <div id="diagnosticoNavDesktop" class="dropdown-item">
                    <a class="a_header_nav" href="/asperger-cea#diagnosticos">- Diagnóstico</a>
                    </div>
                  <div id="intervencionesNavDesktop" class="dropdown-item">
                    <a class="a_header_nav" href="/asperger-cea#intervenciones">- Intervenciones</a>
                    </div>
                  </div>
                </div>

              <div class="dropdown">
                <a class="a_header_nav" href="/actividades">Actividades</a>
                <div class="dropdown-content">
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/actividades">- Jornadas y Congresos</a>
                    </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/actividades#debates">- Charlas/Debates</a>
                    </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/actividades#taller">- Taller de padres</a>
                    </div>
                  <div class="dropdown-item">
                    <a class="a_header_nav" href="/actividades#grupos">- Grupos de pertenencia</a>
                    </div>
                  </div>
                </div>

              <a id="bibliotecaNavDesktop" class="a_header_nav" href="/asperger-cea#biblioteca">Biblioteca</a>
              <a class="a_header_nav" href="/asociarse">Asociarse</a>
              <a class="a_header_nav" href="/contacto">Contacto</a>
              </nav> --}}
            </div>

          <div class="container_header_nav2">
            {{-- <div class="div_header_nav2">
              <a class="a_header_nav2" href="#">Noticias</a>
              </div>
            <div class="div_header_nav2">
              <a class="a_header_nav2" href="/donar">DONAR</a>
              </div> --}}

              {{-- NAV MOBILE --}}
              {{-- <div class="dropdown-newMobile">
                <p class="button-newMobile">Menú ▼</p>
                <div class="dropdown-content-newMobile dropdown-content-display">
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/">Inicio -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/quienes-somos">Quiénes somos -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/asperger-cea">Asperger/CEA -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/actividades">Actividades -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a id="bibliotecaNavMobile" class="a_header_nav" href="/asperger-cea#biblioteca">Biblioteca -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/asociarse">Asociarse -</a>
                    </div>
                  <div class="dropdown-item-newMobile">
                    <a class="a_header_nav" href="/contacto">Contacto -</a>
                    </div>
                  </div>
                </div> --}}

            </div>
          </div>
        </div>
      </header>


    @yield('content')
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/linksNav.js') }}"></script> --}}

    </body>

</html>
