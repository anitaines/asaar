@extends("layouts.app")

@section("title")
  Actividades -
  @endsection

@section('css')
  <link rel="stylesheet" href="{{asset('/css/stylesResp.css')}}">
@endsection

@section('content')

  <div class="container_aspergerCEA container_actividades">

    <nav class="nav_aspergerCEA">
      <div class="link_congresos">
        <a class="a_nav_aspergerCEA" href="#congresos">- JORNADAS Y CONGRESOS</a>
      </div>
      <div class="link_debates">
        <a class="a_nav_aspergerCEA" href="#debates">- CHARLAS/ DEBATES</a>
      </div>
      <div class="link_taller">
        <a class="a_nav_aspergerCEA" href="#taller">- TALLER DE PADRES</a>
      </div>
      <div class="link_grupos">
        <a class="a_nav_aspergerCEA" href="#grupos">- GRUPOS DE PERTENENCIA</a>
      </div>
    </nav>



    {{-- JORNADAS Y CONGRESOS   --}}
    <main id="congresos" class="main_aspergerCEA main_intervenciones main_congresos">
      <h1 class="h1_aspergerCEA h1_congresos">Nuestras Actividades</h1>
      <h2 class="h1_aspergerCEA">Jornadas y Congresos</h2>

      <p class="p_aspergerCEA">Con el propósito de difundir información acerca del Síndrome de Asperger la AsAAr organización y continúa organizando Jornadas destinadas a Padres, Maestros, Profesionales de la salud y la educación y cualquier persona interesada en informarse acerca del SA. Tenemos el privilegio de contar con la participación de distinguidos especialistas a quienes agradecemos por toda su colaboración.</p>

      <h3 class="h3_aspergerCEA"><a href="https://www.youtube.com/playlist?list=PLHN3RoZSVRtQZsIbrO9aDdMjAise5WPEE" target="_blank" rel="noreferrer">Jornada en Salta sobre Síndrome de Asperger</a></h3>

      <div class="detalle_box_diagnosticos">
        <p class="p_aspergerCEA">- Dr. Ernesto Wahlberg</p>
        <p class="p_aspergerCEA">- Lic. Noemí Dominiani</p>
        <p class="p_aspergerCEA">- Sr. Rodolfo Geloso</p>
        <p class="p_aspergerCEA">- Actividades de los Grupos de Padres en Jujuy y Salta</p>
        <p class="p_aspergerCEA">- Mg. Verónica Martorello</p>
        <p class="p_aspergerCEA">- Lic. Elizabeth Guerrero Alvarado</p>
      </div>

      <div class="box_diagnosticos">

          <div class="intervenciones_container">

            <div class="iframe_poster">
              <div class="fake_play">&#9658;</div>
              </div>
            <div class="iframe_intervenciones">

            {{-- <iframe class="iframe_intervenciones" width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$playlistHabilidades["items"][0]["snippet"]["resourceId"]["videoId"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

              </div>

            <div class="intervenciones_list_container">

              @for ($i=0; $i < count($playlistSalta["items"]); $i++)
                <div class="intervenciones_list_item itemHabilidades">
                  <a class="a_intervenciones_list_item" href="https://www.youtube-nocookie.com/embed/{{$playlistSalta["items"][$i]["snippet"]["resourceId"]["videoId"]}}" target="_blank" rel="noreferrer">{{$i + 1}}. {{$playlistSalta["items"][$i]["snippet"]["title"]}}</a>
                </div>
                @endfor

              </div>
            </div>

          </div>

          <h3 class="h3_aspergerCEA"><a href="https://www.youtube.com/playlist?list=PLHN3RoZSVRtRV7qVYw8ruPatszi5axUPf" target="_blank" rel="noreferrer">8º Jornada sobre Síndrome de Asperger</a></h3>

          <div class="detalle_box_diagnosticos">
            <p class="p_aspergerCEA"><b>Panel «SER ADOLESCENTE – Una etapa de cambios»</b></p>
            <p class="p_aspergerCEA">- Dra. Nora Grañana</p>
            <p class="p_aspergerCEA">- Dra. Alexia Rattazzi</p>
            <p class="p_aspergerCEA"><b>Panel «SER SOCIAL con Síndrome de Asperger»</b></p>
            <p class="p_aspergerCEA">- Dr. Christian Plebst</p>
            <p class="p_aspergerCEA">- Lic. María Estefanía Millán</p>
            <p class="p_aspergerCEA">- Lic. Andrea Larroulet</p>
            <p class="p_aspergerCEA">- Lic. Natalia Bogado</p>
            <p class="p_aspergerCEA"><b>Panel «Familia, conductas, límites y educación en adolescentes con SA»</b></p>
            <p class="p_aspergerCEA">- Dra. Célica Menéndez</p>
            <p class="p_aspergerCEA">- Li. María Pía Espoueys</p>
            <p class="p_aspergerCEA">- Lic. Mauro Mascotena</p>
          </div>

      <div class="box_diagnosticos">

          <div class="intervenciones_container">

            <div class="iframe_poster">
              <div class="fake_play">&#9658;</div>
              </div>
            <div class="iframe_intervenciones">

            {{-- <iframe class="iframe_intervenciones" width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$playlistHabilidades["items"][0]["snippet"]["resourceId"]["videoId"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

              </div>

            <div class="intervenciones_list_container">

              @for ($i=0; $i < count($playlistJornada8["items"]); $i++)
                <div class="intervenciones_list_item itemHabilidades">
                  <a class="a_intervenciones_list_item" href="https://www.youtube-nocookie.com/embed/{{$playlistJornada8["items"][$i]["snippet"]["resourceId"]["videoId"]}}" target="_blank" rel="noreferrer">{{$i + 1}}. {{$playlistJornada8["items"][$i]["snippet"]["title"]}}</a>
                </div>
                @endfor

              </div>
            </div>
          </div>

          <h3 class="h3_aspergerCEA"><a class="a_box_aspergerCEA" href="https://www.youtube.com/playlist?list=PLHN3RoZSVRtRV7qVYw8ruPatszi5axUPf" target="_blank" rel="noreferrer">7º Jornada sobre Síndrome de Asperger</a></h3>

          <div class="detalle_box_diagnosticos">
            <p class="p_aspergerCEA"><b>Panel Psico-Social:</b></p>
            <p class="p_aspergerCEA">- Dr Ernesto Wahlberg</p>
            <p class="p_aspergerCEA">- Lic. Blanca Núñez</p>
            <p class="p_aspergerCEA"><b>Panel de Salud</b></p>
            <p class="p_aspergerCEA">- Lic. Alexia Rattazzi</p>
            <p class="p_aspergerCEA">- Dr. Miguel Angel García Coto</p>
            <p class="p_aspergerCEA"><b>Panel de Tratamientos</b></p>
            <p class="p_aspergerCEA">- Psicopedagogía: Lic Lucia Spraggon</p>
            <p class="p_aspergerCEA">- Fonoaudiología: Lic. Nora Ricciardi</p>
            <p class="p_aspergerCEA">- Terapia ocupacional con orientación en integración sensorial: Lic. Maria Rosa Nico</p>
          </div>

      <div class="box_diagnosticos">

          <div class="intervenciones_container">

            <div class="iframe_poster">
              <div class="fake_play">&#9658;</div>
              </div>
            <div class="iframe_intervenciones">

            {{-- <iframe class="iframe_intervenciones" width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$playlistHabilidades["items"][0]["snippet"]["resourceId"]["videoId"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

              </div>

            <div class="intervenciones_list_container">

              @for ($i=0; $i < count($playlistJornada7["items"]); $i++)
                <div class="intervenciones_list_item itemHabilidades">
                  <a class="a_intervenciones_list_item" href="https://www.youtube-nocookie.com/embed/{{$playlistJornada7["items"][$i]["snippet"]["resourceId"]["videoId"]}}" target="_blank" rel="noreferrer">{{$i + 1}}. {{$playlistJornada7["items"][$i]["snippet"]["title"]}}</a>
                </div>
                @endfor

              </div>
            </div>
          </div>

        <h3 class="h3_aspergerCEA"><a class="a_box_aspergerCEA" href="https://www.youtube.com/playlist?list=PLHN3RoZSVRtTftSvQeeqDLRfIFCo7aVp4" target="_blank" rel="noreferrer">6º Jornada sobre Síndrome de Asperger</a></h3>

        <div class="detalle_box_diagnosticos">
          <p class="p_aspergerCEA"><b>Panel de Salud</b></p>
          <p class="p_aspergerCEA">- Lic. Gabriel Grivel</p>
          <p class="p_aspergerCEA">- Dra. Alexia Rattazzi</p>
          <p class="p_aspergerCEA">- Dra. Alba A. Richaudeau</p>
          <p class="p_aspergerCEA"><b>Panel de Interacción Social</b></p>
          <p class="p_aspergerCEA">- Lic. Sandra Zarratea</p>
          <p class="p_aspergerCEA">- Dra. Flavia Sinigagliesi</p>
          <p class="p_aspergerCEA">- Lic. Pablo Villagarcia</p>
          <p class="p_aspergerCEA"><b>Panel de Educación</b></p>
          <p class="p_aspergerCEA">- Lic. Gabriel Grivel</p>
          <p class="p_aspergerCEA">- Prof. Cecilia Williams</p>
          <p class="p_aspergerCEA">- ADDEI</p>
          <p class="p_aspergerCEA">- Lic. Mauricio Martínez</p>
        </div>

      <div class="box_diagnosticos">

          <div class="intervenciones_container">

            <div class="iframe_poster">
              <div class="fake_play">&#9658;</div>
              </div>
            <div class="iframe_intervenciones">

            {{-- <iframe class="iframe_intervenciones" width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$playlistHabilidades["items"][0]["snippet"]["resourceId"]["videoId"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

              </div>

            <div class="intervenciones_list_container">

              @for ($i=0; $i < count($playlistJornada6["items"]); $i++)
                <div class="intervenciones_list_item itemHabilidades">
                  <a class="a_intervenciones_list_item" href="https://www.youtube-nocookie.com/embed/{{$playlistJornada6["items"][$i]["snippet"]["resourceId"]["videoId"]}}" target="_blank" rel="noreferrer">{{$i + 1}}. {{$playlistJornada6["items"][$i]["snippet"]["title"]}}</a>
                </div>
                @endfor

              </div>
            </div>
        </div>



      <div class="carousel_colors">
        <div class="green"></div>
        <div class="orange"></div>
        <div class="blue"></div>
        </div>
      </main>

    {{-- Charlas/Debates --}}
    <main id="debates" class="main_aspergerCEA main_intervenciones main_debates">
        <h2 class="h1_aspergerCEA h1_debates">Charlas/Debates</h2>

        <div class="container1_aspergerCEA">

            <p class="p_aspergerCEA">Con la firme convicción de que el conocimiento del síndrome brindará mejores oportunidades de inserción social para los afectados y su entorno familiar, es que la Asociación Asperger Argentina ha iniciado un Ciclo de Difusión y Capacitación, bajo la modalidad de CHARLAS-DEBATE. Consideramos que a través de esta modalidad de intercambio dinámico entre panelista y público, resultan más enriquecedores los encuentros y sus conclusiones.</p>

          </div>

          <h3 class="h3_aspergerCEA"><a href="https://www.youtube.com/playlist?list=PLHN3RoZSVRtRL2JsZXX31PBQWQrg3C7zr" target="_blank" rel="noreferrer">Videos charlas/debate</a></h3>

          <div class="detalle_box_diagnosticos">
            <p class="p_aspergerCEA">- Asperger: Explicado por adultos que lo viven</p>
            <p class="p_aspergerCEA">- Integración Escolar (ADEEI)</p>
            <p class="p_aspergerCEA">- El Niño con Asperger y la Educación Inclusiva</p>
            <p class="p_aspergerCEA">- Inserción Laboral</p>
            <p class="p_aspergerCEA">- Asperger: Deconstruyendo Mitos</p>
          </div>


        <div class="box_diagnosticos">

              <div class="intervenciones_container">

                <div class="iframe_poster">
                  <div class="fake_play">&#9658;</div>
                  </div>
                <div class="iframe_intervenciones">

                {{-- <iframe class="iframe_intervenciones" width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{$playlistHabilidades["items"][0]["snippet"]["resourceId"]["videoId"]}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                  </div>

                <div class="intervenciones_list_container">

                  @for ($i=0; $i < count($playlistDebates["items"]); $i++)
                    <div class="intervenciones_list_item itemHabilidades">
                      <a class="a_intervenciones_list_item" href="https://www.youtube-nocookie.com/embed/{{$playlistDebates["items"][$i]["snippet"]["resourceId"]["videoId"]}}" target="_blank" rel="noreferrer">{{$i + 1}}. {{$playlistDebates["items"][$i]["snippet"]["title"]}}</a>
                    </div>
                    @endfor

                  </div>
                </div>
          </div>

          <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
            </div>
      </main>

    {{-- TALLER DE PADRES --}}
    <main id="taller" class="main_aspergerCEA main_taller">
          <h2 class="h1_aspergerCEA h1_taller">Taller de padres</h2>

          <div class="container1_aspergerCEA">

              <p class="p_aspergerCEA">Todos los primeros sábados de cada mes.</p>

              <p class="p_aspergerCEA">Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.</p>

              <p class="p_aspergerCEA">También invitamos a sus hijos: niños, adolescentes y jóvenes adultos, de 13 a 30 años, a participar de nuestros Talleres Recreativos, enviando un mail a grupos@asperger.org.ar para combinar su participación y que puedan compartir un encuentro gratuito.</p>

              <p class="p_aspergerCEA">La Asociación se financia únicamente con las cuotas de sus asociados y las actividades que realiza, por lo que solicitamos, un bono contribución de $ 100.- a fin de colaborar con nuestra institución.</p>

              <p class="p_aspergerCEA">Lugar: LEOPOLDO MARECHAL 1160 (a media cuadra de Ángel Gallardo), CABA.</p>

              <p class="p_aspergerCEA">Informes:</p>
              <p class="p_aspergerCEA">E-mail: <a href="mailto:info@asperger.org.ar">info@asperger.org.ar</a></p>
              <p class="p_aspergerCEA">
              Tel.: (011) 4931-2712 de Lunes a Viernes de 14 a 18 hs.</p>

              <p class="p_aspergerCEA">
              Para saber cuándo será el próximo taller de padres, por favor visitar nuestra sección de <a href="/noticias"><u>NOTICIAS</u></a></p>

            </div>

          <div class="carousel_colors">
            <div class="green"></div>
            <div class="orange"></div>
            <div class="blue"></div>
            </div>

      </main>

    {{-- Grupos de Pertenencia --}}
    <main id="grupos" class="main_aspergerCEA main_grupos">
      <h2 class="h1_aspergerCEA h1_grupos">Grupos de Pertenencia</h2>

      <div class="container1_aspergerCEA">

          <p class="p_aspergerCEA">Uno de los objetivos primordiales de nuestra Asociación desde su inicio, fue la de conformar grupos de chicos, segmentados por edades, a efectos de que éstos logren formar parte de un grupo de pertenencia, en el cual, se genere un ámbito de compañerismo e inclusión.</p>

          <p class="p_aspergerCEA">Con el tiempo, estos grupos se han ido perfeccionando y hoy, luego de cuatro años de conformación de los mismos, tenemos los grupos y coordinadores consolidados para desarrollar de un modo óptimo el funcionamiento de dichos encuentros.</p>

          <p class="p_aspergerCEA">Nuestro objetivo no es que el grupo sea un fin en si mismo, sino que pretendemos que el mismo sirva para que los integrantes adquieran y trabajen las habilidades sociales necesarias, para luego insertarse en grupos sociales más amplios.</p>

          <p class="p_aspergerCEA">Apuntamos a la formación de un grupo de pertenencia, donde los chicos puedan enriquecerse y fortalecer la autoestima. Este espacio social y afectivo les posibilitará utilizar y realizar los ajustes necesarios para una buena interacción social. Lo anteriormente mencionado se llevará a cabo en una atmósfera de contención y guía, por parte de los coordinadores capacitados en el manejo de jóvenes con SA.</p>

          <p class="p_aspergerCEA">(Para más información, por favor comunicarse con nosotros)</p>

        </div>

        <h3 class="h3_aspergerCEA">Somos integrantes de:</h3>

        <a href="https://grupoart24.org/" target="_blank" rel="noreferrer"><p class="p_aspergerCEA button_quienesSomos">Grupo Art. 24</p></a>

        <a href="http://redea.org.ar/" target="_blank" rel="noreferrer"><p class="p_aspergerCEA button_quienesSomos">Red EA</p></a>
        <br>
        <p class="p_aspergerCEA"><b>Para conocer la agenda de nuestras próximas actividades, por favor visitar la sección de Noticias:</b></p>

        <a href="/noticias"><p class="p_aspergerCEA button_quienesSomos">Noticias</p></a>

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

    <script src="{{ asset('js/actividades.js') }}"></script>

  @endsection
