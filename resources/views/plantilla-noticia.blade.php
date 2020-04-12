@extends("layouts.app")

@section("title")
  Plantilla noticia -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <div class="container_contacto container_detalle_noticias">

    <main class="main_contacto main_detalle_noticias">

      <h1 class="h1_aspergerCEA h1_congresos">Noticias</h1>
      <p>Fecha de publicación: {{Carbon\Carbon::now('America/Argentina/Buenos_Aires')->format('d-F-Y')}}</p>


      <h3 class="h3_aspergerCEA" style="display:none;">Taller de Padres para Padres</h3>
      <h4 style="display:none;">Sábado 14 de Marzo de 16:30 a 18:30 hs.</h4>
      {{-- <div class="img_container" style="display:none;"> --}}
        <div class="img_container">
        <div class="info_img_container">
          <div class="box1">
            {{-- <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina" style="display:none;"> --}}
            <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
            {{-- <div class="calendar" style="display:none;"> --}}
              <div class="calendar">
              <div class="calendar_mes">
                <p>SEPTIEMBRE</p>
              </div>
              <div class="calendar_dia">
                <p>DOMINGO</p>
                <p>14</p>
              </div>
            </div>
          </div>
          {{-- <div class="box2" style="display:none;"> --}}
            <div class="box2">
            <p>TALLER DE PADRES</p>
          </div>
          <div class="box3">
            {{-- <div class="" style="display:none;"> --}}
              <div class="">
              <p>Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.</p>
            </div>
            <div class="">
              {{-- <p style="display:none;">Para padres de niños, adolescentes y adultos</p> --}}
              <p>Para padres de niños, adolescentes y adultos</p>
              {{-- <p style="display:none;">LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
              Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p> --}}
              <p>LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
              Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p>
            </div>
          </div>

          {{-- <div class="box3">
            <p>www.asperger.org.ar</p>
          </div> --}}

        </div>

      </div>

      <p class="parrafo" style="display:none;">Inscribirse completando el formulario del siguiente enlace:<br>
      <a href="https://goo.gl/forms/5UssYYdEHoQJ8b262"  target="_blank" rel="noreferrer">https://goo.gl/forms/5UssYYdEHoQJ8b262</a><br>
      LEOPOLDO MARECHAL 1160 (a media cuadra de Ángel Gallardo), CABA. <br>
      Plano para llegar: <a href="https://goo.gl/maps/EWVVjXMCrYn"  target="_blank" rel="noreferrer">https://goo.gl/maps/EWVVjXMCrYn</a><br>
      Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.<br>
      También invitamos a sus hijos: niños, adolescentes y jóvenes adultos, de 13 a 30 años, a participar de nuestros Talleres Recreativos, enviando un mail a grupos@asperger.org.ar para combinar su participación y que puedan compartir un encuentro gratuito.<br>
      Informes: <br>
      e-mail: <a href="mailto:info@asperger.org.ar">info@asperger.org.ar</a> <br>
      Tel.: (011) 4931-2712 de Lunes a Viernes de 14 a 18 hs. <br>
      Actividad con entrada libre y gratuita. Capacidad limitada.<br>
      La Asociación se financia únicamente con las cuotas de sus asociados y las actividades que realiza, por lo que solicitamos, un bono contribución de $ 100.- a fin de colaborar con nuestra institución.</p>

      <div class="imagenesAdicionales">
        <div class="filesPlus1"></div>
        <div class="filesPlus2"></div>
        <div class="filesPlus3"></div>
      </div>

      <div class="share">

        <p>Compartir vía:</p>

        <div class="share_options">

          <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fwww.pruebas-asaar.epizy.com%2F&layout=button&size=large&width=77&height=28&appId" width="77" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>

          <a class="twitter-share-button"
          href="https://twitter.com/intent/tweet" data-size="large">
          Tweet</a>

          <a href="mailto:?subject=Taller%20de%20padres%20para%20padres%20%E2%80%93%20Marzo%202020%20%E2%80%93%20Suspendido%20por%20Precauci%C3%B3n&amp;body=Novedades:%20http%3A%2F%2Fasperger.org.ar%2Ftaller-padres-padres-marzo-2020%2F" target="_blank" rel="noopener noreferrer">
            <div class="share_email">
              <img src="/media/noticias/envelope-solid.svg" alt="ícono e-mail">
              <p>E-mail</p>
            </div>
          </a>

        </div>

      </div>

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
      {{-- <div class="newsletter_footer">
        <p class="p_newsletter_footer">Recibir novedades por mail:</p>
        <form class="form_newsletter_footer" action="/" method="post">
          @csrf
          <input type="hidden" name="_method" value="PUT">
          <div class="form_item">
            <label class="label_newsletter_footer" for="nombre">NOMBRE</label>
            <input class="input_newsletter_footer" type="text" id="nombre" name="name" value="">
            </div>
          <div class="form_item">
            <label class="label_newsletter_footer"  for="apellido">APELLIDO</label>
            <input class="input_newsletter_footer" type="text" id="apellido" name="surname" value="">
            </div>
          <div class="form_item">
            <label class="label_newsletter_footer" for="email">E-MAIL</label>
            <input class="input_newsletter_footer" type="text" id="email" name="email" value="">
            </div>
          <button class="buton_newsletter_footer"  type="submit" disabled>
            <p>Suscribirse a nuestras novedades</p>
            <p>Procesando</p>
          </button>
          </form>
      </div> --}}

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
  }(document, "script", "twitter-wjs"));</script>

  @endsection
