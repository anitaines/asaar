@extends("layouts.app")

@section("meta-description")
  "Últimas noticias de la Asociación Asperger Argentina"
  @endsection

@section("title")
  Noticias -
  @endsection

@section('css')
  <link rel="stylesheet" href="/css/stylesResp.css?v={{$cssVersion}}">
@endsection

@section('content')

  <div class="container_contacto container_noticias">

    <main class="main_contacto main_noticias">

      <h1 class="h1_aspergerCEA h1_congresos">Noticias</h1>

      <div class="wrap_noticias_all">

        @foreach ($noticiasAll as $key => $value)
          <div class="wrap_noticias_item">
            <a href="/noticia/{{$value->id}}/{{$value->slug}}">
              @if ($value->imagenNoticia == "si")
                  <div class="imagen" style="background-image: url('/storage/noticias/imagenesMain/thumbnails/{{$value->imagen}}');
                  background-repeat: no-repeat;
                  background-size: cover;
                  background-position: center;"></div>
              @else
                  <div class="imagen" style="background-color: {{$colores[rand(0,3)]}};"></div>
              @endif

              @php
                $fecha = Carbon\Carbon::parse($value->created_at)->locale('es');
              @endphp
              <div class="info">
                <p class="fecha">Fecha de publicación: {{$fecha->isoFormat('D-MMMM-YYYY')}}</p>
                <p class="titulo">{{$value->title}}</p>
                <p class="subtitulo">{{$value->subtitle}}</p>
                <div class="contenido-container">
                  @php
                    $lineasParrafo = explode("\n",$value->content);
                  @endphp
                  @if (count($lineasParrafo) > 5)
                    @for ($i=0; $i < 5; $i++)
                      <p class="contenido">{{$lineasParrafo[$i]}}</p>
                    @endfor
                  @else
                    @for ($i=0; $i < count($lineasParrafo); $i++)
                      <p class="contenido">{{$lineasParrafo[$i]}}</p>
                    @endfor
                  @endif
                </div>
              </div>

              <p class="ampliar">Ver noticia</p>
            </a>
          </div>
        @endforeach

        <a class="a_archivo" href="http://asperger.org.ar/" target="_blank" rel="noreferrer"><div class="archivo">Acceder a nuestro archivo de noticias</div></a>


      </div>

      {{-- {{ $noticiasAll->links() }} --}}

    </main>

  </div>
  @endsection
