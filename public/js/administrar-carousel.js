window.onload = function(){

  let noticias = document.querySelectorAll(".noticias .noticiasItem");

  for (var i = 0; i < noticias.length; i++){
    let noticia = noticias[i];

    // ELIMINAR:
    let inputEliminar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.firstElementChild;

    inputEliminar.onchange = function (){

      let carouselActualItems = document.querySelector(".carouselActual").children;


      if (this.checked == true){

        // deseleccionar checkbox "modificar"
        if (this.parentElement.nextElementSibling.firstElementChild.checked == true){
          this.parentElement.nextElementSibling.firstElementChild.checked = false;
          inputModificar.onchange();
        }

        // sacar noticia del preview carousel: PORQUE NONE y no REMOVE??
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
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

        // for (var i = 0; i < carouselActualItems.length; i++){
        //   if (carouselActualItems[i].firstElementChild.value == this.firstElementChild.value && carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value != this.lastElementChild.lastElementChild.firstElementChild.value){
        //     la imagen está ocupada
        //     avisar
        //     tildar modificar, onchange modificar
        //     resolver qué imagen muestra en el carousel mientras tanto
        //   } else {
        //     el código que ya está hecho, pasarlo acá adentro
        //   }
        // }

        // dejar noticia en el preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
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

    }


    // AGREGAR:
    let inputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    inputAgregar.oninput = function (){

      if (this.checked == true){

        // 1a. mostrar caja con opciones de imagen:
        // this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";
        this.parentElement.parentElement.parentElement.nextElementSibling.style.opacity = "1";
        this.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");


        // 1b. setear imagenes disponibles y no disponibles:
        imagenesDisponiblesAhora (this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild);


        // 2. Seleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {

          imagenesOpciones[i].oninput = function(){

            // 3. Chequear si ya agregué esta noticia (si ya la había creado, la elimina)
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {
              if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){

                carouselUltimaVersion[i].remove();

              }
            }

            // 4. Generar nuevo item carousel
            let newCarouselItem = `
                <div class="carouselItem inCarousel" id="newInsert">
                  <input type="hidden" name="" value="${this.firstElementChild.value}">
                  <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/${this.firstElementChild.value}');
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
          if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){
            carouselUltimaVersion[i].remove();
          }
        }

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
        // this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "none";
        this.parentElement.parentElement.parentElement.nextElementSibling.style.opacity = "0";
        this.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

      }

    }


    // MODIFICAR IMAGEN:
    let inputModificar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild;

    inputModificar.onchange = function(){

      if (this.checked == true){

        // deseleccionar checkbox "eliminar"
        if (this.parentElement.previousElementSibling.firstElementChild.checked == true){
          this.parentElement.previousElementSibling.firstElementChild.checked = false;
          inputEliminar.onchange();
        }

        // 1a. mostrar caja con opciones de imagen:
        // this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";
        this.parentElement.parentElement.parentElement.nextElementSibling.style.opacity = "1";
        this.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

        // 1b. setear imagenes disponibles y no disponibles:
        imagenesDisponiblesAhora (this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild);

        // 2. Seleccionar imagen
        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        for (var i = 0; i < imagenesOpciones.length; i++) {

          imagenesOpciones[i].oninput = function(){

            // 3. Modificar imagen en preview carousel
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {
              if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){

                carouselUltimaVersion[i].firstElementChild.value = this.firstElementChild.value;

                carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/" + this.firstElementChild.value + "')";

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
          if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){

            carouselUltimaVersion[i].firstElementChild.value = noticia.firstElementChild.value;

            carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/" + noticia.firstElementChild.value + "')";

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
        // this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "none";
        this.parentElement.parentElement.parentElement.nextElementSibling.style.opacity = "0";
        this.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

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

} // cierre onload
