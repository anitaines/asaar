@extends("layouts.app")

@section("meta-description")
  "Canales de contacto de la Asociación Asperger Argentina"
  @endsection

@section("title")
  Contacto -
  @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}">
@endsection

@section('content')
  <div class="container_contacto">

    <main class="main_contacto">

        <h1 class="h1_aspergerCEA h1_congresos">Contacto</h1>

        <p class="p_aspergerCEA">Si usted desea contactarnos con el propósito de realizar alguna consulta, enviarnos información relevante, colaborar con nosotros, informarse sobre nuestras charlas y/o talleres o suministrarnos los datos de su asociación o centro, lo invitamos a comunicarse con nosotros:</p>

        <h3 class="h3_aspergerCEA">Teléfono</h3>
        <p class="p_aspergerCEA"><b>(011) 4931-2712</b></p>
        <p class="p_aspergerCEA">(De Lunes a Viernes de 14.00 a 18:00)</p>

        <h3 class="h3_aspergerCEA">E-mail</h3>
        <a href="mailto:info@asperger.org.ar">info@asperger.org.ar</a>

        <h3 class="h3_aspergerCEA">Formulario de contacto</h3>
        @if (session('success'))
          <div class="alert-success container_form">
            <p class="p_aspergerCEA">{{ session('success') }}</p>
            </div>
          @else
            <div class="container_form">
              <form class="form_newsletter_footer" action="/contacto" method="post">
                @csrf

                @if ($errors->all())
                  <div class="form_item">
                    <p class="error-message">Algunos campos presentan errores</p>
                    <p class="error-message">Revisar los campos marcados con ❌</p>
                    </div>
                  @endif

                <div class="form_item">
                  <label class="label_newsletter_footer" for="name" style="text-transform: uppercase;">
                    @if ($errors->get('name'))
                      <span class="error-message-cross">❌</span> Nombre
                      @elseif ($errors->all() != null && !$errors->get('name'))
                        <span class="error-message-checked">✓</span> Nombre
                        @else
                        Nombre
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="name" name="name" value="{{ old('name') }}">
                  @error('name') <p class="error-message">{{ $message }}</p> @enderror
                  </div>
                <div class="form_item">
                  <label class="label_newsletter_footer" for="email" style="text-transform: uppercase;">
                    @if ($errors->get('email'))
                      <span class="error-message-cross">❌</span> E-mail
                    @elseif ($errors->all() != null && !$errors->get('email'))
                        <span class="error-message-checked">✓</span> E-mail
                        @else
                        E-mail
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="email" name="email" value="{{ old('email') }}">
                  @error('email') <p class="error-message">{{ $message }}</p> @enderror
                  </div>
                <div class="form_item">
                  <label class="label_newsletter_footer"  for="telephone" style="text-transform: uppercase;">
                    @if ($errors->get('telephone'))
                      <span class="error-message-cross">❌</span> Teléfono
                    @elseif ($errors->all() != null && !$errors->get('telephone'))
                        <span class="error-message-checked">✓</span> Teléfono
                        @else
                        Teléfono
                    @endif
                    </label>
                  <input class="input_newsletter_footer" type="text" id="telephone" name="telephone" value="{{ old('telephone') }}">
                  @error('telephone') <p class="error-message">{{ $message }}</p> @enderror
                  </div>
                <div class="form_item">
                  <label class="label_newsletter_footer"  for="message" style="text-transform: uppercase;">
                    @if ($errors->get('message'))
                      <span class="error-message-cross">❌</span> Mensaje
                    @elseif ($errors->all() != null && !$errors->get('message'))
                        <span class="error-message-checked">✓</span> Mensaje
                        @else
                        Mensaje
                    @endif
                  </label>
                  <textarea  class="input_newsletter_footer" id="message" name="message" rows="5">{{ old('message') }}</textarea>
                  @error('message') <p class="error-message">{{ $message }}</p> @enderror
                  </div>
                {{-- {{dd($errors->all())}} --}}
                <button class="buton_newsletter_footer"  type="submit">
                  <p>Enviar mensaje</p>
                  <p>Procesando</p>
                </button>
                </form>
              </div>
          @endif

        <div class="socialmedia_footer">
          <a class="a_socialmedia_footer" href="https://www.facebook.com/AsociacionAspergerArgentina/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/facebook.svg" alt="Logo Facebook"></a>

          <a class="a_socialmedia_footer" href="https://twitter.com/AspergerArg" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/twitter.svg" alt="Logo Twitter"></a>

          <a class="a_socialmedia_footer" href="https://www.youtube.com/channel/UCOl2EpPpSQxKUZP2UmpR_jQ" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/youtube.svg" alt="Logo YouTube"></a>

          <a class="a_socialmedia_footer" href="https://www.instagram.com/asociacionasperger/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/instagram.svg" alt="Logo Instagram"></a>

          <a class="a_socialmedia_footer" href="https://www.linkedin.com/company/asociaci%C3%B3n-asperger-argentina/about/" target="_blank" rel="noreferrer"><img class="img_socialmedia_footer" src="/media/socialMedia/linkedin.svg" alt="Logo Linkedin"></a>
          </div>

      </main>

    <div class="carousel_colors">
      <div class="green"></div>
      <div class="orange"></div>
      <div class="blue"></div>
    </div>

  </div>

  @endsection
