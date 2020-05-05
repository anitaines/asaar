@extends("layouts.app")

@section("title")
  Noticias -
  @endsection

{{-- @section('defer')

  @endsection --}}

@section('content')

  <div class="container_contacto container_noticias">

    <main class="main_contacto main_noticias">

      <h1 class="h1_aspergerCEA h1_congresos">Noticias</h1>

      <div class="wrap_noticias_all">

        {{-- @for ($i=0; $i < count($noticiasAll); $i++) --}}
        @foreach ($noticiasAll as $key => $value)
          <a href="/noticias/{{$value['id']}}/{{$value['slug']}}">
          <div class="wrap_noticias_item">
          @if ($value['imagenNoticia'] == "si")
              <div class="con_imagen" style="background-image: url('/storage/noticias/imagenesMain/{{$value['imagen']}}');
              background-repeat: no-repeat;
              background-size: cover;
              background-position: center;
              filter: {{$value['filtroImagen']}};"></div>
              <div class="info">
                <p>{{$value['title']}}</p>
                <p>{{$value['subtitle']}}</p>
              </div>
            @else
              <div class="sin_imagen" style="background-color: {{$colores[rand(0,3)]}};">
                <p>{{$value['title']}}</p>
              </div>
              <div class="info">
                <p>{{$value['subtitle']}}</p>
              </div>
            @endif
            <p>leer</p>


          </div>
          </a>
        @endforeach

      </div>

    </main>

  </div>
  @endsection
