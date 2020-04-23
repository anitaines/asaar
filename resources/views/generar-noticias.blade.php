@extends("layouts.appAdmin")

@section("title")
  Generar noticias -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin">
    <div class="input">

      <h4>Ingresar la información:</h4>

      <form class="" action="/generar-noticias" method="post" enctype="multipart/form-data">
        @csrf

        <div class="adminFormItem">
          <label for="title">1. Titular:</label>
          <input id="title" type="text" name="title" value="">
        </div>

        <div class="adminFormItem">
          <label for="subtitle">2. Bajada titular:</label>
          <input id="subtitle" type="text" name="subtitle" value="">
        </div>

        <div class="adminFormItem form_item form_item_checkbox">
          <label class="imagenNoticia checkbox-label">3. Incluir una imagen principal:
            <input type="checkbox" name="imagenNoticia" value="si">
            <span class="checkbox-custom">✓</span>
          </label>

          <div class="imagenesWrap" style="display: none;">
            <div class="imagenes">
            {{-- <p>Elegir imagen guardada:</p> --}}
            <div class="imagenesOpcionCarga">
              <p>Elegir imagen guardada</p>
              <p>▼</p>
            </div>

            <label class="imagen1">
              <input id="imagen1" type="radio" name="imagen" value="/media/noticias/preloaded/01.jpeg">
              <div style="background-image: url('/media/noticias/preloaded/01.jpeg');" class=""></div>
            </label>

            <label class="imagen2">
              <input id="imagen2" type="radio" name="imagen" value="/media/noticias/preloaded/02.jpg">
              <div style="background-image: url('/media/noticias/preloaded/02.jpg');" class=""></div>
            </label>

            <label class="imagen3">
              <input id="imagen3" type="radio" name="imagen" value="/media/noticias/preloaded/03.jpeg" checked>
              <div style="background-image: url('/media/noticias/preloaded/03.jpeg');" class=""></div>
            </label>

            <label class="imagen1">
              <input id="imagen1" type="radio" name="imagen" value="/media/noticias/preloaded/01.jpeg">
              <div style="background-image: url('/media/noticias/preloaded/01.jpeg');" class=""></div>
            </label>

            <label class="imagen2">
              <input id="imagen2" type="radio" name="imagen" value="/media/noticias/preloaded/02.jpg">
              <div style="background-image: url('/media/noticias/preloaded/02.jpg');" class=""></div>
            </label>

            <label class="imagen3">
              <input id="imagen3" type="radio" name="imagen" value="/media/noticias/preloaded/03.jpeg">
              <div style="background-image: url('/media/noticias/preloaded/03.jpeg');" class=""></div>
            </label>

            <label class="imagen1">
              <input id="imagen1" type="radio" name="imagen" value="/media/noticias/preloaded/01.jpeg">
              <div style="background-image: url('/media/noticias/preloaded/01.jpeg');" class=""></div>
            </label>

            <label class="imagen2">
              <input id="imagen2" type="radio" name="imagen" value="/media/noticias/preloaded/02.jpg">
              <div style="background-image: url('/media/noticias/preloaded/02.jpg');" class=""></div>
            </label>

            <label class="imagen3">
              <input id="imagen3" type="radio" name="imagen" value="/media/noticias/preloaded/03.jpeg">
              <div style="background-image: url('/media/noticias/preloaded/03.jpeg');" class=""></div>
            </label>
          </div>

          <div class="imagenesOpcionCargaNueva">
            <p>Cargar nueva imagen ▼</p>
            <input type="file" id="files" name="files">
            <p class="alert"></p>
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
              <label class="logoAsaar checkbox-label"> Incluir logo de la Asociación:
                <input type="checkbox" name="logoAsaar" value="si">
                <span class="checkbox-custom">✓</span>
              </label>
          </div>

          <div class="adminFormItem form_item form_item_checkbox">
              <label class="calendar checkbox-label"> Incluir calendario:
                <input type="checkbox" name="calendar" value="si">
                <span class="checkbox-custom">✓</span>
              </label>
          </div>

          <div class="info_calendar" style="display: none;">
              <label> Mes:
                <select class="" name="mes">
                  <option value="">Elegir:</option>
                  <option value="ENERO">ENERO</option>
                  <option value="FEBRERO">FEBRERO</option>
                  <option value="MARZO">MARZO</option>
                  <option value="ABRIL">ABRIL</option>
                  <option value="MAYO">MAYO</option>
                  <option value="JUNIO">JUNIO</option>
                  <option value="JULIO">JULIO</option>
                  <option value="AGOSTO">AGOSTO</option>
                  <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                  <option value="OCTUBRE">OCTUBRE</option>
                  <option value="NOVIEMBRE">NOVIEMBRE</option>
                  <option value="DICIEMBRE">DICIEMBRE</option>
                </select>
              </label>
              <label> Día de la semana:
                <select class="" name="dia">
                  <option value="">Elegir:</option>
                  <option value="DOMINGO">DOMINGO</option>
                  <option value="LUNES">LUNES</option>
                  <option value="MARTES">MARTES</option>
                  <option value="MIÉRCOLES">MIÉRCOLES</option>
                  <option value="JUEVES">JUEVES</option>
                  <option value="VIERNES">VIERNES</option>
                  <option value="SÁBADO">SÁBADO</option>
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
              <label class="tituloImagen">Titular sobre imagen:
                <textarea  class="" name="tituloImagen" rows="5"></textarea>
              </label>
            </div>

            <div class="colorTipoTitular" style="display: none;">
              <p>Color tipografía del titular:</p>
              <label class="cambiarColorMagenta"> Magenta
                {{-- --magenta: #ab2097; --}}
                <input type="radio" name="colorTipoTitular" value="#AB2097" checked>
                <div style="background-color: #AB2097;"></div>
              </label>

              <label class="cambiarColorVerde"> Verde
                {{-- --green: #6ACF95; --}}
                <input type="radio" name="colorTipoTitular" value="#6ACF95">
                <div style="background-color: #6ACF95;"></div>
              </label>

              <label class="cambiarColorNaranja"> Naranja
                {{-- --orange: #FC8901; --}}
                <input type="radio" name="colorTipoTitular" value="#FC8901">
                <div style="background-color: #FC8901;"></div>
              </label>

              <label class="cambiarColorCeleste"> Cyan
                {{-- --blue: #34BFD2; --}}
                <input type="radio" name="colorTipoTitular" value="#34BFD2">
                <div style="background-color: #34BFD2;"></div>
              </label>

              <label class="cambiarColorBlanco"> Blanco
                <input type="radio" name="colorTipoTitular" value="#ffffff">
                <div style="background-color: #ffffff;"></div>
              </label>

              <label class="cambiarColorNegro"> Negro
                {{-- --black: #454545; --}}
                <input type="radio" name="colorTipoTitular" value="#454545">
                <div style="background-color: #454545;"></div>
              </label>
            </div>

            <div class="colorFondoTitular" style="display: none;">
              <p>Color fondo del titular:</p>
              <label class="cambiarColorTransparente"> Sin color
                <input type="radio" name="colorFondoTitulo" value="transparent" checked>
                <div style="background-color: transparent;"></div>
              </label>

              <label class="cambiarColorBlanco"> Blanco
                <input type="radio" name="colorFondoTitulo" value="rgba(255, 255, 255, 0.5)">
                <div style="background-color: rgba(255, 255, 255, 1);"></div>
              </label>

              <label class="cambiarColorNegro"> Negro
                <input type="radio" name="colorFondoTitulo" value="rgba(69, 69, 69, 0.5)">
                <div style="background-color: rgba(69, 69, 69, 1);"></div>
              </label>
            </div>

            <div class="recuadroTitular form_item_checkbox" style="display: none;">
                <label class="recuadro checkbox-label"> Recuadro de titular:
                  <input type="checkbox" name="recuadro" value="si" checked>
                  <span class="checkbox-custom">✓</span>
                </label>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="subtituloImagen">Bajada de titular sobre imagen:
                <textarea  class="" name="subtituloImagen" rows="5"></textarea>
              </label>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="detalleImagen">Información adicional sobre imagen:
                <textarea  class="" name="detalleImagen" rows="5"></textarea>
              </label>
            </div>

            <div class="colorTipoSubtitular" style="display: none;">
              <p>Color tipografía de bajada de titular e información adicional:</p>
              <label class="cambiarColorBlanco"> Blanco
                <input type="radio" name="colorTipoSubtitular" value="#ffffff" checked>
                <div style="background-color: #ffffff;"></div>
              </label>

              <label class="cambiarColorNegro"> Negro
                {{-- --black: #454545; --}}
                <input type="radio" name="colorTipoSubtitular" value="#454545">
                <div style="background-color: #454545;"></div>
              </label>
            </div>

            <div class="colorFondoSubtitular" style="display: none;">
              <p>Color fondo de bajada de titular e información adicional:</p>
              <label class="cambiarColorMagenta"> Magenta
                <input type="radio" name="colorFondoSubtitular" value="#AB2097" checked>
                <div style="background-color: #AB2097;"></div>
              </label>

              <label class="cambiarColorVerde"> Verde
                <input type="radio" name="colorFondoSubtitular" value="#6ACF95">
                <div style="background-color: #6ACF95;"></div>
              </label>

              <label class="cambiarColorNaranja"> Naranja
                <input type="radio" name="colorFondoSubtitular" value="#FC8901">
                <div style="background-color: #FC8901;"></div>
              </label>

              <label class="cambiarColorCeleste"> Cyan
                <input type="radio" name="colorFondoSubtitular" value="#34BFD2">
                <div style="background-color: #34BFD2;"></div>
              </label>

              <label class="cambiarColorBlanco"> Blanco
                <input type="radio" name="colorFondoSubtitular" value="#ffffff">
                <div style="background-color: #ffffff;"></div>
              </label>

              <label class="cambiarColorNegro"> Negro
                <input type="radio" name="colorFondoSubtitular" value="#454545">
                <div style="background-color: #454545;"></div>
              </label>

              <label class="cambiarColorTransparente"> Sin color
                <input type="radio" name="colorFondoSubtitular" value="transparent">
                <div style="background-color: transparent;"></div>
              </label>
            </div>

            <div class="adminFormItem form_item adminFormItem_textarea">
              <label class="resumenImagen">Resumen sobre imagen:
                <textarea  class="" name="resumenImagen" rows="5"></textarea>
              </label>
            </div>

            <div class="colorTipoResumen" style="display: none;">
              <p>Color tipografía de resumen:</p>
              <label class="magenta"> Magenta
                {{-- hotpink --}}
                <input type="radio" name="colorTipoResumen" value="rgb(255, 105, 180)">
                <div style="background-color: rgb(255, 105, 180);"></div>
              </label>

              <label class="verde"> Verde
                {{-- mediumspringgreen --}}
                <input type="radio" name="colorTipoResumen" value="rgb(0, 250, 154)">
                <div style="background-color: rgb(0, 250, 154);"></div>
              </label>

              <label class="naranja"> Naranja
                {{-- darkorange --}}
                <input type="radio" name="colorTipoResumen" value="rgb(255, 140, 0)" checked>
                <div style="background-color: rgb(255, 140, 0);"></div>
              </label>

              <label class="celeste"> Cyan
                {{-- cyan --}}
                <input type="radio" name="colorTipoResumen" value="rgb(0, 255, 255)">
                <div style="background-color: rgb(0, 255, 255);"></div>
              </label>

              <label class="blanco"> Blanco
                <input type="radio" name="colorTipoResumen" value="#ffffff">
                <div style="background-color: #ffffff;"></div>
              </label>

              <label class="negro"> Negro
                <input type="radio" name="colorTipoResumen" value="rgb(69, 69, 69)">
                <div style="background-color: rgb(69, 69, 69);"></div>
              </label>
            </div>

            <div class="colorFondoResumen" style="display: none;">
              <p>Color fondo de resumen:</p>
              <label class="cambiarColorTransparente"> Sin color
                <input type="radio" name="colorFondoResumen" value="transparent">
                <div style="background-color: transparent;"></div>
              </label>

              <label class="cambiarColorBlanco"> Blanco
                <input type="radio" name="colorFondoResumen" value="rgba(255, 255, 255, 0.5)">
                <div style="background-color: rgba(255, 255, 255, 1);"></div>
              </label>

              <label class="cambiarColorNegro"> Negro
                <input type="radio" name="colorFondoResumen" value="rgba(69, 69, 69, 0.5)" checked>
                <div style="background-color: rgba(69, 69, 69, 1);"></div>
              </label>
            </div>

          </div>
        </div>

        <div class="adminFormItem">
          <label for="content">4. Contenido de la noticia:</label>
          <textarea  class="" id="content" name="content" rows="5"></textarea>
        </div>

        <div class="adminFormItem imagenesAdicionales">
          <p>5. Subir imágenes adicionales</p>
          <div class="">
            <label for="filesPlus1">Imagen adicional 1:</label>
            <input type="file" id="filesPlus1" name="filesPlus1">
            <p class="remover" style="display:none;">Remover imagen</p>
            <div class=""></div>
            <p class="alert"></p>
          </div>

          <div class="">
            <label for="filesPlus2">Imagen adicional 2:</label>
            <input type="file" id="filesPlus2" name="filesPlus2">
            <p class="remover" style="display:none;">Remover imagen</p>
            <div class=""></div>
            <p class="alert"></p>
          </div>

          <div class="">
            <label for="filesPlus3">Imagen adicional 3:</label>
            <input type="file" id="filesPlus3" name="filesPlus3">
            <p class="remover" style="display:none;">Remover imagen</p>
            <div class=""></div>
            <p class="alert"></p>
          </div>
        </div>

        <div class="downloadCanvas">
          <a id="linkFacebook">
            <p>6. Descargar imagen 1200x1200px</p>
            <p>(Facebook/Instagram)</p>
          </a>
        </div>

        <div class="downloadCanvas">
          <a id="linkTwitter">
            <p>7. Descargar imagen 1024x512px</p>
            <p>(Twitter)</p>
          </a>
        </div>

        {{-- <button class="buton_newsletter_footer"  type="submit">
          <p>8. Publicar noticia</p>
          <p>Procesando</p>
        </button> --}}

        <div class="downloadCanvas uploadNews">
          <button class=""  type="submit" disabled>
            <p>8. Publicar noticia</p>
            {{-- <p>Procesando</p> --}}
          </button>
        </div>

      </form>

    </div>

    <div class="output">

      <div class="wrap_iframe">
        <h4>Vista previa noticia:</h4>
        <iframe id="output_iframe" src="{{ url('/plantilla-noticia') }}"></iframe>
      </div>

      <div class="allCanvas">
        <h4>Vista previa imagen para redes sociales:</h4>

        <img id="imgCanvasFacebook" width="" height="" src="/media/noticias/preloaded/03.jpeg" alt="" style="display:none;">
        <img id="imgCanvasTwitter" width="" height="" src="/media/noticias/preloaded/03.jpeg" alt="" style="display:none;">

        <div class="container_canvas">

          <p>Imagen 1200 x 1200 px ( por ejemplo, para usar en Facebook o Instagram):</p>
          <div class="wrapCanvasFacebook">
            <canvas id="canvasFacebook" width="1200px" height="1200px"></canvas>
          </div>

          {{-- <p>Imagen 1024 x 512 px (por ejemplo, para usar en Twitter):</p> --}}
          <p>Imagen 1280 x 640 px (por ejemplo, para usar en Twitter):</p>
          {{-- 1024 - 1280 125%
          512 - 640 --}}
          <div class="wrapCanvasTwitter">
            <canvas id="canvasTwitter" width="1280px" height="640px"></canvas>
          </div>

          {{-- <img id="prueba" src="" alt="" style="display: none;"> --}}

          {{-- <a id="link"><p>Descargar imagen</p></a> --}}
        </div>
      </div>

    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/generar-noticias.js') }}"></script>

  @endsection
