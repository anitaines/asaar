@extends("layouts.app")

@section("title")
  Donar -
  @endsection

@section('content')
  <div class="container_contacto container_donar">

    <h1 class="h1_aspergerCEA">Donar</h1>

    <main class="main_donar">

      <div class="donar_texto">
        <p>Hoy te pedimos que <b>ayudes a la Asociación Asperger Argentina.</b></p>
        <p> Nos sostenemos gracias a las donaciones de poco menos de $100.- y para proteger nuestra independencia, nunca verás avisos publicitarios.</p>
        <p>Solo unos pocos de nuestros lectores donan.</p>
        <p>¡Ahora es el momento de pedirte algo!</p>
        <p><b>Si todos los que están leyendo esto, ahora donaran $80.-, nuestra campaña de recaudación de fondos finalizaría en una hora. Tan simple como eso: lo único que necesitamos es el valor de un café.</b></p>
        <p>Somos una Asociación sin fines de lucro con necesidad de crecer para ofrecerles a ustedes un lugar de pertenencia: <b>nuestra SEDE.</b></p>
        <p>Si la Asociación Asperger Argentina te resulta útil, por favor tomate un minuto para ayudarnos a seguir creciendo.</p>
        <p><b>¡Muchas gracias!</b></p>
      </div>

      <div class="donar_opciones">
        <h3 class="h3_aspergerCEA">Opciones de pago</h3>

        <div class="opcion">
          <div class="titulo_opcion">
            <a href="/donar">Pago Fácil</a>
            <p>▼</p>
            {{-- <p>Pago Fácil</p> --}}
          </div>
          <div class="detalle_opcion detalle_opcion_display">
            <p>Para ello deberá enviar un mail a <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><u>administracion@asperger.org.ar</u></a> solicitando la credencial de pago indicando:<br>
              Nombre y apellido, Tipo y Nº de documento, Localidad. <br>
              Dicha credencial le será enviada por mail.</p>
          </div>
        </div>

        <div class="opcion">
          <div class="titulo_opcion">
            <a href="/donar">Transferencia bancaria a la cuenta (Banco Credicoop o Banco Ciudad)</a>
            <p>▼</p>
          </div>
          <div class="detalle_opcion detalle_opcion_display">
            <p>(Enviar mail a <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><u>administracion@asperger.org.ar</u></a> comunicando la misma)</p>
            <p><b>A. Banco Credicoop </b><br>
              A nombre de: ASOC CIVIL ASPERGER ARGENTINA <br>
              Cuenta corriente en pesos nro: 006-091315/5 <br>
              CBU: 19100063 55000609131550<br>
              C.U.I.T. 30-70909015-8 </p>
            <p><b>B. Banco Ciudad </b><br>
              A nombre de: ASOCIACION ASPERGER ARGENTINA <br>
              Cuenta corriente en pesos nro.: 1666/5 <br>
              CBU: 02900308 00000000166650 <br>
              C.U.I.T. 30-70909015-8</p>
          </div>
        </div>

        <div class="opcion">
          <div class="titulo_opcion">
            <a href="/donar">Débito automático Visa, Visa (débito) y Mastercard</a>
            <p>▼</p>
          </div>
          <div class="detalle_opcion detalle_opcion_display">
            <p>Enlace a: <a href="https://www.donaronline.org/asociacion-asperger-argentina/ayudanos-a-crecer-donando" target="_blank" rel="noopener noreferrer"><u>https://www.donaronline.org/asociacion-asperger-argentina/ayudanos-a-crecer-donando</u></a></p>
          </div>
        </div>

        <div class="opcion">
          <div class="titulo_opcion">
            <a href="/donar">Débito automático a través de la página de VISA ARGENTINA</a>
            <p>▼</p>
          </div>
          <div class="detalle_opcion detalle_opcion_display">
            <a href="http://www.visa.com.ar/?$ctxid=_1421706147827" target="_blank" rel="noopener noreferrer"><u>http://www.visa.com.ar/?$ctxid=_1421706147827</u></a>
            <p>Instrucciones: <br>
            1. Ángulo superior derecho, selecciona la tarjeta <br>
            2. Datos personales, clave VISA <br>
            3. Operaciones: PAGAR <br>
            4. Pestañas: optar por DONACIONES <br>
            5. Buscar en Fundaciones/ONG: Asociación Asperger Arg <br>
            6. Completar datos y ENVIAR></p>
            <p>Si realizás una donación recurrente, la Asociación Asperger Argentina te cargará esa cantidad hasta que nos solicites cancelarla. Cuando desees cancelar tu donación enviar mail a <a href="mailto:administracion@asperger.org.ar" target="_blank" rel="noopener noreferrer"><u>administracion@asperger.org.ar</u></a>. Te enviaremos un recibo vía correo electrónico por cada pago.</p>
          </div>
        </div>

      </div>

    </main>

    <div class="carousel_colors">
      <div class="green"></div>
      <div class="orange"></div>
      <div class="blue"></div>
    </div>

  </div>

  <script src="{{ asset('js/donar.js') }}"></script>

  @endsection
