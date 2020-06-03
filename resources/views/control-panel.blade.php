@extends("layouts.appAdmin")

@section("title")
  Panel de control -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin cPanel">

    <h4>Panel de control</h4>

    <div class="crearImagen">

    </div>

    <div class="adminCarousel">

    </div>

    <div class="adminImagenes">

    </div>

    <div class="container">

      <div class="noticias">
        <a href="/generar-noticias">
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
            <form class="" action="/eliminar-noticia/{{$value->id}}" method="post" autocomplete="off">
              {{-- @csrf --}}
              {{-- <input type="checkbox" name="" value="" style="display: none;"> --}}

              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" name="button">submit</button>
            </form>
            <div class="eliminar">
              <p>Eliminar</p>
              <div class="cruz">
                <p>✖</p>
              </div>
            </div>
            @if ($value->imagenNoticia == "si")
              <div class="noticiaImagen" style="background-image: url('/storage/noticias/imagenesMain/{{$value->imagen}}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center;
                height: 100px;"></div>
            @else
              <div class="noticiaImagen" style="background-color: {{$colores[rand(0,3)]}};
                height: 100px;"></div>
            @endif
            <div class="noticiaInfo">
              <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                <p>{{$value->title}}</p>
              </a>
              <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
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
