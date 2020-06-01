@extends("layouts.appAdmin")

@section("title")
  Modificar noticia -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')
{{-- @dd($errors) --}}
  <main class="admin generar modificar">

    <div class="menuMobileTablet">
      <a class="menuInformacion"><p>Información</p></a>
      <a class="menuNoticia"><p>Noticia</p></a>
      <a class="menuImagen"><p>Imagen</p></a>
    </div>
{{-- @dd($noticia) --}}
    <div class="input">

      <h4>Modificar noticia:</h4>

      <form class="" action="/modificar-noticia/{{$noticia->id}}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf

        @if ($errors->all())
          <p class="" style="color: red; width: 95%; text-align: center;"><b>Hubo un error procesando la información. Por favor volver a intentar y si el problema persiste contactar al desarrollador del sitio. Muchas gracias.</b></p>
        @endif

        <div class="adminFormItem">
          <label for="title">1. Titular:</label>
          <input id="title" type="text" name="title" value="{{$noticia->title}}" autofocus>
          <p class="alert title" style="color: red; width: 95%; margin: auto; display: none;"> </p>
        </div>

        <div class="adminFormItem">
          <label for="subtitle">2. Bajada titular:</label>
          <input id="subtitle" type="text" name="subtitle" value="{{$noticia->subtitle}}">
          <p class="alert subtitle" style="color: red; width: 95%; margin: auto; display: none;"> </p>
        </div>

        <div class="adminFormItem form_item form_item_checkbox">
          <label class="imagenNoticia checkbox-label">3. Incluir una imagen principal:
            @if ($noticia->imagenNoticia == "si")
              <input type="checkbox" name="imagenNoticia" value="si" checked>
            @else
              <input type="checkbox" name="imagenNoticia" value="si">
            @endif
            <span class="checkbox-custom">✓</span>
          </label>

          @if ($noticia->imagenNoticia == "si")
          <div class="imagenesWrap">
          @else
          <div class="imagenesWrap" style="display: none;">
          @endif
          <div class="imagenes">

            <div class="imagenesOpcionCarga">
              <p>Elegir imagen guardada</p>
              <p>▼</p>
            </div>

            @foreach ($imagenes as $key => $value)

              <label class="imagenLabel">
                @if ($noticia->imagenNoticia == "si")
                  @if ($noticia->imagen == $value->name)
                    <input type="radio" name="imagen" value="{{$value->name}}" checked>
                  @else
                    <input type="radio" name="imagen" value="{{$value->name}}">
                  @endif
                @else
                  @if ($loop->last)
                    <input type="radio" name="imagen" value="{{$value->name}}" checked>
                  @else
                    <input type="radio" name="imagen" value="{{$value->name}}">
                  @endif
                @endif
                <div style="background-image: url('/storage/noticias/imagenesMain/{{$value->name}}');" class=""></div>
              </label>

            @endforeach

          </div>

          <div class="imagenesOpcionCargaNueva">
            <p>Cargar nueva imagen ▼</p>
            <input type="file" id="files" name="filesMain">
            <p class="alert filesMain"></p>
            <div id="uploadedImage"></div>
          </div>

          <div class="filtroImagen">
            <p>Filtro imagen:</p>
            <label class=""> Ninguno
              @if ($noticia->filtroImagen == "none")
                <input type="radio" name="filtroImagen" value="none" checked>
              @else
                <input type="radio" name="filtroImagen" value="none">
              @endif
              <div>✓</div>
            </label>
            <label class=""> Blanco y negro
              @if ($noticia->filtroImagen == "grayscale(100%)")
                <input type="radio" name="filtroImagen" value="grayscale(100%)" checked>
              @else
                <input type="radio" name="filtroImagen" value="grayscale(100%)">
              @endif
              <div>✓</div>
            </label>
            <label class=""> Fuera de foco
              @if ($noticia->filtroImagen == "blur(5px)")
                <input type="radio" name="filtroImagen" value="blur(5px)" checked>
              @else
                <input type="radio" name="filtroImagen" value="blur(5px)">
              @endif
              <div>✓</div>
            </label>
          </div>

          <div class="adminFormItem form_item form_item_checkbox">
              <label class="logoAsaar checkbox-label"> 3a. Incluir logo de la Asociación:
                @if ($noticia->logoAsaar == "si")
                  <input type="checkbox" name="logoAsaar" value="si" checked>
                @else
                  <input type="checkbox" name="logoAsaar" value="si">
                @endif

                <span class="checkbox-custom">✓</span>
              </label>
          </div>

          <div class="adminFormItem form_item form_item_checkbox">
              <label class="calendar checkbox-label"> 3b. Incluir calendario:
                @if ($noticia->calendar == "si")
                  <input type="checkbox" name="calendar" value="si" checked>
                @else
                  <input type="checkbox" name="calendar" value="si">
                @endif
                <span class="checkbox-custom">✓</span>
              </label>
          </div>

          @if ($noticia->calendar == "si")
          <div class="info_calendar">
          @else
          <div class="info_calendar" style="display: none;">
          @endif
              <label> Mes:
                <select class="" name="mes">
                  <option value="">Elegir:</option>
                  @for ($i = 0; $i < count($mes); $i++)
                    @if ($noticia->mes == $mes[$i])
                      <option value="{{$mes[$i]}}" selected>{{$mes[$i]}}</option>
                    @else
                      <option value="{{$mes[$i]}}">{{$mes[$i]}}</option>
                    @endif
                  @endfor
                </select>
              </label>
              <label> Día de la semana:
                <select class="" name="dia">
                  <option value="">Elegir:</option>
                  @for ($i = 0; $i < count($diaSemana); $i++)
                    @if ($noticia->dia == $diaSemana[$i])
                      <option value="{{$diaSemana[$i]}}" selected>{{$diaSemana[$i]}}</option>
                    @else
                      <option value="{{$diaSemana[$i]}}">{{$diaSemana[$i]}}</option>
                    @endif
                  @endfor
                </select>
              </label>
              <label> Número:
                <select class="" name="numero">
                  <option value="">Elegir:</option>
                  @for ($i = 1; $i < 32; $i++)
                    @if ($noticia->numero == $i)
                      <option value="{{$i}}" selected>{{$i}}</option>
                    @else
                      <option value="{{$i}}">{{$i}}</option>
                    @endif
                  @endfor
                </select>
              </label>
          </div>

            <div class="adminFormItem form_item  adminFormItem_textarea">
              <label class="tituloImagen">3c. Titular sobre imagen:
                <textarea  class="" name="tituloImagen" rows="5">{{$noticia->tituloImagen}}</textarea>
              </label>
              <p class="alert tituloImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            @if ($noticia->tituloImagen != null)
            <div class="colorTipoTitular">
            @else
            <div class="colorTipoTitular" style="display: none;">
            @endif
              <p>Color tipografía del titular:</p>
              @foreach ($colorTipoTitular as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorTipoTitular == $value)
                  <input type="radio" name="colorTipoTitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoTitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            @if ($noticia->tituloImagen != null)
            <div class="colorFondoTitular">
            @else
            <div class="colorFondoTitular" style="display: none;">
            @endif
              <p>Color fondo del titular:</p>
              @foreach ($colorFondoTitular as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorFondoTitular == $value)
                  <input type="radio" name="colorFondoTitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoTitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            @if ($noticia->tituloImagen != null)
            <div class="recuadroTitular form_item_checkbox">
            @else
            <div class="recuadroTitular form_item_checkbox" style="display: none;">
            @endif
                <label class="recuadro checkbox-label"> Recuadro de titular:
                  @if ($noticia->recuadro == "si")
                    <input type="checkbox" name="recuadro" value="si" checked>
                  @else
                    <input type="checkbox" name="recuadro" value="si">
                  @endif
                  <span class="checkbox-custom">✓</span>
                </label>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="subtituloImagen">3d. Bajada de titular sobre imagen:
                <textarea  class="" name="subtituloImagen" rows="5">{{$noticia->subtituloImagen}}</textarea>
              </label>
              <p class="alert subtituloImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="detalleImagen">3e. Información adicional sobre imagen:
                <textarea  class="" name="detalleImagen" rows="5">{{$noticia->detalleImagen}}</textarea>
              </label>
              <p class="alert detalleImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            @if ($noticia->subtituloImagen != null || $noticia->detalleImagen != null)
            <div class="colorTipoSubtitular">
            @else
            <div class="colorTipoSubtitular" style="display: none;">
            @endif
              <p>Color tipografía de bajada de titular e información adicional:</p>
              @foreach ($colorTipoSubtitular as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorTipoSubtitular == $value)
                  <input type="radio" name="colorTipoSubtitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoSubtitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            @if ($noticia->subtituloImagen != null || $noticia->detalleImagen != null)
            <div class="colorFondoSubtitular">
            @else
            <div class="colorFondoSubtitular" style="display: none;">
            @endif
              <p>Color fondo de bajada de titular e información adicional:</p>
              @foreach ($colorFondoSubtitular as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorFondoSubtitular == $value)
                  <input type="radio" name="colorFondoSubtitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoSubtitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="resumenImagen">3f. Resumen sobre imagen:
                <textarea  class="" name="resumenImagen" rows="5">{{$noticia->resumenImagen}}</textarea>
              </label>
              <p class="alert resumenImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            @if ($noticia->resumenImagen != null)
            <div class="colorTipoResumen">
            @else
              <div class="colorTipoResumen" style="display: none;">
            @endif
              <p>Color tipografía de resumen:</p>
              @foreach ($colorTipoResumen as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorTipoResumen == $value)
                  <input type="radio" name="colorTipoResumen" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoResumen" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            @if ($noticia->resumenImagen != null)
            <div class="colorFondoResumen">
            @else
            <div class="colorFondoResumen" style="display: none;">
            @endif
              <p>Color fondo de resumen:</p>
              @foreach ($colorFondoResumen as $key => $value)
                <label> {{$key}}
                @if ($noticia->colorFondoResumen == $value)
                  <input type="radio" name="colorFondoResumen" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoResumen" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="rectificacionImagen">3g. Mensaje de rectificación sobre imagen:
                <textarea  class="" name="rectificacionImagen" rows="5">{{$noticia->rectificacionImagen}}</textarea>
                <p class="alert rectificacionImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
              </label>
            </div>

          </div>
        </div>

        <div class="adminFormItem">
          <label for="content">4. Contenido de la noticia:</label>
          <textarea  class="" id="content" name="content" rows="5">{{$noticia->content}}</textarea>
          <p class="alert contentNoticia" style="color: red; width: 95%; margin: auto; display: none;"> </p>
        </div>

        <div class="adminFormItem imagenesAdicionales">
          <p>5. Subir imágenes adicionales</p>
          <div class="">
            <label for="filesPlus1">Imagen adicional 1:</label>
            @if ($noticia->filesPlus1 != null)
              <input type="file" id="filesPlus1" name="filesPlus1" style="display:none;">
              <p class="remover">Remover imagen</p>
              <input type="checkbox" name="filesPlus1Removida" value="si" style="display:none;">
            @else
              <input type="file" id="filesPlus1" name="filesPlus1">
              <p class="remover" style="display:none;">Remover imagen</p>
              <input type="checkbox" name="" value="" style="display:none;">
            @endif
            <div class=""></div>
            <p class="alert"></p>
          </div>

          <div class="">
            <label for="filesPlus2">Imagen adicional 2:</label>
            @if ($noticia->filesPlus2 != null)
              <input type="file" id="filesPlus2" name="filesPlus2" style="display:none;">
              <p class="remover">Remover imagen</p>
              <input type="checkbox" name="filesPlus2Removida" value="si" style="display:none;">
            @else
              <input type="file" id="filesPlus2" name="filesPlus2">
              <p class="remover" style="display:none;">Remover imagen</p>
              <input type="checkbox" name="" value="" style="display:none;">
            @endif
            <div class=""></div>
            <p class="alert"></p>
          </div>

          <div class="">
            <label for="filesPlus3">Imagen adicional 3:</label>
            @if ($noticia->filesPlus3 != null)
              <input type="file" id="filesPlus3" name="filesPlus3" style="display:none;">
              <p class="remover">Remover imagen</p>
              <input type="checkbox" name="filesPlus3Removida" value="si" style="display:none;">
            @else
              <input type="file" id="filesPlus3" name="filesPlus3">
              <p class="remover" style="display:none;">Remover imagen</p>
              <input type="checkbox" name="" value="" style="display:none;">
            @endif
            <div class=""></div>
            <p class="alert"></p>
          </div>
        </div>

        <div class="downloadCanvas">
          <a id="linkFacebook">
            <p>6. Descargar imagen para</p>
            <p>redes sociales</p>
          </a>
        </div>

        {{-- <div class="downloadCanvas">
          <a id="linkTwitter">
            <p>7. Descargar imagen 1024x512px</p>
            <p>(Twitter)</p>
          </a>
        </div> --}}

        <div class="resumenErrores" style="display:none;">
          <p class="alert title submit" style="color: red; width: 95%; text-align: center; display: none;">* El <b>Titular</b> de la noticia presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert subtitle submit" style="color: red; width: 95%; text-align: center; display: none;">* La <b>bajada del titular</b> de la noticia presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert tituloImagen submit" style="color: red; width: 95%; text-align: center; display: none;">* El <b>titular sobre la imagen</b> presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert subtituloImagen submit" style="color: red; width: 95%; text-align: center; display: none;">* La <b>bajada del titular sobre la imagen</b> presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert detalleImagen submit" style="color: red; width: 95%; text-align: center; display: none;">* La <b>información adicional sobre la imagen</b> presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert resumenImagen submit" style="color: red; width: 95%; text-align: center; display: none;">* El <b>resumen sobre la imagen</b> presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert rectificacionImagen submit" style="color: red; width: 95%; text-align: center; display: none;">* El <b>mensaje de rectificación sobre la imagen</b> presenta errores. Por favor corregir antes de continuar</p>
          <p class="alert contentNoticia submit" style="color: red; width: 95%; text-align: center; display: none;">* El <b>contenido</b> de la noticia presenta errores. Por favor corregir antes de continuar</p>
        </div>


        <div class="buttonWrap">
          <button class="downloadCanvas uploadNews"  type="submit">
            <p>7. Publicar noticia</p>
            {{-- <p>Procesando</p> --}}
          </button>
        </div>

      </form>

    </div>

    <div class="output">

      <div class="wrap_iframe">
        <h4>Vista previa noticia:</h4>
        {{-- <iframe id="output_iframe" src="{{ url('/plantilla-noticia') }}"></iframe> --}}
        <iframe id="output_iframe" src="/noticias/{{$noticia->id}}/{{$noticia->slug}}"></iframe>
      </div>

      <div class="allCanvas">
        <h4>Vista previa imagen para redes sociales:</h4>

        @if ($noticia->imagenNoticia == "si")
          <img id="imgCanvasFacebook" width="" height="" src="/storage/noticias/imagenesMain/{{$noticia->imagen}}" alt="" style="display:none;">
        @else
          <img id="imgCanvasFacebook" width="" height="" src="/storage/noticias/imagenesMain/Ali.jpg" alt="" style="display:none;">
        @endif

        {{-- <img id="imgCanvasTwitter" width="" height="" src="/media/noticias/preloaded/03.jpeg" alt="" style="display:none;"> --}}

        <div class="container_canvas">

          {{-- <p>Imagen 1200 x 1200 px ( por ejemplo, para usar en Facebook o Instagram):</p> --}}
          <div class="wrapCanvasFacebook">
            <canvas id="canvasFacebook" width="1200px" height="1200px"></canvas>
          </div>

          {{-- <p>Imagen 1024 x 512 px (por ejemplo, para usar en Twitter):</p> --}}
          {{-- <p>Imagen 1280 x 640 px (por ejemplo, para usar en Twitter):</p
          <div class="wrapCanvasTwitter">
            <canvas id="canvasTwitter" width="1280px" height="640px"></canvas>
          </div> --}}

          {{-- <a id="link"><p>Descargar imagen</p></a> --}}
        </div>
      </div>

    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/modificar-noticia.js') }}"></script>

  @endsection
