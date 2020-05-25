window.onload = function(){

  contarItemsCarousel();

  let noticias = document.querySelectorAll(".noticias .noticiasItem");

  for (var i = 0; i < noticias.length; i++){
    let noticia = noticias[i];

    // ELIMINAR:
    let inputEliminar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.firstElementChild;

    inputEliminar.onchange = function (){

      let carouselActualItems = document.querySelector(".carouselActual").children;


      if (this.checked == true){

        // deseleccionar checkbox "modificar" si estaba seleccionado
        if (inputModificar.checked == true){
          inputModificar.checked = false;
          inputModificar.onchange();
        }

        // sacar noticia del preview carousel: PORQUE NONE y no REMOVE??
        for (var i = 0; i < carouselActualItems.length; i++){

          let nroNoticiaCarousel = carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value;

          let nroNoticia = this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value;

          if (nroNoticiaCarousel == nroNoticia) {
            carouselActualItems[i].style.display = "none";
            carouselActualItems[i].classList.toggle("inCarousel");

          }
        }

        // poner su imagen disponible en los "Agregar" activos:
        let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

        for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
          imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
        }

      } else {

        // dejar noticia en el preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){

          let nroNoticiaCarousel = carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value;

          let nroNoticia = this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value;

          if (nroNoticiaCarousel == nroNoticia) {
            carouselActualItems[i].style.display = "flex";
            carouselActualItems[i].classList.toggle("inCarousel");

          }
        }

        // su imagen no está más disponible en los "Agregar" activos:
        let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

        for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
          imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
        }

      }

      contarItemsCarousel();
    }


    // AGREGAR:
    let inputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    inputAgregar.oninput = function (){

      if (this.checked == true){

        // 1a. mostrar caja con opciones de imagen:
        let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
        // imagenesDisponibles.style.display = "block";
        imagenesDisponibles.style.opacity = "1";
        imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");


        // 1b. setear imagenes disponibles y no disponibles:
        let divImaagenes = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild;
        imagenesDisponiblesAhora (divImaagenes);


        // 2. Seleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {

          imagenesOpciones[i].oninput = function(){

            // 3. Chequear si ya agregué esta noticia (si ya la había creado, la elimina)
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {

              let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;

              let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;

              if (nroNoticiaCarousel == nroNoticia){

                carouselUltimaVersion[i].remove();

              }
            }

            // 4. Generar nuevo item carousel
            let newCarouselItem = `
                <div class="carouselItem inCarousel" id="newInsert">
                  <input type="hidden" name="" value="${this.firstElementChild.value}">
                  <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/thumbnails/${this.firstElementChild.value}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;"></div>
                  <div class="carouselInfo">
                    <a href="${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.href}" target="_blank" rel="noreferrer">
                      <p>${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.innerHTML}</p>
                    </a>
                    <p style="display:none;">Fecha de publicación: ${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.innerHTML}</p>
                    <label> Noticia nro.
                      <input type="text" name="" value="${noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value}" disabled>
                    </label>
                  </div>
                </div>
                    `;
            // document.querySelector(".carouselActual").innerHTML += newCarouselItem;

// console.log(carouselUltimaVersion);


            // 5. Incluir noticia en preview carousel ordenada por nro. id
            for (let i = 0; i < carouselUltimaVersion.length; i++) {
// console.log(carouselUltimaVersion);
// console.log("length " + carouselUltimaVersion.length);
// console.log("i: " + i);
              let idCarousel = Number( carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value);
// console.log(typeof idCarousel + idCarousel);
              let idNoticia = Number(noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value);
// console.log(typeof idNoticia + idNoticia);

              if (idCarousel < idNoticia){
                document.querySelector(".carouselActual").innerHTML += newCarouselItem;
                let newInsert = document.getElementById("newInsert");
                newInsert.removeAttribute("id");
                carouselUltimaVersion[i].insertAdjacentElement("beforebegin", newInsert);
                break;
              }
            }
// console.log(carouselUltimaVersion);
            contarItemsCarousel();

            //6. actualizar disponibilidad de imágenes
            let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

            for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
              imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
            }

          }
        }

      } else {
        // 1. Sacar noticia del preview carousel
        let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
        for (var i = 0; i < carouselUltimaVersion.length; i++) {

            let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;

            let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;

          if (nroNoticiaCarousel == nroNoticia){
            carouselUltimaVersion[i].remove();
          }
        }
        contarItemsCarousel();

        // 2. Deseleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {
          imagenesOpciones[i].firstElementChild.checked = false;
        }

        // 3. imagen pasa a estar disponible:
        let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

        for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
          imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
        }

        // 4. Deshabilitar opciones de imagen:
        let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
        // imagenesDisponibles.style.display = "none";
        imagenesDisponibles.style.opacity = "0";
        imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

      }

    }


    // MODIFICAR IMAGEN:
    let inputModificar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild;

    inputModificar.onchange = function(){

      if (this.checked == true){

        // deseleccionar checkbox "eliminar"
        if (inputEliminar.checked == true){
          inputEliminar.checked = false;
          inputEliminar.onchange();
        }

        // 1a. mostrar caja con opciones de imagen:
        let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
        // imagenesDisponibles.style.display = "block";
        imagenesDisponibles.style.opacity = "1";
        imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

        // 1b. setear imagenes disponibles y no disponibles:
        let divImaagenes = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild;
        imagenesDisponiblesAhora (divImaagenes);

        // 2. Seleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {

          imagenesOpciones[i].oninput = function(){

            // 3. Modificar imagen en preview carousel
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {

              let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;

              let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;

              if (nroNoticiaCarousel == nroNoticia){

                carouselUltimaVersion[i].firstElementChild.value = this.firstElementChild.value;

                carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/thumbnails/" + this.firstElementChild.value + "')";

              }
            }

            // 4. Imagen nueva deja de estar disponible y la vieja pasa a estar disponible
            let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

            for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
              imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
            }

          }
        }

      } else {

        // 1. Dejar imagen original en preview carousel
        let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
        for (var i = 0; i < carouselUltimaVersion.length; i++) {

          let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;

          let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;

          if (nroNoticiaCarousel == nroNoticia){

            carouselUltimaVersion[i].firstElementChild.value = noticia.firstElementChild.value;

            carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/thumbnails/" + noticia.firstElementChild.value + "')";

          }
        }

        // 2. Deseleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {
          imagenesOpciones[i].firstElementChild.checked = false;
        }

        // 3. Imagen pasa a estar disponible:
        let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");

        for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
          imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
        }

        // 4. Deshabilitar opciones de imagen:
        let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
        // imagenesDisponibles.style.display = "none";
        imagenesDisponibles.style.opacity = "0";
        imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

      }

    }

  } // cierre for cada noticia


  // let imagenesDisponiblesOn = document.querySelector(".imagenesDisponiblesOn");
  //
  // imagenesDisponiblesAhora (imagenesDisponiblesOn);

  // caja activa = imagenesDisponiblesWrap  imagenesDisponiblesOn

  function imagenesDisponiblesAhora (cajaActiva){

    let carouselAhora = document.getElementsByClassName("inCarousel");

    for (var i = 0; i < cajaActiva.children.length; i++) {

      let input = cajaActiva.children[i].firstElementChild;

      input.removeAttribute("disabled");
      input.nextElementSibling.style.filter = "none";

      for (var ii = 0; ii < carouselAhora.length; ii++) {
        if (carouselAhora[ii].firstElementChild.value == input.value && input.checked != true){

          input.setAttribute("disabled", "");
          input.nextElementSibling.style.filter = "grayscale(100%";

        } else if (carouselAhora[ii].firstElementChild.value == input.value && input.checked == true) {

          input.nextElementSibling.style.filter = "grayscale(100%";

        }
      }

    }
  }

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

} // cierre onload
