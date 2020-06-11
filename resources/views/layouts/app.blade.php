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

      <title>@yield("title") Asociación Asperger Argentina</title>

      {{-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> --}}
      {{-- <style type="text/css">
      	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
      	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
      	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
      </style> --}}

      <link rel="icon" href="/media/logos/favicon.png" sizes="any" type="image/png">

      <!-- Scripts -->
      {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700|Raleway:500,700&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Gidugu&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}">

      @yield('style')
  </head>

  <body>

    @yield('defer')

    <header id="header" class="main-header">

      <div class="logo-container">
        <a href="/">
          <img src="/media/logos/logo.svg" alt="Logotipo Asociación Asperger Argentina">
        </a>
      </div>

      <nav class="mobile-nav">
        <div class="h1-container">
          <h1>Asociación Asperger Argentina</h1>
        </div>

        <div class="bloque2">
          <a href="/noticias">
            <div class="menu-button">Noticias</div>
          </a>
          <a href="/donar">
            <div class="menu-button">DONAR</div>
          </a>
        </div>

        <div class="dropdown-newMobile">
          <p class="button-newMobile">Menú ▼</p>
          <ul class="dropdown-content-newMobile dropdown-content-display">
            <li class="dropdown-item-newMobile">
              <a href="/">Inicio -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/quienes-somos">Quiénes somos -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/asperger-cea">Asperger/CEA -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/actividades">Actividades -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a id="bibliotecaNavMobile" href="/asperger-cea#biblioteca">Biblioteca -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/asociarse">Asociarse -</a>
            </li>
            <li class="dropdown-item-newMobile">
              <a href="/contacto">Contacto -</a>
            </li>
          </ul>
        </div>

      </nav>

      <nav class="desktop-nav">
        <div class="bloque1">

          <div class="h1-container">
            <h1>Asociación Asperger Argentina</h1>
          </div>

          <div class="bloque2 desktop-small">
            <a href="/noticias">
              <div class="menu-button">Noticias</div>
            </a>
            <a href="/donar">
              <div class="menu-button">DONAR</div>
            </a>
          </div>

          <ul class="menu-list">
            <li>
              <a href="/">Inicio</a>
            </li>
            <li class="dropdown">
              <a href="/quienes-somos">Quiénes somos</a>
              <ul class="dropdown-content">
                <li class="dropdown-item">
                  <a href="/quienes-somos">- Sobre la Asociación</a>
                </li>
                <li class="dropdown-item">
                  <a href="/quienes-somos#mision">- Misión</a>
                </li>
                <li class="dropdown-item">
                  <a href="/quienes-somos#autoridades">- Autoridades</a>
                </li>
                <li class="dropdown-item">
                  <a href="/quienes-somos#ayudar">- Cómo ayudar</a>
                </li>
                <li class="dropdown-item">
                  <a href="/quienes-somos#diptico">- Díptico</a>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="/asperger-cea">Asperger/CEA</a>
              <ul class="dropdown-content">
                <li class="dropdown-item">
                  <a href="/asperger-cea">- Sobre el síndrome</a>
                </li>
                <li id="diagnosticoNavDesktop" class="dropdown-item">
                  <a href="/asperger-cea#diagnosticos">- Diagnóstico</a>
                </li>
                <li id="intervencionesNavDesktop" class="dropdown-item">
                  <a href="/asperger-cea#intervenciones">- Intervenciones</a>
                </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="/actividades">Actividades</a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a href="/actividades">- Jornadas y Congresos</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="/actividades#debates">- Charlas/Debates</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="/actividades#taller">- Taller de padres</a>
                  </li>
                  <li class="dropdown-item">
                    <a href="/actividades#grupos">- Grupos de pertenencia</a>
                  </li>
                  </ul>
                </li>
                <li>
                  <a id="bibliotecaNavDesktop" href="/asperger-cea#biblioteca">Biblioteca</a>
                </li>
                <li>
                  <a href="/asociarse">Asociarse</a>
                </li>
                <li>
                  <a href="/contacto">Contacto</a>
                </li>
          </ul>
        </div>

        <div class="bloque2 desktop-large">
          <a href="/noticias">
            <div class="menu-button">Noticias</div>
          </a>
          <a href="/donar">
            <div class="menu-button">DONAR</div>
          </a>
        </div>

      </nav>

    </header>

    @yield('content')

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/linksNav.js') }}"></script> --}}
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

    var linkBiblioteca = document.getElementById("bibliotecaNavMobile");
    linkBiblioteca.onclick = function(){
      dropdownMobileContent.classList.toggle("dropdown-content-display");
    }

    </script>

  </body>

</html>
