@extends("layouts.appAdmin")

@section("title")
  Generar imagen -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')
{{-- @dd($errors) --}}
  <main class="admin generar imagen">

    <div class="menuMobileTablet">
      <a class="menuInformacion"><p>Información</p></a>
      {{-- <a class="menuNoticia"><p>Noticia</p></a> --}}
      <a class="menuImagen"><p>Imagen</p></a>
    </div>

    <div class="input">

      <h4>Ingresar la información:</h4>

      <form class="" action="" method="" enctype="multipart/form-data" autocomplete="off">
        @csrf

        <div class="adminFormItem form_item form_item_checkbox">
          <div class="imagenNoticia checkbox-label">1. Elegir imagen:
          </div>

          <div class="imagenesWrap">

          <div class="imagenes">

            <div class="imagenesOpcionCarga">
              <p>Elegir imagen guardada</p>
              <p>▼</p>
            </div>

            @foreach ($imagenes as $key => $value)

              <label class="imagenLabel">
                @if ($loop->last)
                  <input type="radio" name="imagen" value="{{$value->name}}" checked>
                @else
                  <input type="radio" name="imagen" value="{{$value->name}}">
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
              <input type="radio" name="filtroImagen" value="none" checked>
              <div>✓</div>
            </label>
            <label class=""> Blanco y negro
              <input type="radio" name="filtroImagen" value="grayscale(100%)">
              <div>✓</div>
            </label>
            <label class=""> Fuera de foco
              <input type="radio" name="filtroImagen" value="blur(5px)">
              <div>✓</div>
            </label>
          </div>

          <div class="adminFormItem form_item form_item_checkbox">
              <label class="logoAsaar checkbox-label"> 2. Incluir logo de la Asociación:
                <input type="checkbox" name="logoAsaar" value="si">
                <span class="checkbox-custom">✓</span>
              </label>
          </div>
          <img class="logoAsaarImg" src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina" style="display:none;">

          <div class="adminFormItem form_item form_item_checkbox">
              <label class="calendar checkbox-label"> 3. Incluir calendario:
                <input type="checkbox" name="calendar" value="si">
                <span class="checkbox-custom">✓</span>
              </label>
          </div>

          <div class="info_calendar" style="display: none;">
              <label> Mes:
                <select class="" name="mes">
                  <option value="">Elegir:</option>
                  @for ($i = 0; $i < count($mes); $i++)
                    <option value="{{$mes[$i]}}">{{$mes[$i]}}</option>
                  @endfor
                </select>
              </label>
              <label> Día de la semana:
                <select class="" name="dia">
                  <option value="">Elegir:</option>
                  @for ($i = 0; $i < count($diaSemana); $i++)
                    <option value="{{$diaSemana[$i]}}">{{$diaSemana[$i]}}</option>
                  @endfor
                </select>
              </label>
              <label> Número:
                <select class="" name="numero">
                  <option value="">Elegir:</option>
                  @for ($i = 1; $i < 32; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select>
              </label>
          </div>

            <div class="adminFormItem form_item  adminFormItem_textarea">
              <label class="tituloImagen">4. Titular sobre imagen:
                <textarea  class="" name="tituloImagen" rows="5"></textarea>
              </label>
              <p class="alert tituloImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            <div class="colorTipoTitular" style="display: none;">
              <p>Color tipografía del titular:</p>
              @foreach ($colorTipoTitular as $key => $value)
                <label> {{$key}}
                @if ($loop->first)
                  <input type="radio" name="colorTipoTitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoTitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="colorFondoTitular" style="display: none;">
              <p>Color fondo del titular:</p>
              @foreach ($colorFondoTitular as $key => $value)
                <label> {{$key}}
                @if ($loop->first)
                  <input type="radio" name="colorFondoTitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoTitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="recuadroTitular form_item_checkbox" style="display: none;">
                <label class="recuadro checkbox-label"> Recuadro de titular:
                  <input type="checkbox" name="recuadro" value="si" checked>
                  <span class="checkbox-custom">✓</span>
                </label>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="subtituloImagen">5. Bajada de titular sobre imagen:
                <textarea  class="" name="subtituloImagen" rows="5"></textarea>
              </label>
              <p class="alert subtituloImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="detalleImagen">6. Información adicional sobre imagen:
                <textarea  class="" name="detalleImagen" rows="5"></textarea>
              </label>
              <p class="alert detalleImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            <div class="colorTipoSubtitular" style="display: none;">
              <p>Color tipografía de bajada de titular e información adicional:</p>
              @foreach ($colorTipoSubtitular as $key => $value)
                <label> {{$key}}
                @if ($loop->first)
                  <input type="radio" name="colorTipoSubtitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoSubtitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="colorFondoSubtitular" style="display: none;">
              <p>Color fondo de bajada de titular e información adicional:</p>
              @foreach ($colorFondoSubtitular as $key => $value)
                <label> {{$key}}
                @if ($loop->first)
                  <input type="radio" name="colorFondoSubtitular" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoSubtitular" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="resumenImagen">7. Resumen sobre imagen:
                <textarea  class="" name="resumenImagen" rows="5"></textarea>
              </label>
              <p class="alert resumenImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
            </div>

            <div class="colorTipoResumen" style="display: none;">
              <p>Color tipografía de resumen:</p>
              @foreach ($colorTipoResumen as $key => $value)
                <label> {{$key}}
                @if ($key == "Naranja")
                  <input type="radio" name="colorTipoResumen" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorTipoResumen" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="colorFondoResumen" style="display: none;">
              <p>Color fondo de resumen:</p>
              @foreach ($colorFondoResumen as $key => $value)
                <label> {{$key}}
                @if ($key == "Negro")
                  <input type="radio" name="colorFondoResumen" value="{{$value}}" checked>
                @else
                  <input type="radio" name="colorFondoResumen" value="{{$value}}">
                @endif
                  <div style="background-color: {{$value}};"></div>
                </label>
              @endforeach
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="rectificacionImagen">8. Mensaje de rectificación sobre imagen:
                <textarea  class="" name="rectificacionImagen" rows="5"></textarea>
                <p class="alert rectificacionImagen" style="color: red; width: 95%; margin: auto; display: none;"> </p>
              </label>
            </div>

          </div>
        </div>


        {{-- <div class="downloadCanvas">
          <a id="linkFacebook">
            <p>6. Descargar imagen para</p>
            <p>redes sociales</p>
          </a>
        </div> --}}


        {{-- <div class="buttonWrap" style="display: none;">
          <button class="downloadCanvas uploadNews"  type="button">
            <p></p>
          </button>
        </div> --}}

      </form>

    </div>

    <div class="output">

      <div class="allCanvas">
        <h4>Vista previa imagen para redes sociales:</h4>

        <img id="imgCanvasFacebook" width="" height="" src="/storage/noticias/imagenesMain/Ali.jpg" alt="" style="display:none;">

        {{-- <div class="container_canvas"> --}}

          <div class="wrapCanvasFacebook">
            <canvas id="canvasFacebookDos" width="1200px" height="1200px"></canvas>
          </div>

        {{-- </div> --}}
        <div class="downloadCanvas">
          <a id="linkFacebook">
            <p>Descargar imagen</p>
          </a>
        </div>

      </div>

    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/generar-imagen.js') }}"></script>

  @endsection
