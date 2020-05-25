@extends("layouts.appAdmin")

@section("title")
  Administrar carousel -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin carousel">
    {{-- @dd($errors) --}}

    <h4>VERSION DOS: Noticias actualmente en el carousel de inicio:</h4>

    <p class="alert" style="color: #ffffff;">alert</p>

    @if ($errors->all())
      <p class="" style="color: red; width: 95%; text-align: center;"><b>Hubo un error guardando los cambios. Por favor refrescar la página y volver a intentar. Si el problema persiste contactar al desarrollador del sitio. Muchas gracias.</b></p>
    @endif

    <form class="" action="/administrar-carousel" method="post" autocomplete="off">
      @csrf

      <div class="carouselActual">
        @foreach ($carouselActual as $key => $value)
          <div class="carouselItem inCarousel">
            <div class="eliminar">
              <label> Eliminar
                <input type="checkbox" name="modificarNoticiaCarousel[{{$value->id}}]" value="">
              </label>
              <div class="cruz">
                <p>✖</p>
              </div>
            </div>
            <input type="hidden" name="" value="{{$value->carousel}}">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/thumbnails/{{$value->carousel}}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;"></div>
            <div class="carouselInfo">
              <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                <p>{{$value->title}}</p>
              </a>
              <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
              <label> Noticia nro.
                <input type="text" name="" value="{{$value->id}}" disabled>
              </label>
            </div>
            <div class="modificar">
              <label> Modificar imagen carousel
                <input type="checkbox" name="modificarNoticiaCarousel[{{$value->id}}]" value="">
              </label>
            </div>
          </div>
        @endforeach
        <div class="carouselItem inCarousel" style="display: none;">
          <input type="hidden" name="" value="">
          <div class="carouselImagen"></div>
          <div class="carouselInfo">
            <a href="" target="_blank" rel="noreferrer">
              <p></p>
            </a>
            <p>Fecha de publicación:</p>
            <label> Noticia nro.
              <input type="text" name="" value="0" disabled>
            </label>
          </div>
        </div>

        <div class="carouselItem agregarItem">
          <div class="circulo"></div>
          <p>Agregar noticia al carousel</p>
        </div>
      </div>

      <div class="noticiasWrap" style="display: none;">

        <div class="cerrarNoticias">
          <p>✖</p>
        </div>
        <div class="noticiasHead">
            <p>Listado de noticias:</p>
        </div>
        <div class="noticias">
          @foreach ($noticiasAll as $key => $value)
            {{-- @if ($value->carousel != null)
            <div class="noticiasItem noticiaGris">
            @else --}}
            <div class="noticiasItem">
            {{-- @endif --}}
              {{-- <input type="hidden" name="" value="{{$value->carousel}}"> --}}
              <div class="itemId">
                <label> Noticia nro.
                  <input type="text" name="" value="{{$value->id}}" disabled>
                </label>
              </div>
              <div class="noticiasInfo">
                <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                  <p>{{$value->title}}</p>
                </a>
                <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
              </div>
              <div class="agregar">
                {{-- @if ($value->carousel != null)
                  <p>Ya se encuentra en el carousel</p>
                @else --}}
                <label class="checkbox-label"> Agregar
                  <input type="checkbox" name="" value="{{$value->id}}">
                  <span class="checkbox-custom">✓</span>
                </label>
                {{-- @endif --}}
              </div>
            </div>
          @endforeach
        </div>

      </div>

      <div class="imagenesDisponibles" style="display: none;">
      {{-- <div class="imagenesDisponibles" style="opacity: 0;"> --}}
        <div class="cerrarImagenes">
          <p>✖</p>
        </div>
        <div class="noticiasHead">
            <p>Elegir imagen para carousel:</p>
        </div>

        <div class="imagenesDisponiblesWrap">
          @foreach ($carouselImagenes as $keyImagen => $valueImagen)
            <label>
                <input type="radio" name="imagenCarousel" value="{{$valueImagen->name}}">
              <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/thumbnails/{{$valueImagen->name}}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center; height: 100px;"></div>
            </label>
          @endforeach
        </div>
      </div>

      <div class="gris" style="display: none;"></div>

      <div class="buttons">
        <div class="buttonWrap">
          <button class="save"  type="submit">
            Guardar cambios
            {{-- <p>Guardar cambios</p> --}}
            {{-- <p>Procesando</p> --}}
          </button>
        </div>
        <div class="buttonWrap">
          <a class="reset"  href="/index">
            <p>Cancelar</p>
          </a>
        </div>
      </div>

    </form>

  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/administrar-carousel-dos.js') }}"></script>


  @endsection
