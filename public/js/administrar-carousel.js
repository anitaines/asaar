window.onload = function(){

  let noticias = document.querySelectorAll(".noticias .noticiasItem");

  for (var i = 0; i < noticias.length; i++){
    // ELIMINAR:
    let inputEliminar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.firstElementChild;

    inputEliminar.oninput = function (){

      let carouselActualItems = document.querySelector(".carouselActual").children;

      // let imagenesDisponiblesRef = document.querySelector(".imagenesDisponiblesRef").children;

      if (this.checked == true){

        // deseleccionar checkbox "modificar"
        this.parentElement.nextElementSibling.firstElementChild.checked = false;

        // sacar noticia del preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
            carouselActualItems[i].style.display = "none";
          }
        }
        // poner su imagen disponible:
        // for (var i = 0; i < imagenesDisponiblesRef.length; i++){
        //   if (imagenesDisponiblesRef[i].firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.value) {
        //     imagenesDisponiblesRef[i].style.display = "block";
        //   }
        // }

      } else {
        // dejar noticia en el preview carousel:
        for (var i = 0; i < carouselActualItems.length; i++){
          if (carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value) {
            carouselActualItems[i].style.display = "flex";
          }
        }
        // poner su imagen NO disponible:
        // for (var i = 0; i < imagenesDisponiblesRef.length; i++){
        //   if (imagenesDisponiblesRef[i].firstElementChild.value == this.parentElement.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.value) {
        //     imagenesDisponiblesRef[i].style.display = "none";
        //   }
        // }
      }

    }

    // AGREGAR:
    let inputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    inputAgregar.oninput = function (){

      let carouselActualItems = document.querySelector(".carouselActual").children;

      // let imagenesDisponiblesRef = document.querySelector(".imagenesDisponiblesRef").children;
      // console.log(imagenesDisponiblesRef);

      if (this.checked == true){

        // elegir imagen:
        this.parentElement.parentElement.parentElement.nextElementSibling.style.display = "block";

        let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;

        let carouselModificado = document.querySelector(".carouselActual").children;

        for (var i = 0; i < imagenesOpciones.length; i++) {
          for (var ii = 0; ii < carouselModificado.length; ii++) {
            console.log(imagenesOpciones[i].firstElementChild.value);
            console.log(carouselModificado[ii].firstElementChild.value);
            if(imagenesOpciones[i].firstElementChild.value != carouselModificado[ii].firstElementChild.value){
              imagenesOpciones[i].style.display = "block";
            }
          }
        }






        // agregar noticia al preview carousel:

        // poner su imagen NO disponible:

      }

    }


  } // cierre for

} // cierre onload
