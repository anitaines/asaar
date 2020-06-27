@extends("layouts.appAdmin")

@section("title")
  Panel de control -
  @endsection

@section('content')

  <main class="admin cPanel">

    <h4>Panel de control</h4>

    <div class="container">

      <a class="crearImagen" href="/generar-imagen">
        <div>
          <p>Crear imagen para redes sociales</p>
        </div>
      </a>

      <a class="adminCarousel" href="/administrar-carousel">
        <div>
          <p>Administrar carousel de inicio</p>
        </div>
      </a>

      <a class="adminImagenes" href="/administrar-imagenes">
        <div>
          <p>Administrar imágenes guardadas</p>
        </div>
      </a>

      <div class="noticias">

        <a class="agregarItemA" href="/generar-noticias">
          <div class="noticiaItem agregarItem">
            <div class="circulo">
              <div class="lineaVHorizontal"></div>
              <div class="lineaVertical"></div>
              <div class="lineaVHorizontal"></div>
            </div>
            <p>Nueva noticia</p>
          </div>
        </a>

        @foreach ($noticiasAll as $key => $value)
          <div class="noticiaItem">
            <form class="" action="/api/api-eliminar-noticia" method="post" autocomplete="off">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idNoticia" value="{{$value->id}}">
              {{-- <button type="submit" name="button">submit</button> --}}
            </form>
            <div class="eliminar">
              <p>Eliminar</p>
              <div class="cruz">
                <p>✖</p>
              </div>
            </div>
            @if ($value->imagenNoticia == "si")
              <div class="noticiaImagen" style="background-image: url('/storage/noticias/imagenesMain/thumbnails/{{$value->imagen}}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                height: 100px;"></div>
            @else
              <div class="noticiaImagen" style="background-color: {{$colores[rand(0,3)]}};
                height: 100px;"></div>
            @endif
            <div class="noticiaInfo">
              <a href="/noticia/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                <p>{{$value->title}}</p>
              </a>
              @php
                $fecha = Carbon\Carbon::parse($value->created_at)->locale('es');
              @endphp
              <p>Fecha de publicación: {{$fecha->isoFormat('D-MMMM-YYYY')}}</p>
              <label> Noticia nro.
                <input type="text" name="" value="{{$value->id}}" disabled>
              </label>
            </div>
            <a href="/modificar-noticia/{{$value->id}}">
              <div class="modificar">
                <p>Modificar noticia</p>
              </div>
            </a>
          </div>
        @endforeach

      </div>

    </div>



  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/control-panel.js') }}"></script>


  @endsection
