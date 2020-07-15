@extends("layouts.app")

@section("meta-description")
  "Información sobre la Asociación Asperger Argentina"
  @endsection

@section("title")
  Quiénes somos -
  @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}">
@endsection

@section('content')

  <div class="container_aspergerCEA quienesSomos">

    <nav class="nav_aspergerCEA">
      <div class="link_quienesSomos">
        <a class="a_nav_aspergerCEA" href="#quienesSomos">- QUIÉNES SOMOS</a>
      </div>
      <div class="link_mision">
        <a class="a_nav_aspergerCEA" href="#mision">- NUESTRA MISIÓN Y VISIÓN</a>
      </div>
      <div class="link_autoridades">
        <a class="a_nav_aspergerCEA" href="#autoridades">- AUTORIDADES</a>
      </div>
      <div class="link_ayudar">
        <a class="a_nav_aspergerCEA" href="#ayudar">- CÓMO AYUDAR</a>
      </div>
      <div class="link_diptico">
        <a class="a_nav_aspergerCEA" href="#diptico">- DÍPTICO</a>
      </div>
    </nav>



    {{-- QUIÉNES SOMOS   --}}
    <main id="quienesSomos" class="main_aspergerCEA intro_quienesSomos">
      <h1 class="h1_aspergerCEA h1_quienesSomos">Quiénes somos</h1>
      <div class="container1_aspergerCEA">

          <p class="p_aspergerCEA">La <b>Asociación Asperger Argentina</b> (AsAAr) es una <b>organización sin fines de lucro</b> con personería jurídica, aprobada en IGJ el 14 de noviembre de 2003. Surgió por inquietud de un <b>grupo de padres</b> que, al haber tomado conocimiento de la situación en la que estaban inmersos sus hijos, decidieron organizarse en pos del bienestar de las personas con el síndrome. Asimismo, <b>la Asociación se propone orientar y contener a aquellos padres que tienen “sospechas”, o que han recibido recientemente el diagnóstico de alguno de sus hijos o propio</b>. Un diagnóstico precoz es la clave para que las familias puedan seleccionar los pasos a seguir y los apoyos necesarios a temprana edad y, de esta forma, tener una mejor calidad de vida. La <b>AsAAr acompaña a las familias brindando asesoramiento, información y contención</b>; y compartiendo experiencias en un plano de igualdad entre todas las familias unidas por una misma circunstancia de vida.</p>

        </div>

        <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
        </div>
    </main>

    {{-- NUESTRA MISIÓN Y VISIÓN --}}
    <main id="mision" class="main_aspergerCEA main_mision">
        <h2 class="h1_aspergerCEA h1_mision">Nuestra misión y visión</h2>

        <div class="container1_aspergerCEA">

            <p class="p_aspergerCEA">Es central en nuestro quehacer la <b>concreción de actividades con profesionales experimentados en el tema</b>, en distintos encuadres y propuestas (capacitaciones, charlas, jornadas, congresos, etc.); y los <b>talleres para padres</b> en los que se comparten testimonios, aprendizajes y estrategias.</p>

            <p class="p_aspergerCEA">Ser parte de la Asociación implica conformar un espacio pluralista donde todos nos ayudamos en el proceso de colaborar con una visión positiva, socializando lo aprendido para promover la búsqueda de herramientas y recursos.</p>

            <p class="p_aspergerCEA">AsAAr no es un centro terapéutico ni brinda tratamientos.</p>

            <p class="p_aspergerCEA">No existen dos personas con </b>Síndrome de Asperger</b> iguales, y cada una de ellas tiene sus peculiaridades, que han de tenerse en cuenta a la hora de evaluaciones diagnósticas o de la recomendación de abordajes terapéuticos. Y esto necesariamente debe hacerse de forma personal, a partir de entrevistas con el individuo y su familia. Por lo tanto, advertimos enfáticamente y sugerimos desconfiar de quien es capaz de hacer una intervención a una persona con Síndrome de Asperger sin tener un contacto directo con ella. Lo que pueda ser válido para una persona puede no serlo para otra.</p>

            <p class="p_aspergerCEA"><b>Nuestra labor voluntaria tiene por objetivo brindar información sobre asociaciones de familias, centros de terapias, profesionales o escuelas</b>, a modo de datos y no, de una recomendación. Será la familia, en primera instancia, quien deberá decidir si ese centro, profesional, asociación o escuela, cumple con las expectativas que la familia busca y/o necesita.</p>

            <p class="p_aspergerCEA">A lo largo de todos estos años de existencia hemos plasmado numerosas acciones tendientes a informar y sensibilizar a la comunidad, a crear conciencia, a promover la inclusión en la educación y el trabajo, y a respetar los derechos y la calidad de vida de nuestros seres queridos. Nuestra Asociación confía en el poder de las redes, en la solidaridad y en la capacidad de amar y comprender al otro.</p>

            <p class="p_aspergerCEA">Somos parte integrante del <a href="https://grupoart24.org/"  target="_blank" rel="noreferrer">Grupo Art. 24 por la Educación Inclusiva</a>, que actualmente cuenta en su red con más de 130 organizaciones de la sociedad civil a nivel nacional; y de <a href="http://redea.org.ar/" target="_blank" rel="noreferrer">Red Espectro Autista (RedEA)</a>, conformado por organizaciones de padres y profesionales, comprometidas en el área de la salud.</p>

          </div>

          <a href="/asperger-cea"><p class="p_aspergerCEA button_quienesSomos">Qué es el Asperger y CEA?</p></a>

          <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
          </div>
    </main>

    {{-- AUTORIDADES --}}
    <main id="autoridades" class="main_aspergerCEA main_autoridades">
        <h2 class="h1_aspergerCEA h1_autoridades">Autoridades</h2>
        <h3 class="h3_aspergerCEA">Comisión Directiva</h3>

        <div class="comisionDirectiva">

            <div class="card_container">
              <img src="/media/autoridades/lopez.jpg" alt="Sra. Andrea Alejandra Lopez">
              <div class="">
                <p class="p_aspergerCEA">Sra. Andrea Alejandra Lopez</p>
                <p class="p_aspergerCEA">Presidente</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/hemsi.jpg" alt="Lic.Viviana Raquel Hemsi">
              <div class="">
                <p class="p_aspergerCEA">Lic.Viviana Raquel Hemsi</p>
                <p class="p_aspergerCEA">Secretaria</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/ocello.jpg" alt="Dra. Estela Iluminada Ocello">
              <div class="">
                <p class="p_aspergerCEA">Dra. Estela Iluminada Ocello</p>
                <p class="p_aspergerCEA">Tesorera</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/mira.jpg" alt="Arq. Eduardo Marcelo Mira">
              <div class="">
                <p class="p_aspergerCEA">Arq. Eduardo Marcelo Mira</p>
                <p class="p_aspergerCEA">Vocal Titular 1°</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/spasaro.jpg" alt="Sr. Francisco Orlando Spasaro">
              <div class="">
                <p class="p_aspergerCEA">Sr. Francisco Orlando Spasaro</p>
                <p class="p_aspergerCEA">Vocal Titular 2°</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/santos.jpg" alt="Sr. Segundo de los Santos">
              <div class="">
                <p class="p_aspergerCEA">Sr. Segundo de los Santos</p>
                <p class="p_aspergerCEA">Vocal Suplente 1°</p>
              </div>
            </div>

            <div class="card_container">
              <img src="/media/autoridades/livovich.jpg" alt="">
              <div class="Sra. Elena Adriana Livovich">
                <p class="p_aspergerCEA">Sra. Elena Adriana Livovich</p>
                <p class="p_aspergerCEA">Vocal Suplente 2°</p>
              </div>
            </div>

            </div>

          <h3 class="h3_aspergerCEA">Órgano de Fiscalización</h3>

          <div class="comisionDirectiva fiscalizacion">

            <div class="card_container">
              <p class="p_aspergerCEA">Sr. Julio Cesar Gómez</p>
              <p class="p_aspergerCEA">Revisor de Cuentas Titular</p>
            </div>
            <div class="card_container">
              <p class="p_aspergerCEA">Sr. Fernando Aníbal Bergman</p>
              <p class="p_aspergerCEA">Revisor de Cuentas Suplente 1°</p>
            </div>
            <div class="card_container">
              <p class="p_aspergerCEA">Dra. María Sofía Bruno</p>
              <p class="p_aspergerCEA">Revisor de Cuentas Suplente 2°</p>
            </div>

          </div>

          <h3 class="h3_aspergerCEA">Subcomisiones</h3>

          <div class="subcomisiones">

            <div class="subcomision">
              <h3 class="h3_aspergerCEA">Comisión de Eventos</h3>

              <div class="card_container">
                <p class="p_aspergerCEA">Elena Livovich</p>
              </div>
              <div class="card_container">
                <p class="p_aspergerCEA">Patricia Iglesias</p>
              </div>
            </div>

            <div class="subcomision">
              <h3 class="h3_aspergerCEA">Comisión de Diseño</h3>

              <div class="card_container">
                <p class="p_aspergerCEA">Celeste</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Majo</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Cecilia</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Yésica</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Jazmín</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Juan Pablo</p>
              </div>
              <div class="card_container">
                  <p class="p_aspergerCEA">Ale</p>
              </div>
            </div>

            <div class="subcomision">
              <h3 class="h3_aspergerCEA">Comisión de Grupos</h3>

              <div class="card_container">
                <p class="p_aspergerCEA">Viviana Hemsi</p>
              </div>
              <div class="card_container">
                <p class="p_aspergerCEA">Débora Miranda</p>
              </div>
            </div>

            <div class="subcomision">
              <h3 class="h3_aspergerCEA">Comisión de Administración</h3>

              <div class="card_container">
                <p class="p_aspergerCEA">Estela Ocello</p>
              </div>
            </div>

          </div>

          <a href="/actividades"><p class="p_aspergerCEA button_quienesSomos">Conocé nuestras actividades</p></a>

          <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
          </div>

    </main>

    {{-- COMO AYUDAR --}}
    <main id="ayudar" class="main_aspergerCEA main_ayudar">
      <h2 class="h1_aspergerCEA h1_ayudar">Cómo ayudar</h2>

      <h3 class="h3_aspergerCEA">Ayudanos a crecer, DONANDO</h3>

      <p class="p_aspergerCEA">NUESTRA ASOCIACIÓN necesita dar un paso enorme: contar con UNA SEDE PROPIA.</p>

      <p class="p_aspergerCEA">Para eso, te pedimos que colabores con nosotros, mediante una simple donación, así podremos concretar este proyecto con el cual mejoraremos la asistencia y contención que damos a quienes se acercan a la Asociación.</p>

      <a href="/donar"><p class="p_aspergerCEA button_quienesSomos">Si deseas colaborar, hacé clic aquí y sumate a la campaña</p></a>

      <h3 class="h3_aspergerCEA">¡MUCHAS GRACIAS!</h3>

      <div class="carousel_colors">
        <div class="green"></div>
        <div class="orange"></div>
        <div class="blue"></div>
      </div>

    </main>

    {{-- DIPTICO --}}
    <main id="diptico" class="main_aspergerCEA main_diptico">

      <h2 class="h1_aspergerCEA h1_diptico">Díptico</h2>

        <p class="p_aspergerCEA">Este es el <b>Díptico de la Asociación</b> <i>(Para imprimirlo, luego de abrirlo hacer clic derecho -> Imprimir).</i></p>

        <a href="/media/diptico/diptico-AsAAr-final.pdf" target="_blank"><p class="p_aspergerCEA button_quienesSomos">Ver Díptico online</p></a>

        <p class="p_aspergerCEA">También está disponible en formato JPG (clic en cada imagen para verlas en tamaño completo):</p>

        <div class="img_diptico">
          <a href="/media/diptico/Diptico-2016-para-difundir-frente.jpg" target="_blank"><img src="/media/diptico/Diptico-2016-para-difundir-frente.jpg" alt="Díptico Asociación 1"></a>
          <a href="/media/diptico/Diptico-2016-para-difundir.jpg" target="_blank"><img src="/media/diptico/Diptico-2016-para-difundir.jpg" alt="Díptico Asociación 2"></a>
        </div>

    </main>

    <main class="main_aspergerCEA">
        <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
        </div>
    </main>

  </div>
  @endsection

  @section("scripts")

    <script src="{{ asset('js/linksQuienesSomos.js') }}"></script>

  @endsection
