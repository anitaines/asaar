@extends("layouts.app")

@section("meta-description")
  "Suscribirse a nuestras novedades"
  @endsection

@section("title")
  Newsletter -
  @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}">
@endsection

@section('content')
  <div class="container_contacto container_newsletter">

    {{-- <h1 class="h1_aspergerCEA">Newsletter</h1> --}}

    <main class="main_donar">

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

      <!--End mc_embed_signup-->

    </main>

    <div class="carousel_colors">
      <div class="green"></div>
      <div class="orange"></div>
      <div class="blue"></div>
    </div>

  </div>
  @endsection


  @section("scripts")

    {{-- Mailchimp --}}
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

  @endsection
