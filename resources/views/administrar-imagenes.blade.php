@extends("layouts.appAdmin")

@section("title")
  Administrar imágenes guardadas -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin adminImagenes">

    <h4>Listado de imágenes guardadas</h4>
    <p>(Al eliminar una imagen, la misma será eliminada como opción al crear o modificar noticias. No será eliminida de la noticia que la esté usando.)</p>


    <div class="noticias imagenes">

      @foreach ($imagenes as $key => $value)
        <div class="noticiaItem imagenItem">
          <form class="" action="/eliminar-imagen" method="post" autocomplete="off">
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
          <div class="noticiaImagen" style="height: 100px;">
            <img src="/storage/noticias/imagenesMain/{{$value->name}}" alt="">
          </div>
        </div>
      @endforeach

    </div>

  </main>

  <!-- Scripts -->
  {{-- <script src="{{ asset('js/control-panel.js') }}"></script> --}}


  @endsection
