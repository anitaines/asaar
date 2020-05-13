@extends("layouts.appAdmin")

@section("title")
  Administrar carousel -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <main class="admin carousel">
    {{-- @dd($errors) --}}

    <h4>Noticias actualmente en el carrusel de inicio:</h4>

    @if (count($carouselActual) > 3)
      <p>El carrusel tiene más de 3 noticias, por favor considerar reducir la cantidad.</p>
    @elseif (count($carouselActual) == 0)
      <p>No hay noticias en el carrusel.</p>
    @endif

    <div class="carouselActual">
      @foreach ($carouselActual as $key => $value)
        <div class="carouselItem">
          <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$value->carousel}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;"></div>
          <div class="carouselInfo">
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
              <p>{{$value->title}}</p>
            </a>
            <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
          </div>
        </div>
      @endforeach
    </div>


    <form class="" action="/administrar-carousel" method="post" autocomplete="off">
      @csrf
      <div class="accion">

        <div class="eliminar">

          <div class="botonEliminar">
            <a>
              <p>Eliminar noticias</p>
              <p>del carrusel</p>
            </a>
          </div>

          <div class="itemsEliminar">
            @foreach ($noticiasAll as $key => $value)
              @if ($value->carousel != null)
              <div class="accionItem">
                <div class="accionInfo">
                  <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                    <p>{{$value->title}}</p>
                  </a>
                  <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
                </div>
                <div class="input">
                  <label class="checkbox-label"> Eliminar
                    <input type="checkbox" name="eliminarNoticiaCarousel[]" value="{{$value->id}}">
                    <span class="checkbox-custom">✓</span>
                  </label>
                </div>
              </div>
              @endif
            @endforeach
          </div>
        </div>

        <div class="agregar">

          <div class="botonAgregar">
            <a>
              <p>Agregar noticias</p>
              <p>al carrusel</p>
            </a>
          </div>

          <div class="imagenesDisponibles" style="display: none;">
            <p>Elegir imagen para carousel:</p>
            <div class="imagenesDisponiblesWrap">
              @foreach ($carouselImagenes as $keyImagen => $valueImagen)
                <label> Elegir
                  <input type="radio" name="agregarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}">
                  <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center; height: 100px;"></div>
                </label>
              @endforeach
            </div>
          </div>

          <div class="itemsAgregar">
            @foreach ($noticiasAll as $key => $value)
              @if ($value->carousel == null && $value->id > 0 && $value->id < 5 )
              <div class="accionItem">
                <div class="accionInfo">
                  <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
                    <p>{{$value->title}}</p>
                  </a>
                  <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
                </div>
                <div class="input">
                  <label class="checkbox-label"> Agregar
                    {{-- <input type="checkbox" name="agregarNoticiaCarousel[]" value="{{$value->id}}"> --}}
                    <input type="checkbox" name="" value="">
                    <span class="checkbox-custom">✓</span>
                  </label>
                </div>
              </div>
              {{-- <div class="imagenesDisponibles">
                <p>Elegir imagen para carousel:</p>
                <div class="imagenesDisponiblesWrap">
                  @foreach ($carouselImagenes as $keyImagen => $valueImagen)
                    <label> Elegir
                      <input type="radio" name="agregarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}">
                      <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
                      background-repeat: no-repeat;
                      background-size: cover;
                      background-position: center; height: 100px;"></div>
                    </label>
                  @endforeach
                </div>
              </div> --}}
            @endif
          @endforeach

          </div>

        </div>

      </div>

      <div class="buttonWrap">
        <a class="reset"  href="/index">
          <p>Cancelar</p>
        </a>
      </div>
      <div class="buttonWrap">
        <button class="save"  type="submit">
          <p>Guardar cambios</p>
          {{-- <p>Procesando</p> --}}
        </button>
      </div>
      </form>


  </main>


  @endsection
