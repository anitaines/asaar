@extends("layouts.appAdmin")

@section("title")
  Generar noticias -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin">
    <div class="input">
      <form class="" action="/generar-noticias" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title">Título:</label>
        <input id="title" type="text" name="title" value="">

        <label for="subtitle">Sub-título:</label>
        <input id="subtitle" type="text" name="subtitle" value="">

        <label class="imagenNoticia"> Incluir una imagen principal:
          <input type="checkbox" name="imagenNoticia" value="si">
        </label>

        <div class="imagenesWrap" style="display: none;">
          <div class="imagenes">
            <label class="imagen1"> Elegir imagen principal para noticia:
              <div style="background-image: url('/media/noticias/preloaded/01.jpeg');" class=""></div>
              <input id="imagen1" type="radio" name="imagen" value="/media/noticias/preloaded/01.jpeg">
            </label>
            <label class="imagen2"> Elegir imagen principal para noticia:
              <div style="background-image: url('/media/noticias/preloaded/02.jpg');" class=""></div>
              <input id="imagen2" type="radio" name="imagen" value="/media/noticias/preloaded/02.jpg">
            </label>
            <label class="imagen3"> Elegir imagen principal para noticia:
              <div style="background-image: url('/media/noticias/preloaded/03.jpeg');" class=""></div>
              <input id="imagen3" type="radio" name="imagen" value="/media/noticias/preloaded/03.jpeg" checked>
            </label>
          </div>

          {{-- <label class="" for="upload">Cargar imagen:</label>
          <input class="" type="file" id="upload" name="image1" value= ""> --}}

          <input type="file" id="files" name="files">
          <p class="alert"></p>
          <div id="uploadedImage"></div>

          <label class="logoAsaar"> Incluir logo de la Asociación:
            <input type="checkbox" name="logoAsaar" value="si">
          </label>

          <label class="calendar"> Incluir calendario:
            <input type="checkbox" name="calendar" value="si">
          </label>
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

          <label class="tituloImagen">Titular en imagen:
            <textarea  class="" name="tituloImagen" rows="5"></textarea>
          </label>
          <div class="colorTipoTitular" style="display: none;">
            <p>Cambiar color tipografía:</p>
            <label class="cambiarColorMagenta"> Magenta
              <div></div>
              <input type="radio" name="colorTipoTitular" value="var(--magenta)" checked>
            </label>
            <label class="cambiarColorVerde"> Verde
              <div></div>
              <input type="radio" name="colorTipoTitular" value="var(--green)">
            </label>
            <label class="cambiarColorNaranja"> Naranja
              <div></div>
              <input type="radio" name="colorTipoTitular" value="var(--orange)">
            </label>
            <label class="cambiarColorCeleste"> Celeste
              <div></div>
              <input type="radio" name="colorTipoTitular" value="var(--blue)">
            </label>
            <label class="cambiarColorBlanco"> Blanco
              <div></div>
              <input type="radio" name="colorTipoTitular" value="#ffffff">
            </label>
            <label class="cambiarColorNegro"> Negro
              <div></div>
              <input type="radio" name="colorTipoTitular" value="var(--black)">
            </label>
          </div>
          <div class="colorFondoTitular" style="display: none;">
            <p>Cambiar color fondo:</p>
            <label class="cambiarColorTransparente"> Transparente
              <div></div>
              <input type="radio" name="colorFondoTitulo" value="transparent" checked>
            </label>
            <label class="cambiarColorBlanco"> Blanco
              <div></div>
              <input type="radio" name="colorFondoTitulo" value="rgba(255, 255, 255, 0.5)">
            </label>
            <label class="cambiarColorNegro"> Negro
              <div></div>
              <input type="radio" name="colorFondoTitulo" value="rgba(69, 69, 69, 0.5)">
            </label>
          </div>

          <label class="subtituloImagen">Sub-titular en imagen:
            <textarea  class="" name="subtituloImagen" rows="5"></textarea>
          </label>

          <label class="detalleImagen">Detalle en imagen:
            <textarea  class="" name="detalleImagen" rows="5"></textarea>
          </label>

          <div class="colorTipoSubtitular" style="display: none;">
            <p>Cambiar color tipografía:</p>
            <label class="cambiarColorBlanco"> Blanco
              <div></div>
              <input type="radio" name="colorTipoSubtitular" value="#ffffff" checked>
            </label>
            <label class="cambiarColorNegro"> Negro
              <div></div>
              <input type="radio" name="colorTipoSubtitular" value="var(--black)">
            </label>
          </div>
          <div class="colorFondoSubtitular" style="display: none;">
            <p>Cambiar color fondo:</p>
            <label class="cambiarColorMagenta"> Magenta
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="var(--magenta)" checked>
            </label>
            <label class="cambiarColorVerde"> Verde
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="var(--green)">
            </label>
            <label class="cambiarColorNaranja"> Naranja
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="var(--orange)">
            </label>
            <label class="cambiarColorCeleste"> Celeste
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="var(--blue)">
            </label>
            <label class="cambiarColorBlanco"> Blanco
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="#ffffff">
            </label>
            <label class="cambiarColorNegro"> Negro
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="var(--black)">
            </label>
            <label class="cambiarColorNegro"> Transparente
              <div></div>
              <input type="radio" name="colorFondoSubtitular" value="transparent">
            </label>
          </div>

          <label class="resumenImagen">Resumen en imagen:
            <textarea  class="" name="resumenImagen" rows="5"></textarea>
          </label>
          <div class="colorTipoResumen" style="display: none;">
            <p>Cambiar color tipografía:</p>
            <label class="naranja"> Naranja
              <div></div>
              <input type="radio" name="colorTipoResumen" value="darkorange" checked>
            </label>
            <label class="magenta"> Magenta
              <div></div>
              <input type="radio" name="colorTipoResumen" value="hotpink">
            </label>
            <label class="celeste"> Celeste
              <div></div>
              <input type="radio" name="colorTipoResumen" value="cyan">
            </label>
            <label class="verde"> Verde
              <div></div>
              <input type="radio" name="colorTipoResumen" value="mediumspringgreen">
            </label>
            <label class="blanco"> Blanco
              <div></div>
              <input type="radio" name="colorTipoResumen" value="#ffffff">
            </label>
            <label class="negro"> Negro
              <div></div>
              <input type="radio" name="colorTipoSubtitular" value="var(--black)">
            </label>
          </div>
          <div class="colorFondoResumen" style="display: none;">
            <p>Cambiar color fondo:</p>
            <label class="cambiarColorTransparente"> Transparente
              <div></div>
              <input type="radio" name="colorFondoResumen" value="transparent">
            </label>
            <label class="cambiarColorBlanco"> Blanco
              <div></div>
              <input type="radio" name="colorFondoResumen" value="rgba(255, 255, 255, 0.5)">
            </label>
            <label class="cambiarColorNegro"> Negro
              <div></div>
              <input type="radio" name="colorFondoResumen" value="rgba(69, 69, 69, 0.5)" checked>
            </label>
          </div>

          </div>

        <label for="content">Contenido:</label>
        <textarea  class="" id="content" name="content" rows="5"></textarea>


        <p>Subir más imágenes</p>
        <div class="">
          <label for="filesPlus1">Imagen adicional 1</label>
          <input type="file" id="filesPlus1" name="filesPlus1">
          <p class="remover" style="display:none;">Remover imagen</p>
          <div class=""></div>
          <p class="alert"></p>
        </div>

        <div class="">
          <label for="filesPlus2">Imagen adicional 2</label>
          <input type="file" id="filesPlus2" name="filesPlus2">
          <p class="remover" style="display:none;">Remover imagen</p>
          <div class=""></div>
          <p class="alert"></p>
        </div>

        <div class="">
          <label for="filesPlus3">Imagen adicional 3</label>
          <input type="file" id="filesPlus3" name="filesPlus3">
          <p class="remover" style="display:none;">Remover imagen</p>
          <div class=""></div>
          <p class="alert"></p>
        </div>



        <div id="uploadedImagePlus">
        </div>

        <button class="buton_newsletter_footer"  type="submit">
          <p>Publicar</p>
          <p>Procesando</p>
        </button>

      </form>

    </div>

    <div class="output">

      <div class="wrap_iframe">
        <iframe id="output_iframe" src="{{ url('/plantilla-noticia') }}"></iframe>
      </div>

      <canvas id="canvasFacebook" width="500" height="500" style="border:1px solid #000000;"></canvas>

      <img id="imgCanvas" width="" height="" src="/media/noticias/preloaded/03.jpeg" alt="" style="display:none;">

      <img id="prueba" src="" alt="">

    </div>
  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/generar-noticias.js') }}"></script>

  @endsection
