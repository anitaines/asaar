<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
      <meta charset="utf-8">

      <meta name="viewport" content="width=device-width, initial-scale=1">

      {{-- SEO --}}
      {{-- <meta name="description" content="Sitio Oficial de la Asociación Asperger Argentina"> --}}
      <meta name="description" content=@yield("meta-description")>

      <meta name="keywords" content="Asperger, Síndrome de Asperger, CEA, TEA, Trastorno del Espectro Autista, Condición del Espectro Autista, Autismo, Asociación sin fines de lucro">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>@yield("title") Asociación Asperger Argentina</title>

      @yield("meta-fb")

      {{-- <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css"> --}}
      {{-- <style type="text/css">
      	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
      	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
      	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
      </style> --}}

      <link rel="icon" href="/media/logos/favicon.png" sizes="any" type="image/png">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700|Raleway:500,700&display=swap" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css2?family=Gidugu&display=swap" rel="stylesheet">

      <style>

       :root {
        --green: #6ACF95; /* rgba(106, 207, 149, 1) */
        /* --orange: #FC8901; rgba(239, 136, 51, 1) */
        --orange: #e87500;
        --magenta: #AB2097; /* rgba(172, 60, 151, 1) */
        --blue: #34BFD2; /* rgba(86, 192, 211, 1) */
        --grey: #F3F3F3;
        --black: #454545;
      }


       /* Resets*/
       *{
         box-sizing: border-box;
       }
      body{
        background-color: #ffffff;
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        line-height: 1.6;
        color: var(--black);
        max-width: 1920px;
        margin: 0 auto;
        text-align: left;
      }
      html {
        scroll-behavior: smooth;
        line-height: 1.15;
      }
      article,aside,figcaption,figure,footer,header,hgroup,main,nav,section {
        display: block
      }
      h1,h2,h3,h4,h5,h6 {
        margin-top: 0;
        margin-bottom: .5rem;
        margin-bottom: .5rem;
        font-family: inherit;
        font-weight: 500;
        line-height: 1.2;
        color: inherit;
        font-size: 2.25rem;
        font-size: 1.575rem
      }
      p {
        margin-top: 0;
        margin-bottom: 1rem
      }
      blockquote {
        margin: 0 0 1rem
      }
      b,strong {
        font-weight: bolder
      }
      a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
        text-decoration: none;
        color: var(--black);
      }
      a:hover {
        color: #1d68a7;
      }
      img {
        border-style: none
      }
      img,svg {
        vertical-align: middle
      }


      /* HEADER - MOBILE*/
      .main-header{
        width: 100%;
        max-width: 1920px;
        height: 70px;
        position: fixed;
        z-index: 1000;
        top: 0;
        border-radius: 0px 0px 8px 8px;
        background-color: var(--grey);
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        justify-content: space-between;
      }
      .main-header .logo-container{
        margin-left: 5px;
      }
      .main-header .logo-container a img{
        width: 60px;
      }
      .main-header .mobile-nav{
        width: calc(100% - 60px - 15px);
        margin: 0px 10px;
        display: flex;
        align-items: center;
        justify-content: flex-end;
      }
      .main-header .mobile-nav .h1-container{
        display: none;
      }
      .main-header .mobile-nav .dropdown-newMobile{
        position: relative;
        display: inline-block;
        width: 30%;
        margin: 0px 5px;
      }
      .main-header .mobile-nav .button-newMobile{
        width: 100%;
        height: 40px;
        background-color: var(--orange);
        border-radius: 8px;
        font-size: 16px;
        line-height: 39px;
        color: #ffffff;
        text-align: center;
        margin-bottom: 0;
      }
      .main-header .mobile-nav .button-newMobile:hover{
        cursor: pointer;
      }
      .main-header .mobile-nav .dropdown-content-newMobile{
        position: absolute;
        background-color: var(--orange);
        border-radius: .25rem;
        top: 47px;
        padding: 10px 0;
        margin: 0;
        right: 0px;
        width: fit-content;
        text-align: right;
      }
      .main-header .mobile-nav .dropdown-content-display{
        display: none;
      }
      .main-header .mobile-nav .dropdown-item-newMobile{
        display: block;
        width: 100%;
        padding: .25rem 1.5rem;
        font-weight: 400;
        white-space: nowrap;
      }
      .main-header .mobile-nav .dropdown-item-newMobile:hover{
        background-color: var(--orange);
      }
      .main-header .mobile-nav a{
        font-size: 17px;
        font-weight: normal;
        line-height: 21px;
        color: #ffffff;
      }
      .main-header .mobile-nav a:hover{
        text-decoration: none;
        color: #1d68a7;
      }

      .main-header .mobile-nav .bloque2{
        width: 65%;
        display: flex;
      }
      .main-header .mobile-nav .bloque2 a{
        width: 50%;
        font-family: 'Raleway', sans-serif;
        font-size: 16px;
        font-weight: 600;
        line-height: 40px;
        color: #ffffff;
        margin: 5px;
      }
      .main-header .mobile-nav .bloque2 .menu-button{
        width: 100%;
        height: 40px;
        background-color: var(--magenta);
        border-radius: 8px;
        text-align: center;
      }
      .main-header .desktop-nav{
        display: none;
      }
      /* END HEADER - MOBILE*/

      @media (min-width: 768px){
        /* HEADER - TABLET*/
        .main-header .mobile-nav .h1-container{
          width: 50%;
          height: 38px;
          display: block;
          text-transform: uppercase;
          font-size: 15px;
          font-weight: normal;
          line-height: 40px;
          letter-spacing: 0.08em;
          color: #ffffff;
          background-color: var(--orange);
          margin: 0;
        }
        .main-header .mobile-nav .h1-container h1{
          font-size: 15px;
          line-height: 40px;
          text-align: center;
        }
        .main-header .mobile-nav .dropdown-newMobile{
          width: 15%;
        }
        .main-header .mobile-nav .bloque2{
          width: 35%;
        }
        /* END HEADER - TABLET*/
      }

      @media (min-width: 992px){
        /* HEADER - desktop */
        .main-header .mobile-nav{
          display: none;
        }
        .main-header .desktop-nav .bloque2.desktop-large{
          display: none;
        }
        .main-header{
          height: 112px;
        }
        .main-header .logo-container{
          margin-left: 15px;
        }
        .main-header .logo-container a img{
          width: 89.14px;
        }
        .main-header .desktop-nav{
          width: calc(100% - 89.14px - 45px);
          margin-left: 15px;
          display: flex;
          align-items: center;
          justify-content: space-between;
        }
        .main-header .desktop-nav .bloque1{
          width: 100%;
          display: flex;
          flex-wrap: wrap;
          justify-content: space-between;
        }
        .main-header .desktop-nav .bloque1 .h1-container{
          background-color: var(--orange);
          width: 561px;
          height: 40px;
          text-align: center;
          margin-bottom: 7px;
        }
        .main-header .desktop-nav .bloque1 .h1-container h1{
          font-size: 25px;
          line-height: 40px;
          text-transform: uppercase;
          font-weight: normal;
          letter-spacing: 0.08em;
          color: #ffffff;
          margin: 0;
        }
        .main-header .desktop-nav .bloque1 .menu-list{
          background-color: var(--orange);
          width: 828px;
          height: 34px;
          display: flex;
          justify-content: space-between;
          margin: 0px;
          padding: 0px 15px;
          align-items: center;
        }
        .main-header .desktop-nav .bloque1 .menu-list li{
          list-style: none;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown{
          position: relative;
          display: inline-block;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown .dropdown-content{
          display: none;
          position: absolute;
          z-index: 900;
          background-color: var(--orange);
          padding: 0px;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown:hover .dropdown-content{
          display: block;
          width: max-content;
        }
        .main-header .desktop-nav .bloque1 .menu-list a{
          font-size: 17px;
          font-weight: normal;
          line-height: 21px;
          color: #ffffff;
        }
        .main-header .desktop-nav .bloque1 .menu-list a:hover{
          text-decoration: none;
          color: #1d68a7;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown:hover .dropdown-content .dropdown-item{
          display: block;
          width: 100%;
          padding: .25rem 1.5rem;
          font-weight: 400;
          color: #212529;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown:hover .dropdown-content .dropdown-item:first-of-type{
          margin-top: 6px;
        }
        .main-header .desktop-nav .bloque1 .menu-list .dropdown:hover .dropdown-content .dropdown-item:hover{
          background-color: var(--orange);
        }

        .main-header .desktop-nav .bloque2{
          width: 22%;
          display: flex;
          justify-content: flex-end;
        }
        .main-header .desktop-nav .bloque2 a{
          width: 50%;
          font-family: 'Raleway', sans-serif;
          font-size: 25px;
          font-weight: 600;
          line-height: 58px;
          color: #ffffff;
          margin: 10px;
        }
        .main-header .desktop-nav .bloque2 .menu-button{
          width: 100%;
          height: 58px;
          background-color: var(--magenta);
          border-radius: 8px;
          text-align: center;
        }
        .main-header .desktop-nav .bloque2 .menu-button:hover{
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
        }
        .main-header .desktop-nav .bloque2.desktop-small {
          width: 30%;
          height: 40px;
          display: flex;
        }
        .main-header .desktop-nav .bloque2.desktop-small a{
          line-height: 40px;
          margin: 0px 10px;
        }
        .main-header .desktop-nav .bloque2.desktop-small .menu-button{
          height: 40px;
        }
        /* END HEADER - DESKTOP*/
      }

      @media (min-width: 1244px){
        /* HEADER - desktop large */
        .main-header .desktop-nav .bloque2.desktop-small{
          display: none;
        }
        .main-header .desktop-nav .bloque2.desktop-large{
          display: flex;
        }
        .main-header .desktop-nav .bloque1{
          width: 75%;
        }
        .main-header.admin-header .desktop-nav .bloque1 .menu-list{
          margin-top: 0px;
        }
        /* END HEADER - desktop large */
      }

      @media (min-width:2048px){
        body{
         background-color: var(--grey);
        }
      }

      @media (pointer: coarse) {
        .dropdown:hover .dropdown-content {
          display: none;
        }
      }
        @yield('style')
    </style>

      @yield('css')

      {{-- <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}"> --}}

      <link rel="stylesheet" media="print" href="{{asset('/css/print.css')}}">

  </head>

  <body>

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
            <div class="menu-button" style="text-transform: uppercase;">donar</div>
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
              <div class="menu-button" style="text-transform: uppercase;">donar</div>
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
            <div class="menu-button" style="text-transform: uppercase;">donar</div>
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

    @yield('scripts')

  </body>

</html>
