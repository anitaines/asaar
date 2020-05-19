@extends("layouts.appAdmin")

@section("title")
  Administrar carousel -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin carousel">
    {{-- @dd($errors) --}}

    <h4>Noticias actualmente en el carrusel de inicio: {{count($carouselActual)}}</h4>

    @if (count($carouselActual) > 3)
      <p>El carrusel tiene más de 3 noticias, por favor considerar reducir la cantidad.</p>
    @elseif (count($carouselActual) == 0)
      <p>No hay noticias en el carrusel.</p>
    @endif

    <div class="carouselActual">
      @foreach ($carouselActual as $key => $value)
        <div class="carouselItem inCarousel">
          <input type="hidden" name="" value="{{$value->carousel}}">
          <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$value->carousel}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;"></div>
          <div class="carouselInfo">
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
              <p>{{$value->title}}</p>
            </a>
            <p style="display:none;">Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
            <label> Noticia nro.
              <input type="text" name="" value="{{$value->id}}" disabled>
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
    </div>

    {{-- <div class="imagenesAll" style="display: none;">
        @foreach ($carouselImagenes as $key => $value)
          <input type="hidden" name="" value="{{$value->name}}" disabled>
        @endforeach
    </div> --}}


    <form class="" action="/administrar-carousel" method="post" autocomplete="off">
      @csrf

      <div class="noticiasWrap">

        <div class="noticiasHead">
          <a>
            <p>Listado de noticias:</p>
            {{-- <p></p> --}}
          </a>
        </div>

        <div class="noticias">
          @foreach ($noticiasAll as $key => $value)

            <div class="noticiasItem">
              <input type="hidden" name="" value="{{$value->carousel}}">
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
              <div class="inputs">
                @if ($value->carousel == null)
                  <label class="checkbox-label"> Agregar
                    <input type="checkbox" name="" value="">
                    <span class="checkbox-custom">✓</span>
                  </label>
                @else
                  <label class="checkbox-label" style="opacity:0;"> Agregar
                    <input type="checkbox" name="" value="" disabled>
                    <span class="checkbox-custom">✓</span>
                  </label>
                @endif

                @if ($value->carousel != null)
                  <label class="checkbox-label"> Eliminar
                    <input type="checkbox" name="modificarNoticiaCarousel[{{$value->id}}]" value="null">
                    <span class="checkbox-custom">✓</span>
                  </label>
                @else
                  <label class="checkbox-label" style="opacity:0;"> Eliminar
                    <input type="checkbox" name="modificarNoticiaCarousel[{{$value->id}}]" value="null" disabled>
                    <span class="checkbox-custom">✓</span>
                  </label>
                @endif

                @if ($value->carousel != null)
                  <label class="checkbox-label"> Modificar imagen
                    <input type="checkbox" name="" value="">
                    <span class="checkbox-custom">✓</span>
                  </label>
                @else
                  <label class="checkbox-label" style="opacity:0;"> Modificar imagen
                    <input type="checkbox" name="" value="" disabled>
                    <span class="checkbox-custom">✓</span>
                  </label>
                @endif
              </div>
            </div>
            {{-- adentro del foreach noticia, afuera del item noticia --}}

            {{-- <div class="imagenesDisponibles" style="display: none;"> --}}
            <div class="imagenesDisponibles" style="opacity: 0;">
              <p>Elegir imagen para carousel:</p>
              <div class="imagenesDisponiblesWrap">
                @foreach ($carouselImagenes as $keyImagen => $valueImagen)
                  <label>
                    {{-- @if ($value->carousel == $valueImagen->name)
                      <input type="radio" name="modificarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}" checked>
                    @else --}}
                      <input type="radio" name="modificarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}">
                    {{-- @endif --}}
                    <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center; height: 100px;"></div>
                  </label>
                @endforeach
              </div>
            </div>

          @endforeach
        </div>
      </div>
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
  <script src="{{ asset('js/administrar-carousel.js') }}"></script>


  @endsection
