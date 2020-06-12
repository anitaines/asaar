@extends("layouts.appAdmin")

@section("title")
  Generar noticias -
  @endsection

@section('content')

  <main class="admin success">

    <h4>La noticia se publicó correctamente.</h4>

    <p>¿Agregar la noticia al carousel de noticias de la página de inicio?</p>

    <div class="buttons">
      <a href="/control-panel">
        <div class="button no">
          NO
        </div>
      </a>
      <a href="/administrar-carousel">
        <div class="button si">
          SÍ
        </div>
      </a>
    </div>

  </main>

  @endsection
