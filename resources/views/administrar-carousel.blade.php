@extends("layouts.appAdmin")

@section("title")
  Administrar carousel -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin carousel">


    <h4>Noticias actualmente en el carrusel de inicio:</h4>

    @if (count($carouselActual) > 3)
      <p>El carrusel tiene más de 3 noticias, por favor considerar reducir la cantidad.</p>

      <div class="carouselActual">
        @foreach ($carouselActual as $key => $value)
          <div class="carouselItem">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$value->carousel}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; height: 300px;"></div>
            <div class="carouselInfo">
            <p>{{$value->title}}</p>
            <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">/noticias/{{$value->id}}/{{$value->slug}}</a>
          </div>
        </div>
        @endforeach
      </div>

    @elseif (count($carouselActual) == 0)
      <p>No hay noticias en el carrusel.</p>

    @else
      <div class="carouselActual">
        @foreach ($carouselActual as $key => $value)
          <div class="carouselItem">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$value->carousel}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; height: 300px;"></div>
            <div class="carouselInfo">
            <p>{{$value->title}}</p>
            <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">/noticias/{{$value->id}}/{{$value->slug}}</a>
          </div>
        </div>
        @endforeach
      </div>

    @endif

    <div class="accion">

      <form class="" action="/administrar-carousel" method="post" autocomplete="off">
        @csrf

        <div class="botonEliminar">
          <a>
            <p>Eliminar noticias</p>
            <p>del carrusel</p>
          </a>
        </div>
        <div class="eliminar">

          @foreach ($noticiasAll as $key => $value)
            @if ($value->carousel != null)
            <div class="carouselItem">
              {{-- <div class="carouselImagen" style="background-image: url('/storage/noticias/imagenesMain/{{$value->imagen}}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center; height: 300px;"></div> --}}
              <div class="carouselInfo">
              <p>{{$value->title}}</p>
              <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
              <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">/noticias/{{$value->id}}/{{$value->slug}}</a>
            </div>
            <div class="input">
              <label for=""> Eliminar
                <input type="checkbox" name="eliminarNoticiaCarousel" value="{{$value->id}}">
              </label>
            </div>
            </div>
          @endif
        @endforeach

        </div>

        <div class="botonAgregar">
          <a>
            <p>Agregar noticias</p>
            <p>al carrusel</p>
          </a>
        </div>
        <div class="agregar">

          @foreach ($noticiasAll as $key => $value)
            @if ($value->carousel == null)
            <div class="carouselItem">
              {{-- <div class="carouselImagen" style="background-image: url('/storage/noticias/imagenesMain/{{$value->imagen}}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center; height: 300px;"></div> --}}
              <div class="carouselInfo">
              <p>{{$value->title}}</p>
              <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
              <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">/noticias/{{$value->id}}/{{$value->slug}}</a>
            </div>
            <div class="input">
              <label for=""> Agregar
                <input type="checkbox" name="agregarNoticiaCarousel" value="{{$value->id}}">
              </label>
              <div class="">
                Elegir imagen para carousel:
                @foreach ($carouselImagenes as $keyImagen => $valueImagen)
                  <label for=""> Agregar
                    <input type="checkbox" name="imagenCarousel" value="{{$valueImagen->name}}">
                    <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center; height: 300px;"></div>
                  </label>
                @endforeach

              </div>
            </div>
            </div>
          @endif
        @endforeach

        </div>

      </form>

    </div>


  </main>


  @endsection
