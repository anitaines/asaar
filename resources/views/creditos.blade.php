@extends("layouts.app")

@section("meta-description")
  "Información sobre las imágenes usadas en el sitio web"
  @endsection

@section("title")

  @endsection

@section('css')
  <link rel="stylesheet" href="/css/stylesResp.css?v={{$cssVersion}}">
@endsection

@section('content')

  <div class="container_contacto container_creditos">

    <h4>Información sobre las imágenes e íconos usados en este sitio web:</h4>

    <main class="main_contacto main_creditos">

      <p>Imágenes institucionales Home:</p>
      <div class="">
        <a href="https://www.freepik.com/free-photos-vectors/people" target="_blank" rel="noreferrer">People photo created by rawpixel.com - www.freepik.com</a>
      </div>

      <div class="">
        <a href="https://www.freepik.com/free-photos-vectors/blue" target="_blank" rel="noreferrer">Blue photo created by freepik - www.freepik.com</a>
      </div>

      <p>Imágenes slideshow Home e imágenes Noticias:</p>
      <div class="">
        <a href="http://absfreepic.com/" target="_blank" rel="noreferrer">absfreepic.com</a>
      </div>

      <div class="">
        <a href="https://uigradients.com/" target="_blank" rel="noreferrer">uiGradientes - uigradients.com</a>
      </div>

      <div class="">
        <a href="http://www.subtlepatterns.com" target="_blank" rel="noreferrer">Background pattern from Toptal Subtle Patterns</a>
      </div>

      <div class="">
        <a href="https://altphotos.com/" target="_blank" rel="noreferrer">ALTPHOTOS - altphotos.com</a>
      </div>

      <p>Íconos Redes Sociales:</p>
      <div class="">
        <a href="http://www.flaticon.com" target="_blank" rel="noreferrer">Icon made by Freepik from www.flaticon.com</a>
      </div>

      <div class="">
        <a href="https://fontawesome.com/" target="_blank" rel="noreferrer">Fontawesome -  www.fontawesome.com</a>
      </div>

      <div class="volver">
        <a  class="" href="/"> << Volver </a>
      </div>

    </main>

  </div>

@endsection
