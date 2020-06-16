@extends("layouts.appAdmin")

@section("title")
  Administrar imágenes guardadas -
  @endsection

@section('content')

  <main class="admin adminImagenes">

    <h4>Listado de imágenes guardadas</h4>

    @if (count($imagenes)>0)
      <p>(Al eliminar una imagen, la misma será eliminada como opción al crear o modificar noticias. No será eliminida de la noticia que la esté usando.)</p>
    @endif


    <div class="imagenes">

      @if (count($imagenes)>0)

        @foreach ($imagenes as $key => $value)
          <div class="imagenItem">
            <form class="" action="/eliminar-imagen" method="post" autocomplete="off">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="idImagen" value="{{$value->id}}">
              {{-- <button type="submit" name="button">submit</button> --}}
            </form>
            <div class="eliminar">
              <p>Eliminar</p>
              <div class="cruz">
                <p>✖</p>
              </div>
            </div>
            <div class="divImagen">
              <img src="/storage/noticias/imagenesMain/thumbnails/{{$value->name}}" alt="">
            </div>
          </div>
        @endforeach

      @else
        <p class="cero">No hay imágenes guardadas.</p>
      @endif

    </div>

  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/administrar-imagenes.js') }}"></script>


  @endsection
