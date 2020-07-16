<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Asociación Asperger Argentina - Asociarse</title>
  </head>
  <body>

    <div class="">
      <p>Mensaje enviado a través del formulario de nuevo socio del sitio web:</p>
      <p>.................</p>
      <p>From: {{ $email->email }}</p>
      <p>Nombre: <b>{{ $email->name }}</b></p>
      <p>Apellido: <b>{{ $email->surname }}</b></p>
      <p>Domicilio: {{ $email->address }}</p>
      <p>Localidad: {{ $email->town }}</p>
      <p>Provincia / Estado / Depto: {{ $email->state }}</p>
      <p>País: {{ $email->country }}</p>
      <p>Código postal: {{ $email->cp }}</p>
      <p>Teléfono de contacto: {{ $email->telephone }}</p>
      <p>Nacionalidad: {{ $email->citizenship }}</p>
      <p>Estado civil: {{ $email->maritalStatus}}</p>
      <p>Tipo de documento: {{ $email->id }}</p>
      <p>Número: {{ $email->number }}</p>
      <p>Profesión: {{ $email->profession }}</p>
      <p>Domicilio laboral: {{ $email->businessAddress }}</p>
      <p>Declara conocer el Estatuto de la AsAAr: {{ $email->estatuto }}</p>
      <p>Acepta el pago de la cuota social de $250.- por mes: {{ $email->payment }}</p>
      {{-- <p>Forma de pago: {{ $email->paymentType }}</p> --}}
      </div>

  </body>
</html>
