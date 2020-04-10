<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Asociación Asperger Argentina - Contacto</title>
  </head>
  <body>

    <div class="">
      <p>Mensaje enviado a través del formulario de contacto del sitio web:</p>
      <p>.................</p>
      <p>From: {{ trim($email->email) }}</p>
      <p>Nombre: {{ trim($email->name) }}</p>
      <p>Teléfono: {{ trim($email->telephone) }}</p>
      <p>Mensaje:</p>
      {{-- <p>{{ $email->message }}</p> --}}
      @php
        $contenido = explode("\n",trim($email->message));
        @endphp

      @foreach ($contenido as $key => $value)
        <p>{{$value}}</p>
        @endforeach
      </div>

  </body>
</html>
