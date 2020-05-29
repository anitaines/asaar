window.onload = function(){


  let listadoNoticias = document.querySelector(".noticiasWrap");
  let imagenesDisponibles = document.querySelector(".imagenesDisponibles");
  let fondoGris = document.querySelector(".gris");
  let main = document.querySelector(".admin.carousel");

  // Alertar sobre cantidad de items en carousel (si hace falta)
  contarItemsCarousel();

  // AGREGAR NOTICIA:
  // Agregar noticia 1: al hacer click en el botón agregar, se abre la ventana con el listado de noticia (actualizado)
  let agregar = document.querySelector(".agregarItem");

  agregar.addEventListener("click", function(){

    listadoNoticias.style.display = "block";
    listadoNoticias.firstElementChild.nextElementSibling.nextElementSibling.scrollTop = 0;
    noticiasDisponibles();
    fondoGris.style.display = "block";
    main.style.overflow = "hidden";
    main.style.height = "84vh";
  });

  // Agregar noticia 1b: habilitar botón cierre de la ventana de noticias y/o imagenes
  let cerrarNoticias = document.querySelector(".cerrarNoticias");

  cerrarNoticias.addEventListener("click", function(){
    listadoNoticias.style.display = "none";
    fondoGris.style.display = "none";
    main.style.overflow = "unset";
    main.style.height = "unset";
  });

  let cerrarImagenes = document.querySelector(".cerrarImagenes");

  cerrarImagenes.addEventListener("click", function(){
    imagenesDisponibles.style.display = "none";
    fondoGris.style.display = "none";
    main.style.overflow = "unset";
    main.style.height = "unset";
  });

  // Si clickeo afuera de la ventana, se cierra también
  fondoGris.addEventListener("click", function(){
    listadoNoticias.style.display = "none";
    imagenesDisponibles.style.display = "none";
    fondoGris.style.display = "none";
    main.style.overflow = "unset";
    main.style.height = "unset";
  });

  // Agregar noticia 2: funcionalidad input Agregar en cada noticia. Al clickear se abre la ventana con el listado (actualizado) de imágenes
  let noticias = document.querySelectorAll(".noticias .noticiasItem");

  for (var i = 0; i < noticias.length; i++){
    let noticia = noticias[i];
    let noticiaInputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    noticiaInputAgregar.addEventListener("click", function(){
      listadoNoticias.style.display = "none";

      let alertImagen = document.querySelector(".listo").lastElementChild;
      alertImagen.style.display = "none";

      imagenesDisponibles.style.display = "block";

      imagenesDisponibles.firstElementChild.nextElementSibling.nextElementSibling.scrollTop = 0;

      imagenesDisponiblesAhora ();
    });
  }

  // Agregar noticia 3: funcionalidad botón listo. Si hay una imagen seleccionada, agrega la noticia el carousel
  let listo = document.querySelector(".listo p:first-child");

  listo.addEventListener("click", function(){

    let noticiaSeleccionada = cualNoticia();

    let imagenSeleccionada = cualImagen();

    if (imagenSeleccionada != null){
      // 3a. Chequear si la noticia ya existe en el carousel y está "eliminada", así no la duplico. Si existe, borrar.
      let carouselCompleto = document.getElementsByClassName("carouselItem");

      for (var i = 0; i < carouselCompleto.length -1; i++) {

        let nroNoticiaCarousel = carouselCompleto[i].lastElementChild.previousElementSibling.lastElementChild.firstElementChild.value;

        let nroNoticia = noticiaSeleccionada.firstElementChild.firstElementChild.firstElementChild.value;

        if (nroNoticiaCarousel == nroNoticia){

          carouselCompleto[i].remove();

        }
      }

      // 3b: Generar nuevo item carousel
      let newCarouselItem = `
      <div class="carouselItem inCarousel" id="newInsert">
        <input type="checkbox" name="modificarNoticiaCarousel[${noticiaSeleccionada.firstElementChild.firstElementChild.firstElementChild.value}]" value="${imagenSeleccionada.firstElementChild.value}" style="display: none;" checked>
        <div class="eliminar">
          <p>Eliminar</p>
          <div class="cruz">
            <p>✖</p>
          </div>
        </div>
        <input type="hidden" name="" value="${imagenSeleccionada.firstElementChild.value}">
        <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/thumbnails/${imagenSeleccionada.firstElementChild.value}');
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;"></div>
        <div class="carouselInfo">
          <a href="${noticiaSeleccionada.firstElementChild.nextElementSibling.firstElementChild.href}" target="_blank" rel="noreferrer">
            <p>${noticiaSeleccionada.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.innerHTML}</p>
          </a>
          <p> ${noticiaSeleccionada.firstElementChild.nextElementSibling.firstElementChild.nextElementSibling.innerHTML}</p>
          <label> Noticia nro.
            <input type="text" name="" value="${noticiaSeleccionada.firstElementChild.firstElementChild.firstElementChild.value}" disabled>
          </label>
        </div>
        <div class="modificar">
          <p>Modificar imagen carousel</p>
        </div>
      </div>
      `;

      // 3c: Incluir noticia en preview carousel ordenada por nro. id
      let carouselUltimaVersion = document.getElementsByClassName("inCarousel");

      for (let i = 0; i < carouselUltimaVersion.length; i++) {
        let idCarousel = Number( carouselUltimaVersion[i].lastElementChild.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value);

        let idNoticia = Number(noticiaSeleccionada.firstElementChild.firstElementChild.firstElementChild.value);

        if (idCarousel < idNoticia){
          // insertar nuevo item
          carouselUltimaVersion[i].insertAdjacentHTML('beforebegin', newCarouselItem);

          // capturarlo con el id
          let newInsert = document.getElementById("newInsert");
          // al div "eliminar" agregarle el evento/función "eliminar"
          newInsert.firstElementChild.nextElementSibling.addEventListener("click", eliminarItemCarousel);
          // al div "modificar" agregarle el evento/función "modificar"
          newInsert.lastElementChild.addEventListener("click", modificarItemCarousel);
          // remover el id
          newInsert.removeAttribute("id");

          break;
        }
      }
      // Alertar sobre cantidad de items en carousel (si hace falta)
      contarItemsCarousel();
      // Cerrar ventana imágenes:
      imagenesDisponibles.style.display = "none";
      fondoGris.style.display = "none";
      main.style.overflow = "unset";
      main.style.height = "unset";

    } else { // si no hay imagen seleccionada
      let alertImagen = document.querySelector(".listo").lastElementChild;
      alertImagen.style.display = "block";

      // si selecciono una imagen, sacar alerta:
      for (var i = 0; i < imagenesDisponibles.children.length; i++) {
        imagenesDisponibles.children[i].addEventListener("change", function(){
          alertImagen.style.display = "none";
        });
      }
    }
  });

  // ELIMINAR NOTICIA:
  let eliminar = document.querySelectorAll(".eliminar");

  for (var i = 0; i < eliminar.length; i++) {
    eliminar[i].addEventListener("click", eliminarItemCarousel);
  }

  // MODIFICAR IMAGEN
  let modificar = document.querySelectorAll(".modificar");

  for (var i = 0; i < modificar.length; i++) {
    modificar[i].addEventListener("click", modificarItemCarousel);
  }



  // FUNCIONES:

  function contarItemsCarousel(){
    let cantidadItemsCarousel = document.querySelectorAll(".inCarousel").length - 1;
    let alert = document.querySelector(".alert");
    if (cantidadItemsCarousel > 3){
      alert.innerHTML = "El carrusel tiene más de 3 noticias, por favor considerar reducir la cantidad.";
      alert.style.color = "red";
    } else if (cantidadItemsCarousel == 0) {
      alert.innerHTML = "No hay noticias en el carousel.";
      alert.style.color = "red";
    } else {
      alert.innerHTML = "alert";
      alert.style.color = "#ffffff";
    }
  }



  function noticiasDisponibles(){
    let noticias = document.querySelectorAll(".noticiasItem");
    let carouselAhora = document.getElementsByClassName("inCarousel");

    for (var i = 0; i < noticias.length; i++) {
      let noticia = noticias[i];
      let noticiaInputAgregar = noticia.lastElementChild.firstElementChild.firstElementChild;
      noticiaInputAgregar.checked = false;

      for (var ii = 0; ii < carouselAhora.length; ii++) {
        let noticiaNroCarousel = carouselAhora[ii].lastElementChild.previousElementSibling.lastElementChild.firstElementChild.value;
        let noticiaNro = noticia.firstElementChild.firstElementChild.firstElementChild.value;

        if (noticiaNroCarousel == noticiaNro){
          noticia.classList.add("noticiaGris");
          noticia.lastElementChild.firstElementChild.style.display = "none";
          noticia.lastElementChild.firstElementChild.nextElementSibling.style.display = "block";
          break;

        } else {
          noticia.classList.remove("noticiaGris");
          noticia.lastElementChild.firstElementChild.style.display = "block";
          noticia.lastElementChild.firstElementChild.nextElementSibling.style.display = "none";
        }
      }
    }
  }



  function imagenesDisponiblesAhora (){
    let imagenesDisponiblesWrap = document.querySelector(".imagenesDisponiblesWrap");

    let carouselAhora = document.getElementsByClassName("inCarousel");

    for (var i = 0; i < imagenesDisponiblesWrap.children.length; i++) {

      let input = imagenesDisponiblesWrap.children[i].firstElementChild;

      input.removeAttribute("disabled");
      input.nextElementSibling.style.filter = "none";
      input.parentElement.classList.remove("noHover");

      for (var ii = 0; ii < carouselAhora.length; ii++) {
        if (carouselAhora[ii].firstElementChild.nextElementSibling.nextElementSibling.value == input.value){

          input.setAttribute("disabled", "");
          input.nextElementSibling.style.filter = "grayscale(100%) blur(5px)";
          input.parentElement.classList.add("noHover");
          break;

        } else {

          input.removeAttribute("disabled");
          input.nextElementSibling.style.filter = "none";
          input.checked = false;

        }
      }

    }
  }



  function cualNoticia(){
    let searchNoticias = document.querySelectorAll(".noticiasItem");

    var noticiaSeleccionada;

    for (var i = 0; i < searchNoticias.length; i++) {

      var inputAgregar = searchNoticias[i].lastElementChild.firstElementChild.firstElementChild;

      if (inputAgregar.checked == true){
        noticiaSeleccionada = searchNoticias[i];
      }
    }
    // console.log(noticiaSeleccionada);
    return noticiaSeleccionada;
  }



  function cualImagen(){
    searchImagenes = document.querySelector(".imagenesDisponiblesWrap").children;

    var imagenSeleccionada;

    for (var i = 0; i < searchImagenes.length; i++) {

      var inputImagen = searchImagenes[i].firstElementChild;

      if (inputImagen.checked == true){
        imagenSeleccionada = searchImagenes[i];
        inputImagen.checked = false;
        break;
      } else {
        imagenSeleccionada = null;
      }
    }
    // console.log(imagenSeleccionada);
    return imagenSeleccionada;
  }



  function eliminarItemCarousel(){
    // ubico el item a eliminar
    let idEliminar = this.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.firstElementChild.value;

    // modifico la información de su input que va a mandar el form al controlador
    this.previousElementSibling.name = "modificarNoticiaCarousel[" + idEliminar + "]";
    this.previousElementSibling.value = "";
    this.previousElementSibling.checked = true;
    // lo mantengo en el carousel con display none (si lo remuevo pierdo la info que tiene que mandar el form)
    this.parentElement.style.display = "none";
    // al sacar esta clase deja de ser un item activo
    this.parentElement.classList.remove("inCarousel");

    // Alertar sobre cantidad de items en carousel (si hace falta)
    contarItemsCarousel();
  }



  function modificarItemCarousel(){
    // Buscar en el listado de noticias la noticia que clickeé "modificar" en el carousel
    let listadoNoticias =  document.querySelectorAll(".noticiasItem");
    for (var i = 0; i < listadoNoticias.length; i++) {
      let nroNoticiaModificar = this.previousElementSibling.lastElementChild.firstElementChild.value;
      let nroNoticia = listadoNoticias[i].firstElementChild.firstElementChild.firstElementChild.value;

      // darle "checked" a la noticia para seleccionar su input (con esta información activo la función cualNoticia())
      if (nroNoticiaModificar == nroNoticia){

        listadoNoticias[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.checked = true;

      }
    }
    // resetear alerta de imagen por las dudas
    let alertImagen = document.querySelector(".listo").lastElementChild;
    alertImagen.style.display = "none";
    // display de ventana imágenes con su chequeo de imágenes disponibles
    imagenesDisponibles.style.display = "block";
    imagenesDisponiblesAhora ();
    fondoGris.style.display = "block";
    main.style.overflow = "hidden";
    main.style.height = "84vh";
  }

} // cierre onload
