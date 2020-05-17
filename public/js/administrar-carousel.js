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

        // sacar noticia del preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
            carouselActualItems[i].style.display = "none";
            carouselActualItems[i].classList.toggle("inCarousel");


            // poner su imagen disponible en los "Agregar" activos:
            let nuevaImagenDisponible = carouselActualItems[i].firstElementChild.value;

            let imagenesDisponiblesOn = document.getElementsByClassName("imagenesDisponiblesOn");

            for (var i = 0; i < imagenesDisponiblesOn.length; i++) {

            let imagenes = imagenesDisponiblesOn[i].children;

              for (var i = 0; i < imagenes.length; i++) {

                if (imagenes[i].firstElementChild.value == nuevaImagenDisponible){
                  imagenes[i].style.filter = "none";
                  // imagenes[i].firstElementChild.setAttribute("disabled", false);
                  imagenes[i].firstElementChild.removeAttribute("disabled");
                }
              }
            }

          }
        }

      } else {
        // dejar noticia en el preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
            carouselActualItems[i].style.display = "flex";
            carouselActualItems[i].classList.toggle("inCarousel");

            // su imagen no está más disponible en los "Agregar" activos:
            let nuevaImagenDisponible = carouselActualItems[i].firstElementChild.value;

            let imagenesDisponiblesOn = document.getElementsByClassName("imagenesDisponiblesOn");

            for (var i = 0; i < imagenesDisponiblesOn.length; i++) {

            let imagenes = imagenesDisponiblesOn[i].children;

              for (var i = 0; i < imagenes.length; i++) {

                if (imagenes[i].firstElementChild.value == nuevaImagenDisponible){
                  imagenes[i].style.filter = "grayscale(100%)";
                  imagenes[i].firstElementChild.setAttribute("disabled", "");
                }
              }
            }

          }
        }

      }

    }

    // AGREGAR:
    let inputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    inputAgregar.oninput = function (){

      if (this.checked == true){

        // 1. habilitar opciones de imagen:
        this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";
        this.parentElement.parentElement.parentElement.nextElementSibling.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");

        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        let carouselUltimaVersion = document.getElementsByClassName("inCarousel");

        for (var i = 0; i < imagenesOpciones.length; i++) {
          for (var ii = 0; ii < carouselUltimaVersion.length; ii++) {

            if(imagenesOpciones[i].firstElementChild.value == carouselUltimaVersion[ii].firstElementChild.value){
              imagenesOpciones[i].style.filter = "grayscale(100%)";
              imagenesOpciones[i].firstElementChild.setAttribute("disabled", "");
            }
          }

          // 2. Seleccionar imagen
          imagenesOpciones[i].oninput = function(){

            // 3. Chequear si ya agregué esta noticia (si ya la había creado, la elimina)
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {
              if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){

                carouselUltimaVersion[i].remove();

              }
            }

            // 4. Incluir noticia en preview carousel
            let newCarouselItem = `
                <div class="carouselItem inCarousel">
                  <input type="hidden" name="" value="${this.firstElementChild.value}">
                  <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/${this.firstElementChild.value}');
                    background-repeat: no-repeat;
                    background-size: cover;
                    background-position: center;"></div>
                  <div class="carouselInfo">
                    <a href="${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.href}" target="_blank" rel="noreferrer">
                      <p>${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.innerHTML}</p>
                    </a>
                    <p>Fecha de publicación: ${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.innerHTML}</p>
                    <label> Noticia nro.
                      <input type="text" name="" value="${noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value}" disabled>
                    </label>
                  </div>
                </div>
                    `;
            document.querySelector(".carouselActual").innerHTML += newCarouselItem;

            // imagen deja de estar disponible:
            let imagenesDisponiblesOn = document.getElementsByClassName("imagenesDisponiblesOn");
            for (var i = 0; i < imagenesDisponiblesOn.length; i++) {

            let imagenes = imagenesDisponiblesOn[i].children;

              for (var i = 0; i < imagenes.length; i++) {

                if (imagenes[i].firstElementChild.value == this.firstElementChild.value){
                  imagenes[i].style.filter = "grayscale(100%)";
                  imagenes[i].firstElementChild.setAttribute("disabled", "");
                }
              }
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


        // imagen pasa a estar disponible:
        // let imagenesDisponiblesOn = document.getElementsByClassName("imagenesDisponiblesOn");
        // for (var i = 0; i < imagenesDisponiblesOn.length; i++) {
        //
        // let imagenes = imagenesDisponiblesOn[i].children;
        //
        //   for (var i = 0; i < imagenes.length; i++) {
        //
        //     if (imagenes[i].firstElementChild.value == this.firstElementChild.value){
        //       imagenes[i].style.filter = "none";
        //       imagenes[i].firstElementChild.removeAttribute("disabled");
        //     }
        //   }
        // }




        // 3. Deshabilitar opciones de imagen:
        this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "none";
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

        // 1. habilitar opciones de imagen:
        this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";

        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        let carouselUltimaVersion = document.getElementsByClassName("inCarousel");

        for (var i = 0; i < imagenesOpciones.length; i++) {
          for (var ii = 0; ii < carouselUltimaVersion.length; ii++) {

            if(imagenesOpciones[i].firstElementChild.value == carouselUltimaVersion[ii].firstElementChild.value){
              imagenesOpciones[i].style.filter = "grayscale(100%)";
              imagenesOpciones[i].firstElementChild.setAttribute("disabled", "");
            }
          }

          // 2. Seleccionar imagen
          imagenesOpciones[i].oninput = function(){

            // 3. Modificar imagen en preview carousel
            let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
            for (var i = 0; i < carouselUltimaVersion.length; i++) {
              if (carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value == noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value){

                carouselUltimaVersion[i].firstElementChild.value = this.firstElementChild.value;

                carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/" + this.firstElementChild.value + "')";

              }
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

        // 3. Deshabilitar opciones de imagen:
        this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "none";

      }

    }



  } // cierre for cada noticia


  // caja activa = imagenesDisponiblesWrap  imagenesDisponiblesOn

  // let imagenesDisponiblesOnZ = document.getElementsByClassName("imagenesDisponiblesOn");
  // imagenesDisponiblesAhora (imagenesDisponiblesOnZ)

  function imagenesDisponiblesAhora (cajaActiva){

    let carouselAhora = document.getElementsByClassName("inCarousel");

    let imagenesAll = document.querySelector(".imagenesAll").children;

    this.innerHTML = "";

    for (var i = 0; i < carouselAhora.length; i++) {
      let imagenCarousel = carouselAhora[i];
      for (var i = 0; i < imagenesAll.length; i++) {

    // for (var i = 0; i < imagenesAll.length; i++) {
    //   let imagen = imagenesAll[i];
    //   for (var i = 0; i < carouselAhora.length; i++) {
        if (imagenCarousel.firstElementChild.value == imagenesAll[i].value){
          let labelAhora = `
          <label> Elegir
            <input type="radio" name="modificarNoticiaCarousel[${cajaActiva.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value}]" value="${imagenesAll[i].value} disabled">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/${imagenesAll[i].value}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100px;
            filter: grayscale(100%);"></div>
          </label>
          `;

          this.innerHTML += labelAhora;

        } else {
          let labelAhora = `
          <label> Elegir
            <input type="radio" name="modificarNoticiaCarousel[${cajaActiva.parentElement.previousElementSibling.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value}]" value="${imagenesAll[i].value}">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/${imagenesAll[i].value}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 100px;"></div>
          </label>
          `;

          this.innerHTML += labelAhora;

        }
      }
    }
  }

} // cierre onload
