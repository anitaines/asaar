@extends("layouts.app")

@section("title")

  @endsection

  @section("style")
    <style>
      @for ($i=0; $i < count($noticiasCarousel); $i++)
        .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/mobile/{{$noticiasCarousel[$i]->carousel}}');}
      @endfor


      @media (min-width: 768px){
        @for ($i=0; $i < count($noticiasCarousel); $i++)
          .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/tablet/{{$noticiasCarousel[$i]->carousel}}');}
        @endfor
      }

      @media (min-width: 992px){
        @for ($i=0; $i < count($noticiasCarousel); $i++)
          .noticiaNro{{$i}} {background-image: url('/media/noticias/carousel/desktop/{{$noticiasCarousel[$i]->carousel}}');}
        @endfor
      }
    </style>
    @endsection

@section('content')
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v5.0"></script>

      <div class="slideshow-container">
          <div class="slideshow-inner">

            <div class="mySlides img_intro transition-news">
              <div class="div_intro">
                <p class="p_intro">Asociación</p>
                <p class="p_intro">Asperger</p>
                <p class="p_intro">Argentina</p>
              </div>
            </div>

            @for ($i=0; $i < count($noticiasCarousel); $i++)
              @php
                $randColor = $colores[rand(0,3)];
              @endphp
              <div class="mySlides img_noticia noticiaNro{{$i}} transition-news">
                <a href="/noticias/{{$noticiasCarousel[$i]->id}}/{{$noticiasCarousel[$i]->slug}}">
                  <div class="div_noticia" style="background-color: {{$randColor}};">
                    <p class="p_noticia">{{$noticiasCarousel[$i]->title}}</p>
                    <p class="p_noticia">{{$noticiasCarousel[$i]->subtitle}}</p>
                    <div class="mas_info">
                      <p class="p_mas_info" style="color: {{$randColor}};">Más información</p>
                    </div>
                  </div>
                </a>
              </div>
            @endfor

          </div>

          @if (count($noticiasCarousel) > 0)
            <a class="prev" onclick='plusSlides(-1)'>&#10094;</a>
            <a class="next" onclick='plusSlides(1)'>&#10095;</a>

            <div class="dotContainer" style='text-align: center;'>
                @for ($i=0; $i <= count($noticiasCarousel); $i++)
                  <span class="dot" onclick='currentSlide({{$i +1 }})'></span>
                @endfor
            </div>
          @endif

      <a class="downScroll" href="#sitio">&#10095;</a>

      <div id="sitio" class="down"></div>

      <div class="carousel_colors">
        <div class="green"></div>
        <div class="orange"></div>
        <div class="blue"></div>
      </div>

    </div>

  <div class="info_container">
    <div class="asoc_container">
      <p class="p_asoc_container">La <b>Asociación Asperger Argentina</b> (AsAAr) es una <b>organización sin fines de lucro</b> formada por un <b>grupo de padres</b> que, al haber tomado conocimiento de la situación en la que estaban inmersos sus hijos, decidieron organizarse en pos del bienestar de las personas con el síndrome.</p>

      <a class="a_asoc_container" href="/quienes-somos"><div class="div_a_asoc_container">Leer más sobre la Asociación</div></a>

      <a class="a_asoc_container" href="/actividades"><div class="div_a_asoc_container">Actividades</div></a>
    </div>

    <div class="asperger_container">
      <p class="p_asperger_container">El <b>Síndrome de Asperger</b> es una condición del neurodesarrollo, una variación del desarrollo que acompaña a las personas durante toda la vida. Influye en la forma en que éstas dan sentido al mundo, procesan la información y se relacionan con los otros.</p>

      <a class="a_asperger_container" href="/asperger-cea"><div class="div_a_asperger_container">Información sobre Asperger / CEA</div></a>

      <a class="a_asperger_container" href="/asperger-cea#diagnosticos"><div class="div_a_asperger_container">Criterios Diagnósticos</div></a>

      <a class="a_asperger_container" href="/asperger-cea#intervenciones"><div class="div_a_asperger_container">Intervenciones / Tratamientos</div></a>

    </div>
  </div>

  <div class="separador">
    <img class="img_separador"
    srcset="
    /media/home/2580120crop_desktop3x.jpg 1920w,
    /media/home/2580120crop_tablet2x.jpg 991w,
    /media/home/2580120crop_mobile1x.jpg 767w
    "
    src="/media/2580120crop_desktop3x.jpg"
    alt="Muchas manos levantadas">


    <p class="p_separador_invisible">La AsAAr acompaña a las familias brindando asesoramiento, información y contención; y compartiendo experiencias en un plano de igualdad entre todas las familias unidas por una misma circunstancia de vida.</p>
    <p class="p_separador">La AsAAr acompaña a las familias brindando asesoramiento, información y contención; y compartiendo experiencias en un plano de igualdad entre todas las familias unidas por una misma circunstancia de vida.</p>
  </div>

  <div class="closing">
    <div class="donate">
      <p class="p_donate"><b>Estimado amigo y lector:</b></p>
      <p class="p_donate">Hoy te pedimos que <b>ayudes a la Asociación Asperger Argentina.</b></p>
      <p class="p_donate"> Nos sostenemos gracias a las donaciones de poco menos de $100.- y para proteger nuestra independencia, nunca verás avisos publicitarios.</p>
      <p class="p_donate">Solo unos pocos de nuestros lectores donan.</p>
      <p class="p_donate">¡Ahora es el momento de pedirte algo!</p>
      <p class="p_donate"><b>Si todos los que están leyendo esto, ahora donaran $80.-, nuestra campaña de recaudación de fondos finalizaría en una hora. Tan simple como eso: lo único que necesitamos es el valor de un café.</b></p>
      <p class="p_donate">Somos una Asociación sin fines de lucro con necesidad de crecer para ofrecerles a ustedes un lugar de pertenencia: <b>nuestra SEDE.</b></p>
      <p class="p_donate">Si la Asociación Asperger Argentina te resulta útil, por favor tomate un minuto para ayudarnos a seguir creciendo.</p>
      <p class="p_donate"><b>¡Muchas gracias!</b></p>
      <div class="div_donate">
        <a class="a_donate" href="/donar">DONAR</a>
      </div>
    </div>
    <div class="facebook">
      <div class="fb-desktop">
        <div class="fb-page" data-href="https://www.facebook.com/AsociacionAspergerArgentina/" data-tabs="timeline" data-width="483" data-height="500" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/AsociacionAspergerArgentina/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AsociacionAspergerArgentina/">Asociacion Asperger Argentina</a></blockquote></div>
      </div>
    </div>
  </div>

  <footer>
    <div class="facebook-footer">
      <div class="fb-mobile">
        <div class="fb-page" data-href="https://www.facebook.com/AsociacionAspergerArgentina/" data-tabs="timeline" data-width="483" data-height="370" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/AsociacionAspergerArgentina/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AsociacionAspergerArgentina/">Asociacion Asperger Argentina</a></blockquote></div>
      </div>
    </div>
    <div class="container_logo_footer">
      <div class="logo_footer">
        <img class="img_footer_logo"src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
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

    <script src="{{ asset('js/index.js') }}"></script>

  @endsection
