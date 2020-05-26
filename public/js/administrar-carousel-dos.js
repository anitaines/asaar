window.onload = function(){

  let listadoNoticias = document.querySelector(".noticiasWrap");
  let imagenesDisponibles = document.querySelector(".imagenesDisponibles");
  let fondoGris = document.querySelector(".gris");

  // Alertar sobre cantidad de items en carousel (si hace falta)
  contarItemsCarousel();

  // AGREGAR NOTICIA:
  // Agregar noticia 1: al hacer click en el botón agregar, se abre la ventana con el listado de noticia (actualizado)
  let agregar = document.querySelector(".agregarItem");

  agregar.onclick = function(){
    listadoNoticias.style.display = "block";
    noticiasDisponibles();
    fondoGris.style.display = "block";
  }

  // Agregar noticia 1b: habilitar botón cierre de la ventana de noticias y/o imagenes
  let cerrarNoticias = document.querySelector(".cerrarNoticias");

  cerrarNoticias.onclick = function(){
    listadoNoticias.style.display = "none";
    fondoGris.style.display = "none";
  }

  let cerrarImagenes = document.querySelector(".cerrarImagenes");

  cerrarImagenes.onclick = function(){
    imagenesDisponibles.style.display = "none";
    fondoGris.style.display = "none";
  }

  // Agregar noticia 2: funcionalidad input Agregar en cada noticia. Al clickear se abre la ventana con el listado de imágenes (actualizado)
  let noticias = document.querySelectorAll(".noticias .noticiasItem");

  for (var i = 0; i < noticias.length; i++){
    let noticia = noticias[i];
    let noticiaInputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;

    noticiaInputAgregar.onclick = function(){
      listadoNoticias.style.display = "none";

      let alertImagen = document.querySelector(".listo").lastElementChild;
      alertImagen.style.display = "none";

      imagenesDisponibles.style.display = "block";
      imagenesDisponiblesAhora ();
    }
  }

  // Agregar noticia 3: funcionalidad botón listo. Si hay una imagen seleccionada, agrega la noticia el carousel
  let listo = document.querySelector(".listo");

  listo.onclick = function(){

    let noticiaSeleccionada = cualNoticia();

    let imagenSeleccionada = cualImagen();

    if (imagenSeleccionada != null){
      // 3a: Generar nuevo item carousel
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

      // 3b: Incluir noticia en preview carousel ordenada por nro. id
      let carouselUltimaVersion = document.getElementsByClassName("inCarousel");

      for (let i = 0; i < carouselUltimaVersion.length; i++) {
        let idCarousel = Number( carouselUltimaVersion[i].lastElementChild.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value);

        let idNoticia = Number(noticiaSeleccionada.firstElementChild.firstElementChild.firstElementChild.value);

        if (idCarousel < idNoticia){
          // Primero inserto, después capturo el nuevo elemento y después lo cambio de lugar
          document.querySelector(".carouselActual").innerHTML += newCarouselItem;
          let newInsert = document.getElementById("newInsert");
          newInsert.removeAttribute("id");
          carouselUltimaVersion[i].insertAdjacentElement("beforebegin", newInsert);
          break;
        }
      }
      // Alertar sobre cantidad de items en carousel (si hace falta)
      contarItemsCarousel();
      // Cerrar ventana imágenes:
      imagenesDisponibles.style.display = "none";
      fondoGris.style.display = "none";

      // volver a cargar onclick a agregar: ???????
      let agregar = document.querySelector(".agregarItem");
      agregar.onclick = function(){
        listadoNoticias.style.display = "block";
        noticiasDisponibles();
        fondoGris.style.display = "block";
      }

      // funcionalidad eliminar a todos los items
      let eliminar = document.querySelectorAll(".eliminar");
      for (var i = 0; i < eliminar.length; i++) {
        eliminar[i].onclick = function(){
          let idEliminar = this.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.firstElementChild.value;

          this.previousElementSibling.name = "modificarNoticiaCarousel[" + idEliminar + "]";
          this.previousElementSibling.checked = true;
          this.parentElement.style.display = "none";
          this.parentElement.classList.remove("inCarousel");
        }
      }

    } else {
      let alertImagen = document.querySelector(".listo").lastElementChild;
      alertImagen.style.display = "block";

      // si selecciono una imagen, sacar alerta:
      for (var i = 0; i < imagenesDisponibles.children.length; i++) {
        imagenesDisponibles.children[i].onchange = function(){
          alertImagen.style.display = "none";
        }
      }
    }
  }

  // ELIMINAR NOTICIA:
  let eliminar = document.querySelectorAll(".eliminar");

  for (var i = 0; i < eliminar.length; i++) {
    eliminar[i].onclick = function(){
      let idEliminar = this.nextElementSibling.nextElementSibling.nextElementSibling.lastElementChild.firstElementChild.value;

      this.previousElementSibling.name = "modificarNoticiaCarousel[" + idEliminar + "]";
      this.previousElementSibling.checked = true;
      this.parentElement.style.display = "none";
      this.parentElement.classList.remove("inCarousel");
    }
  }

// dos problemas
// sin funcion eliminar en nuevos elemntos y perdido en anteriores
// si agrego un elemto que habia borrado, lo duplica con dos valores distintos

  // <label> Eliminar
  //   <input type="checkbox" name="modificarNoticiaCarousel[{{$value->id}}]" value="">
  // </label>







//   let noticias = document.querySelectorAll(".noticias .noticiasItem");
//
//   for (var i = 0; i < noticias.length; i++){
//     let noticia = noticias[i];
//
//     // ELIMINAR:
//     let inputEliminar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.firstElementChild;
//
//     inputEliminar.onchange = function (){
//
//       let carouselActualItems = document.querySelector(".carouselActual").children;
//
//
//       if (this.checked == true){
//
//         // deseleccionar checkbox "modificar" si estaba seleccionado
//         if (inputModificar.checked == true){
//           inputModificar.checked = false;
//           inputModificar.onchange();
//         }
//
//         // sacar noticia del preview carousel: PORQUE NONE y no REMOVE??
//         for (var i = 0; i < carouselActualItems.length; i++){
//
//           let nroNoticiaCarousel = carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value;
//
//           let nroNoticia = this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value;
//
//           if (nroNoticiaCarousel == nroNoticia) {
//             carouselActualItems[i].style.display = "none";
//             carouselActualItems[i].classList.toggle("inCarousel");
//
//           }
//         }
//
//         // poner su imagen disponible en los "Agregar" activos:
//         let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//         for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//           imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//         }
//
//       } else {
//
//         // dejar noticia en el preview carousel:
//         for (var i = 0; i < carouselActualItems.length; i++){
//
//           let nroNoticiaCarousel = carouselActualItems[i].lastElementChild.lastElementChild.firstElementChild.value;
//
//           let nroNoticia = this.parentElement.parentElement.previousElementSibling.previousElementSibling.firstElementChild.firstElementChild.value;
//
//           if (nroNoticiaCarousel == nroNoticia) {
//             carouselActualItems[i].style.display = "flex";
//             carouselActualItems[i].classList.toggle("inCarousel");
//
//           }
//         }
//
//         // su imagen no está más disponible en los "Agregar" activos:
//         let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//         for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//           imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//         }
//
//       }
//
//       contarItemsCarousel();
//     }
//
//
//     // AGREGAR:
//     let inputAgregar = noticias[i].lastElementChild.firstElementChild.firstElementChild;
//
//     inputAgregar.oninput = function (){
//
//       if (this.checked == true){
//
//         // 1a. mostrar caja con opciones de imagen:
//         let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
//         // imagenesDisponibles.style.display = "block";
//         imagenesDisponibles.style.opacity = "1";
//         imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");
//
//
//         // 1b. setear imagenes disponibles y no disponibles:
//         let divImaagenes = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild;
//         imagenesDisponiblesAhora (divImaagenes);
//
//
//         // 2. Seleccionar imagen
//         let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;
//
//         for (var i = 0; i < imagenesOpciones.length; i++) {
//
//           imagenesOpciones[i].oninput = function(){
//
//             // 3. Chequear si ya agregué esta noticia (si ya la había creado, la elimina)
//             let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
//             for (var i = 0; i < carouselUltimaVersion.length; i++) {
//
//               let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
//
//               let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;
//
//               if (nroNoticiaCarousel == nroNoticia){
//
//                 carouselUltimaVersion[i].remove();
//
//               }
//             }
//
//             // 4. Generar nuevo item carousel
//             let newCarouselItem = `
//                 <div class="carouselItem inCarousel" id="newInsert">
//                   <input type="hidden" name="" value="${this.firstElementChild.value}">
//                   <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/thumbnails/${this.firstElementChild.value}');
//                     background-repeat: no-repeat;
//                     background-size: cover;
//                     background-position: center;"></div>
//                   <div class="carouselInfo">
//                     <a href="${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.href}" target="_blank" rel="noreferrer">
//                       <p>${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.innerHTML}</p>
//                     </a>
//                     <p style="display:none;">Fecha de publicación: ${noticia.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.innerHTML}</p>
//                     <label> Noticia nro.
//                       <input type="text" name="" value="${noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value}" disabled>
//                     </label>
//                   </div>
//                 </div>
//                     `;
//             // document.querySelector(".carouselActual").innerHTML += newCarouselItem;
//
// // console.log(carouselUltimaVersion);
//
//
//             // 5. Incluir noticia en preview carousel ordenada por nro. id
//             for (let i = 0; i < carouselUltimaVersion.length; i++) {
// // console.log(carouselUltimaVersion);
// // console.log("length " + carouselUltimaVersion.length);
// // console.log("i: " + i);
//               let idCarousel = Number( carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value);
// // console.log(typeof idCarousel + idCarousel);
//               let idNoticia = Number(noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value);
// // console.log(typeof idNoticia + idNoticia);
//
//               if (idCarousel < idNoticia){
//                 document.querySelector(".carouselActual").innerHTML += newCarouselItem;
//                 let newInsert = document.getElementById("newInsert");
//                 newInsert.removeAttribute("id");
//                 carouselUltimaVersion[i].insertAdjacentElement("beforebegin", newInsert);
//                 break;
//               }
//             }
// // console.log(carouselUltimaVersion);
//             contarItemsCarousel();
//
//             //6. actualizar disponibilidad de imágenes
//             let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//             for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//               imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//             }
//
//           }
//         }
//
//       } else {
//         // 1. Sacar noticia del preview carousel
//         let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
//         for (var i = 0; i < carouselUltimaVersion.length; i++) {
//
//             let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
//
//             let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;
//
//           if (nroNoticiaCarousel == nroNoticia){
//             carouselUltimaVersion[i].remove();
//           }
//         }
//         contarItemsCarousel();
//
//         // 2. Deseleccionar imagen
//         let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;
//
//         for (var i = 0; i < imagenesOpciones.length; i++) {
//           imagenesOpciones[i].firstElementChild.checked = false;
//         }
//
//         // 3. imagen pasa a estar disponible:
//         let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//         for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//           imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//         }
//
//         // 4. Deshabilitar opciones de imagen:
//         let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
//         // imagenesDisponibles.style.display = "none";
//         imagenesDisponibles.style.opacity = "0";
//         imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");
//
//       }
//
//     }
//
//
//     // MODIFICAR IMAGEN:
//     let inputModificar = noticias[i].lastElementChild.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild;
//
//     inputModificar.onchange = function(){
//
//       if (this.checked == true){
//
//         // deseleccionar checkbox "eliminar"
//         if (inputEliminar.checked == true){
//           inputEliminar.checked = false;
//           inputEliminar.onchange();
//         }
//
//         // 1a. mostrar caja con opciones de imagen:
//         let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
//         // imagenesDisponibles.style.display = "block";
//         imagenesDisponibles.style.opacity = "1";
//         imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");
//
//         // 1b. setear imagenes disponibles y no disponibles:
//         let divImaagenes = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild;
//         imagenesDisponiblesAhora (divImaagenes);
//
//         // 2. Seleccionar imagen
//         let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;
//
//         for (var i = 0; i < imagenesOpciones.length; i++) {
//
//           imagenesOpciones[i].oninput = function(){
//
//             // 3. Modificar imagen en preview carousel
//             let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
//             for (var i = 0; i < carouselUltimaVersion.length; i++) {
//
//               let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
//
//               let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;
//
//               if (nroNoticiaCarousel == nroNoticia){
//
//                 carouselUltimaVersion[i].firstElementChild.value = this.firstElementChild.value;
//
//                 carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/thumbnails/" + this.firstElementChild.value + "')";
//
//               }
//             }
//
//             // 4. Imagen nueva deja de estar disponible y la vieja pasa a estar disponible
//             let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//             for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//               imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//             }
//
//           }
//         }
//
//       } else {
//
//         // 1. Dejar imagen original en preview carousel
//         let carouselUltimaVersion = document.getElementsByClassName("inCarousel");
//         for (var i = 0; i < carouselUltimaVersion.length; i++) {
//
//           let nroNoticiaCarousel = carouselUltimaVersion[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
//
//           let nroNoticia = noticia.firstElementChild.nextElementSibling.firstElementChild.firstElementChild.value;
//
//           if (nroNoticiaCarousel == nroNoticia){
//
//             carouselUltimaVersion[i].firstElementChild.value = noticia.firstElementChild.value;
//
//             carouselUltimaVersion[i].firstElementChild.nextElementSibling.style.backgroundImage = "url('/media/noticias/carousel/thumbnails/" + noticia.firstElementChild.value + "')";
//
//           }
//         }
//
//         // 2. Deseleccionar imagen
//         let imagenesOpciones = this.parentElement.parentElement.parentElement.nextElementSibling.lastElementChild.children;
//
//         for (var i = 0; i < imagenesOpciones.length; i++) {
//           imagenesOpciones[i].firstElementChild.checked = false;
//         }
//
//         // 3. Imagen pasa a estar disponible:
//         let imagenesDisponiblesOn = document.querySelectorAll(".imagenesDisponiblesOn");
//
//         for (let i = 0; i < imagenesDisponiblesOn.length; i++) {
//           imagenesDisponiblesAhora (imagenesDisponiblesOn[i]);
//         }
//
//         // 4. Deshabilitar opciones de imagen:
//         let imagenesDisponibles = this.parentElement.parentElement.parentElement.nextElementSibling;
//         // imagenesDisponibles.style.display = "none";
//         imagenesDisponibles.style.opacity = "0";
//         imagenesDisponibles.firstElementChild.nextElementSibling.classList.toggle("imagenesDisponiblesOn");
//
//       }
//
//     }
//
//   } // cierre for cada noticia





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

      for (var ii = 0; ii < carouselAhora.length-1; ii++) {
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

      for (var ii = 0; ii < carouselAhora.length; ii++) {
        if (carouselAhora[ii].firstElementChild.nextElementSibling.nextElementSibling.value == input.value){

          input.setAttribute("disabled", "");
          input.nextElementSibling.style.filter = "grayscale(100%) blur(5px)";

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
    searchNoticias = document.querySelectorAll(".noticiasItem");

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

} // cierre onload
