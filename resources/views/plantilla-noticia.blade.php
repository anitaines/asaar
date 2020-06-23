@extends("layouts.app")

@section("title")
  @if(isset($noticia))
  {{$noticia->title}} -
  @endif
@endsection

@section("style")
  @if (isset($noticia) && $noticia->imagenNoticia == "si")
    <style>
      .img_container {background-image: url('/storage/noticias/imagenesMain/mobile/{{$noticia->imagen}}');}

      @media (min-width: 768px){
        .img_container {background-image: url('/storage/noticias/imagenesMain/tablet/{{$noticia->imagen}}');}
      }

      @media (min-width: 992px){
        .img_container {background-image: url('/storage/noticias/imagenesMain/desktop/{{$noticia->imagen}}');}
      }
    </style>
  @endif
@endsection

@section('content')

  {{-- PREMISA:
  SI TENGO ID DE NOTICIA, TENGO LA INFO Y ESTOY LEYENDO LA NOTICIA
  SI NO TENGO ID, ESTO ES UNA PLANTILLA "VACIA" PARA USAR EN EL IFRAME DE SUBIR NOTICIA --}}

  <div class="container_contacto container_detalle_noticias">

    {{-- <a href="javascript:history.back()"><h5 class="h1_aspergerCEA h1_congresos"><< Noticias</h5></a> --}}
    <a href="/noticias"><h5 class="h1_aspergerCEA h1_congresos"><< Noticias</h5></a>

    <img class="img-png" style="display: none;" src="/media/logos/logo-canvas.png" alt="logo para Canvas">

    <main class="main_contacto main_detalle_noticias">

      {{-- <h1 class="h1_aspergerCEA h1_congresos">Noticias</h1> --}}
      @if (isset($noticia))
        @php
          $fecha = Carbon\Carbon::parse($noticia->created_at)->locale('es');
        @endphp
        <p class="fecha">Fecha de publicación: {{$fecha->isoFormat('D-MMMM-YYYY')}}</p>
      @else
        @php
          $fecha = Carbon\Carbon::now('America/Argentina/Buenos_Aires')->locale('es');
        @endphp
        <p class="fecha">Fecha de publicación: {{$fecha->isoFormat('D-MMMM-YYYY')}}</p>
      @endif

      @if (isset($noticia))
        <h3 class="h3_aspergerCEA">{{$noticia->title}}</h3>
      @else
      <h3 class="h3_aspergerCEA" style="display:none;"></h3>
      @endif

      @if (isset($noticia))
        <h4>{{$noticia->subtitle}}</h4>
      @else
        <h4 style="display:none;"></h4>
      @endif

      @if (isset($noticia) && $noticia->imagenNoticia == "si")
      <div class="wrap_img">
        <div class="img_container" style="filter:{{$noticia->filtroImagen}};"></div>

        <div class="info_img_container">
          @if ($noticia->logoAsaar == "si" && $noticia->calendar == "si")
          <div class="box1" style="justify-content: space-between;">
          @elseif ($noticia->logoAsaar == null && $noticia->calendar == "si")
          <div class="box1" style="justify-content: flex-end;">
          @else
          <div class="box1">
          @endif

            @if ($noticia->logoAsaar == "si")
              <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
            @else
              <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina" style="display:none;">
            @endif

            @if ($noticia->calendar == "si")
              <div class="calendar">
                <div class="calendar_mes">
                  <p>{{$noticia->mes}}</p>
                </div>
                <div class="calendar_dia">
                  <p>{{$noticia->dia}}</p>
                  <p>{{$noticia->numero}}</p>
                </div>
              </div>
            @else
              <div class="calendar" style="display:none;">
                <div class="calendar_mes">
                  <p></p>
                </div>
                <div class="calendar_dia">
                  <p></p>
                  <p></p>
                </div>
              </div>
            @endif
          </div>

          @if ($noticia->tituloImagen)
            @if($noticia->recuadro == "si")
              <div class="box2" style="background-color: {{$noticia->colorFondoTitular}}; border-color: {{$noticia->colorTipoTitular}};">
            @else
              <div class="box2" style="background-color: {{$noticia->colorFondoTitular}}; border-color: transparent;">
            @endif
                <p style="color: {{$noticia->colorTipoTitular}};">
                  @php
                    $lineasTituloImagen = explode("\n",$noticia->tituloImagen);
                  @endphp
                  @for ($i=0; $i < count($lineasTituloImagen); $i++)
                    {{$lineasTituloImagen[$i]}} <br>
                  @endfor
                </p>
              </div>
          @else
            <div class="box2" style="display:none; background-color: transparent;">
              <p style="color: #AB2097;"></p>
            </div>
          @endif

          <div class="box3">
            @if ($noticia->resumenImagen)
              <div class="" style="background-color: {{$noticia->colorFondoResumen}};">
                <p style="color: {{$noticia->colorTipoResumen}};">
                  @php
                    $lineasResumenImagen = explode("\n",$noticia->resumenImagen);
                  @endphp
                  @for ($i=0; $i < count($lineasResumenImagen); $i++)
                    {{$lineasResumenImagen[$i]}} <br>
                  @endfor
                </p>
              </div>
            @else
              <div class="" style="display:none; background-color: rgba(69, 69, 69, 0.9);">
                <p style="color: rgb(255, 140, 0);">Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.</p>
              </div>
            @endif

            @if ($noticia->subtituloImagen || $noticia->detalleImagen)
              <div class="" style="background-color: {{$noticia->colorFondoSubtitular}};">

              @if ($noticia->subtituloImagen)
                <p style="color: {{$noticia->colorTipoSubtitular}};">
                  @php
                    $lineasSubtituloImagen = explode("\n",$noticia->subtituloImagen);
                  @endphp
                  @for ($i=0; $i < count($lineasSubtituloImagen); $i++)
                    {{$lineasSubtituloImagen[$i]}} <br>
                  @endfor
                </p>
              @else
                <p style="display:none; color: #ffffff;">Para padres de niños, adolescentes y adultos</p>
              @endif
              @if ($noticia->detalleImagen)
                <p style="color: {{$noticia->colorTipoSubtitular}};">
                  @php
                    $lineasDetalleImagen = explode("\n",$noticia->detalleImagen);
                  @endphp
                  @for ($i=0; $i < count($lineasDetalleImagen); $i++)
                    {{$lineasDetalleImagen[$i]}} <br>
                  @endfor
                </p>
              @else
                <p style="display:none; color: #ffffff;">LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
                Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p>
              @endif
            </div>

            @else
            <div class="" style="display:none; background-color: #AB2097;">
              <p style="display:none; color: #ffffff;">Para padres de niños, adolescentes y adultos</p>
              <p style="display:none; color: #ffffff;">LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
              Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p>
            </div>
            @endif
          </div>

          @if ($noticia->rectificacionImagen)
            <div class="box4">
              <p>
                @php
                  $lineasRectificacionImagen = explode("\n",$noticia->rectificacionImagen);
                @endphp
                @for ($i=0; $i < count($lineasRectificacionImagen); $i++)
                  {{$lineasRectificacionImagen[$i]}} <br>
                @endfor
              </p>
            </div>
          @else
            <div class="box4" style="display:none;">
              <p></p>
            </div>
          @endif

      {{-- SETEOS imagen PARA PLANTILLA: --}}
      @else
      <div class="wrap_img" style="display: none;">
        <div class="img_container" style="background-image: url('/storage/noticias/imagenesMain/desktop/Ali.jpg');"></div>

        <div class="info_img_container">
          <div class="box1">
            <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina" style="display:none;">
            <div class="calendar" style="display:none;">
              <div class="calendar_mes">
                <p></p>
              </div>
              <div class="calendar_dia">
                <p></p>
                <p></p>
              </div>
            </div>
          </div>

          <div class="box2" style="display:none; background-color: transparent;">
            <p style="color: #AB2097;">TALLER DE PADRES</p>
          </div>
          <div class="box3">
            <div class="" style="display:none; background-color: rgba(69, 69, 69, 0.9);">
              <p style="color: rgb(255, 140, 0);">Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.</p>
            </div>
            <div class="" style="display:none; background-color: #AB2097;">
              <p style="display:none; color: #ffffff;">Para padres de niños, adolescentes y adultos</p>
              <p style="display:none; color: #ffffff;">LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
              Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p>
            </div>
          </div>
          <div class="box4" style="display:none;">
            <p></p>
          </div>
      @endif

        </div>
      </div>

      @if (isset($noticia) && $noticia->content)
        @php
          $parrafos = explode("\n",$noticia->content);
        @endphp
        @for ($i=0; $i < count($parrafos); $i++)
          @if (strlen($parrafos[$i]) > 1)
            <p class="parrafo">{{$parrafos[$i]}}</p>
          @else
            <br>
          @endif
        @endfor
        <p class="parrafoNuevo" style="display:none;"></p>
      @else
        <p class="parrafoNuevo" style="display:none;"></p>
      @endif

      {{-- <div class="imagenesAdicionales">
        @if (isset($noticia) && $noticia->filesPlus1)
        <div class="filesPlus1">
          <img src="/storage/noticias/imagenesPlus/{{$noticia->filesPlus1}}" alt="imagen adicional noticia"> --}}
          {{-- <img
          srcset="
          /storage/noticias/imagenesPlus/desktop/{{$noticia->filesPlus1}} 1920w,
          /storage/noticias/imagenesPlus/tablet/{{$noticia->filesPlus1}} 991w,
          /storage/noticias/imagenesPlus/mobile/{{$noticia->filesPlus1}} 767w
          "
          src="/storage/noticias/imagenesPlus/desktop/{{$noticia->filesPlus1}}"
          alt="imagen noticia"> --}}
        {{-- </div>
        @else
          <div class="filesPlus1"></div>
        @endif --}}

        {{-- @if (isset($noticia) && $noticia->filesPlus2)
        <div class="filesPlus2">
          <img src="/storage/noticias/imagenesPlus/{{$noticia->filesPlus2}}" alt="imagen adicional noticia">
        </div>
        @else
          <div class="filesPlus2"></div>
        @endif

        @if (isset($noticia) && $noticia->filesPlus3)
        <div class="filesPlus3">
          <img src="/storage/noticias/imagenesPlus/{{$noticia->filesPlus3}}" alt="imagen adicional noticia">
        </div>
        @else
          <div class="filesPlus3"></div>
        @endif --}}
      {{-- </div> --}}

      <div class="share">

        <p>Compartir vía:</p>

        <div class="share_options">

          {{-- <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.pruebas-asaar.epizy.com%2F&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> --}}
          @if (isset($noticia))
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.asperger.org.ar%2F{{$noticia->id}}%2F{{$noticia->slug}}&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          @else
            <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.asperger.org.ar&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
          @endif

          <a class="twitter-share-button"
          href="https://twitter.com/intent/tweet" data-size="large">
          Tweet</a>

          @if (isset($noticia))
            <a href="mailto:?subject={{$noticia->title}}&body=Novedades%3A%20http%3A%2F%2Fasperger.org.ar%2Fnoticia%2F{{$noticia->id}}%2F{{$noticia->slug}}" target="_blank" rel="noopener noreferrer">
          @else
            <a href="" target="_blank" rel="noopener noreferrer">
          @endif
            <div class="share_email">
              <img src="/media/noticias/envelope-solid.svg" alt="ícono e-mail">
              <p>E-mail</p>
            </div>
          </a>

        </div>

      </div>

      <a href="/noticias"><h5 class="h1_aspergerCEA h1_congresos"><< Noticias</h5></a>

    </main>

    <footer>
      <div class="container_logo_footer">
        <div class="logo_footer">
          <img class="img_footer_logo"src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
          <p class="p_footer"><b>Asociación Asperger Argentina</b></p>
          <p class="p_footer">Sitio oficial</p>
          <p class="p_footer">Copyright 2003-2020</p>
          </div>
        <div class="vl_footer"> </div>
        </div>
      <div class="contact_footer">
        <p class="p_contact_footer"><b>TELÉFONO:</b> (011) 4931-2712</p>
        <p class="p_contact_footer">(De lunes a viernes de 14:00 a 18:00 hs.)</p>
        <p class="p_contact_footer"><b>MAIL:</b> <a href="mailto:info@asperger.org.ar">info@asperger.org.ar</a></p>
        <div class="vh_footer"></div>
        <div class="socialmedia_footer">

          <a class="a_socialmedia_footer" href="https://www.facebook.com/AsociacionAspergerArgentina/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/facebook.svg" alt="Logo Facebook"></a>

          <a class="a_socialmedia_footer" href="https://twitter.com/AspergerArg" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/twitter.svg" alt="Logo Twitter"></a>

          <a class="a_socialmedia_footer" href="https://www.youtube.com/channel/UCOl2EpPpSQxKUZP2UmpR_jQ" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/youtube.svg" alt="Logo YouTube"></a>

          <a class="a_socialmedia_footer" href="https://www.instagram.com/asociacionasperger/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/instagram.svg" alt="Logo Instagram"></a>

          <a class="a_socialmedia_footer" href="https://www.linkedin.com/company/asociaci%C3%B3n-asperger-argentina/about/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/linkedin.svg" alt="Logo Linkedin"></a>
          </div>
        </div>

      <!-- Begin Mailchimp Signup Form -->
        <div id="mc_embed_signup" class="newsletter_footer">
          <p class="p_newsletter_footer">Recibir novedades por mail:</p>
          <form action="https://gmail.us19.list-manage.com/subscribe/post?u=5ef693025dfac788bcbc56790&amp;id=3ad72c438f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate form_newsletter_footer" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
              <div class="mc-field-group form_item">
                 <label class="label_newsletter_footer" for="mce-FNAME">NOMBRE</label>
                 <input type="text" value="" name="FNAME" class="required input_newsletter_footer" id="mce-FNAME">
               </div>
              <div class="mc-field-group form_item">
                <label class="label_newsletter_footer" for="mce-LNAME">APELLIDO</label>
                <input type="text" value="" name="LNAME" class="required input_newsletter_footer" id="mce-LNAME">
              </div>
              <div class="mc-field-group form_item">
                <label class="label_newsletter_footer" for="mce-EMAIL">E-MAIL</label>
                <input type="email" value="" name="EMAIL" class="required email input_newsletter_footer" id="mce-EMAIL">
              </div>
              <div id="mce-responses" class="clear">
                <div class="response" id="mce-error-response" style="display:none"></div>
                <div class="response" id="mce-success-response" style="display:none"></div>
              </div>
              <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
              <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5ef693025dfac788bcbc56790_3ad72c438f" tabindex="-1" value=""></div>
              <div class="clear"><input class="buton_newsletter_footer" type="submit" value="Suscribirse a nuestras novedades" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
            </div>
            </form>
        </div>
        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email'; /*
         * Translated default messages for the $ validation plugin.
         * Locale: ES
         */
        $.extend($.validator.messages, {
          required: "Este campo es obligatorio.",
          remote: "Por favor, rellena este campo.",
          email: "Por favor, escribe una dirección de correo válida",
          url: "Por favor, escribe una URL válida.",
          date: "Por favor, escribe una fecha válida.",
          dateISO: "Por favor, escribe una fecha (ISO) válida.",
          number: "Por favor, escribe un número entero válido.",
          digits: "Por favor, escribe sólo dígitos.",
          creditcard: "Por favor, escribe un número de tarjeta válido.",
          equalTo: "Por favor, escribe el mismo valor de nuevo.",
          accept: "Por favor, escribe un valor con una extensión aceptada.",
          maxlength: $.validator.format("Por favor, no escribas más de {0} caracteres."),
          minlength: $.validator.format("Por favor, no escribas menos de {0} caracteres."),
          rangelength: $.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
          range: $.validator.format("Por favor, escribe un valor entre {0} y {1}."),
          max: $.validator.format("Por favor, escribe un valor menor o igual a {0}."),
          min: $.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
        });}(jQuery));var $mcj = jQuery.noConflict(true);</script>
      <!--End mc_embed_signup-->

      </footer>

  </div>

  @if (isset($noticia) && $noticia->imagenNoticia == "si")
    {{-- <script src="{{ asset('js/layoutNoticia.js') }}"></script> --}}
    <script>
      let infoImgContainer = document.querySelector(".info_img_container");
      let logoAsaar = document.querySelector(".info_img_container .box1 img");
      let calendario = document.querySelector(".info_img_container .box1 .calendar");
      if (logoAsaar.style.display == "none" && calendario.style.display == "none"){
        infoImgContainer.style.alignContent="center";
      }
    </script>
  @endif

  @if (isset($noticia) && $noticia->content)
    <script>

    var parrafos = document.querySelectorAll(".parrafo");

    for (var i = 0; i < parrafos.length; i++) {
      setParrafoAccesible(parrafos[i]);
    }

    function setParrafoAccesible(p) {
      // Capturar el contenido del elemento p:
      var texto = p.innerHTML;
      // console.log("texto original: " + texto);

      // Transformar el contenido en un array de palabras para poder filtrarlo:
      var arrayPalabras = texto.trim().split(" ");

      // La variable va a guardar todas las palabras que contengan @:
      var aMail = arrayPalabras.filter(filtrarMail);
      // console.log(aMail);

      // La variable va a guardar todas las palabras que contengan un patrón de url:
      var aWeb = arrayPalabras.filter(filtrarWeb);
      // console.log("arrayPalabras: " + arrayPalabras);
      // console.log("aWeb detectado: " + aWeb);

      // Reemplzar en el texto, cada una de las palabras que contienen @, por el elemento a correspondiente:
      for (var i = 0; i < aMail.length; i++) {
        texto = texto.replace(aMail[i], ' <a href="mailto:' + aMail[i] + '">' + aMail[i] + '</a>' );
      }

      // Reemplzar en el texto, cada una de las palabras que contienen url, por el elemento a correspondiente:
      for (var i = 0; i < aWeb.length; i++) {
        if (aWeb[i].includes("http://") || aWeb[i].includes("https://")){
          texto = texto.replace(aWeb[i], ' <a href="' + aWeb[i] + '" target="_blank" rel="noreferrer">' + aWeb[i] + '</a> ');
        } else {
          texto = texto.replace(aWeb[i], ' <a href="http://' + aWeb[i] + '" target="_blank" rel="noreferrer">' + aWeb[i] + '</a> ');
        }
      }
      // console.log("texto nuevo gerenerado: " + texto);
      p.innerHTML = texto;

    }

    function filtrarMail(value){
      return value.includes("@");
    }

    function filtrarWeb(value){
      var regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gi;
      return regex.test(value);
    }


    </script>
  @endif

  <script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
  }(document, "script", "twitter-wjs"));
  </script>

  @endsection
