window.onload = function(){

  // iframe layout preview:
  var iframe = document.getElementById("output_iframe");

  // imagen Facebook layout preview:
  // var canvasFacebook = document.getElementById("canvasFacebook");

  // titular noticia:
  var titulo = iframe.contentWindow.document.getElementsByTagName("h3")[0];
  var inputTitulo = document.getElementById("title");
  inputTitulo.oninput = function(){
    titulo.style.display = "block";
    titulo.innerHTML = this.value;
  }

  // bajada titular noticia:
  var subtitulo = iframe.contentWindow.document.getElementsByTagName("h4")[0];
  var inputSubtitulo = document.getElementById("subtitle");
  inputSubtitulo.oninput = function(){
    subtitulo.style.display = "block";
    subtitulo.innerHTML = this.value;
  }

  // preview imagen principal:
  var imagen = iframe.contentWindow.document.querySelector(".img_container");

  // incluir imagen == sí => display de más opciones y display de preview imagen en iframe:
  var imagenNoticia = document.querySelector(".imagenNoticia");
  imagenNoticia.oninput = function(){
    if (imagenNoticia.firstElementChild.checked == true){
      document.querySelector(".admin .imagenesWrap").style.display ="block";
      imagen.style.display = "block";
      // canvasFacebook.style.backgroundImage = "url('/media/noticias/preloaded/03.jpeg')";
    } else {
      document.querySelector(".admin .imagenesWrap").style.display ="none";
      imagen.style.display = "none";
      // canvasFacebook.style.backgroundImage = "none";
    }
  }

  // funcionalidad thumbnails:
  var opcionesImagen = document.querySelector(".imagenes");
  // console.log(opcionesImagen.children[0]);
  for (var i = 0; i < opcionesImagen.children.length; i++) {
    opcionesImagen.children[i].oninput = function(){
      // insertar imagen elegida en preview iframe:
      imagen.style.backgroundImage = "url(" + this.lastElementChild.value + ")";

      // Canvas:
      var imgCanvas = document.getElementById('imgCanvas');
      imgCanvas.src = this.lastElementChild.value;
      // insertar imagen elegida en preview canvas Facebook:
      imgCanvas.onload = function(){
        scaleToFill(this, canvasFacebook, ctxFacebook);
      }
    }
  }

  // cargar nueva imagen:
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

      if(files.length > 0 ){

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png'){
          // Render imagen:
          var iframe = document.getElementById("output_iframe");
          var imagen = iframe.contentWindow.document.querySelector(".img_container");
          // imagen.style.display = "block";
          imagen.style.backgroundImage = "url(" + e.target.result + ")";

          // Render imagen en Canvas:
          var imgCanvas = document.getElementById('imgCanvas');
          imgCanvas.src = this.lastElementChild.value;
          // insertar imagen elegida en preview canvas Facebook:
          imgCanvas.onload = function(){
            scaleToFill(this, canvasFacebook, ctxFacebook);
          }

          // Crear thumbnail:
          var newRadio = `
              <label class="imagen3">
                <div style="background-image: url('${e.target.result}');" class=""></div>
                <input id="imagen3" type="radio" name="imagen" value="${e.target.result}" checked>
              </label>
                  `;
          document.getElementById('uploadedImage').innerHTML = newRadio;
          // Darle funcionalidad al thumbnail:
          document.getElementById('uploadedImage').children[0].oninput = function(){
            // imagen.style.display = "block";
            imagen.style.backgroundImage = "url(" + e.target.result + ")";

            // Canvas:
            var imgCanvas = document.getElementById('imgCanvas');
            imgCanvas.src = this.lastElementChild.value;
            // insertar imagen elegida en preview canvas Facebook:
            imgCanvas.onload = function(){
              scaleToFill(this, canvasFacebook, ctxFacebook);
            }
          }
          // Reset alert:
          document.querySelector(".alert").innerHTML = "";
        }else{
          document.querySelector(".alert").innerHTML = files[0].name + " no es un archivo de imagen válido";
        }
        };
      })(files[0]);

      // Read in the image file as a data URL.
      reader.readAsDataURL(files[0]);
    }else{
      document.querySelector(".alert").innerHTML = "";
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);

  // incluir logo AsAAr:
  var logoAsaar = document.querySelector(".logoAsaar");
  logoAsaar.oninput = function(){
    var box1Iframe = iframe.contentWindow.document.querySelector(".info_img_container .box1");
    var logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
    if (logoAsaar.firstElementChild.checked == true){
      logoAsaarIframe.style.display ="inline";
      box1Iframe.style.justifyContent="space-between";
    } else {
      logoAsaarIframe.style.display ="none";
      box1Iframe.style.justifyContent="flex-end";
    }
    checkLayout();
  }

  // incluir calendario:
  var calendar = document.querySelector(".calendar");
  calendar.oninput = function(){
    var calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");
    if (calendar.firstElementChild.checked == true){
      calendarioIframe.style.display ="flex";
      calendar.nextElementSibling.style.display ="block";

      if (iframe.contentWindow.document.querySelector(".info_img_container .box1 img").style.display == "none"){
        iframe.contentWindow.document.querySelector(".info_img_container .box1").style.justifyContent="flex-end";
      } else {
        iframe.contentWindow.document.querySelector(".info_img_container .box1").style.justifyContent="space-between";
      }

      // completar mes:
      calendar.nextElementSibling.children[0].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_mes").firstElementChild.innerHTML = this.firstElementChild.value;
      }
      // completar día de la semana:
      calendar.nextElementSibling.children[1].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").firstElementChild.innerHTML = this.firstElementChild.value;
      }
      // completar número:
      calendar.nextElementSibling.children[2].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").lastElementChild.innerHTML = this.firstElementChild.value;
      }

    } else {
      calendarioIframe.style.display ="none";
      calendar.nextElementSibling.style.display ="none";
    }
    checkLayout();
  }

  // incluir titular sobre imagen:
  var tituloImagen = document.querySelector(".tituloImagen textarea");
  tituloImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box2 p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoTitular").style.display = "block";
    // funcionalidad thumbnails colores tipografía:
    var opcionesColorTipo = document.querySelectorAll(".colorTipoTitular input");
    for (var i = 0; i < opcionesColorTipo.length; i++) {
      opcionesColorTipo[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color = this.value;
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.borderColor = this.value;
      }
    }

    document.querySelector(".colorFondoTitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondo = document.querySelectorAll(".colorFondoTitular input");
    for (var i = 0; i < opcionesColorFondo.length; i++) {
      opcionesColorFondo[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.backgroundColor = this.value;
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "none";

      document.querySelector(".colorTipoTitular").style.display = "none";

      document.querySelector(".colorFondoTitular").style.display = "none";
    }
    checkLayout();
  }

  // incluir bajada titular sobre imagen:
  var subtituloImagen = document.querySelector(".subtituloImagen textarea");
  subtituloImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores tipografía:
    var opcionesColorTipoSubtitular = document.querySelectorAll(".colorTipoSubtitular input");
    for (var i = 0; i < opcionesColorTipoSubtitular.length; i++) {
      opcionesColorTipoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color = this.value;

        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.color = this.value;
      }
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    }
    checkLayout();
  }

  // incluir detalle información sobre imagen:
  var detalleImagen = document.querySelector(".detalleImagen textarea");
  detalleImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores tipografía:
    var opcionesColorTipoSubtitular = document.querySelectorAll(".colorTipoSubtitular input");
    for (var i = 0; i < opcionesColorTipoSubtitular.length; i++) {
      opcionesColorTipoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color = this.value;

        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.color = this.value;
      }
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    }
    checkLayout();
  }

  // incluir resumen sobre imagen:
  var resumenImagen = document.querySelector(".resumenImagen textarea");
  resumenImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoResumen").style.display = "block";
    // funcionalidad thumbnails colores tipografía:
    var opcionesColorTipoResumen = document.querySelectorAll(".colorTipoResumen input");
    for (var i = 0; i < opcionesColorTipoResumen.length; i++) {
      opcionesColorTipoResumen[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").style.color = this.value;
      }
    }

    document.querySelector(".colorFondoResumen").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoResumen = document.querySelectorAll(".colorFondoResumen input");
    for (var i = 0; i < opcionesColorFondoResumen.length; i++) {
      opcionesColorFondoResumen[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.backgroundColor = this.value;
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    }
    checkLayout();
  }

  // párrafo noticia:
  var parrafo = iframe.contentWindow.document.querySelector(".parrafo");
  var inputContenido = document.getElementById("content");
  inputContenido.oninput = function(){
    parrafo.style.display = "block";
    parrafo.innerHTML = this.value.replace(/\n/g, "<br>");
  }

  // cargar imagenes secundarias:
  function handleFilePlus(evt) {
    // console.log(evt.target.id);
    var files = evt.target.files; // FileList object
    // console.log(files);
      if(files.length > 0 ){

      var reader = new FileReader();
      // console.log(reader);
      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png'){
          // Render imagen:
          var iframe = document.getElementById("output_iframe");
          var imagenesAdicionales = iframe.contentWindow.document.querySelector(`.${evt.target.id}`);
          var newImagen = `
              <img src="${e.target.result}" alt="imagen noticia">
                  `;
          imagenesAdicionales.innerHTML += newImagen;
          // Crear thumbnail:
          var newThumbnail = `
                <div class="" style="background-image: url('${e.target.result}'); height: 150px"></div>
                  `;
          document.getElementById(evt.target.id).nextElementSibling.nextElementSibling.innerHTML += newThumbnail;

          document.getElementById(`${evt.target.id}`).style.display="none";
          document.getElementById(`${evt.target.id}`).nextElementSibling.style.display="block";

          // Reset alert:
          document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = "";
        }else{
          document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = files[0].name + " no es un archivo de imagen válido";
        }
        };
      })(files[0]);

      // Read in the image file as a data URL.
      reader.readAsDataURL(files[0]);
    }else{
      document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = "";
    }
  }

  document.getElementById('filesPlus1').addEventListener('change', handleFilePlus, false);

  document.getElementById('filesPlus2').addEventListener('change', handleFilePlus, false);

  document.getElementById('filesPlus3').addEventListener('change', handleFilePlus, false);

  // remover imágenes secundarias:
  var remover = document.querySelectorAll(".remover");
  for (var i = 0; i < remover.length; i++) {
    remover[i].onclick = function(){

      var identificador = this.previousElementSibling.name;

      // borrar imagen en iframe:
      var imagenesAdicionales = iframe.contentWindow.document.querySelector("." + identificador);
      imagenesAdicionales.children[0].remove();
      // borrar thumbail en documento:
      this.nextElementSibling.children[0].remove();
      // restablecer input:
      this.previousElementSibling.style.display="inline-block";
      this.previousElementSibling.value="";
      this.style.display="none";
    }
  }





  // CAPTURAR ELEMENTOS PARA CANVAS:
  // imagen fondo:
    // var imgCanvas = document.getElementById('imgCanvas');



  // CANVAS FACEBOOK:
  var canvasFacebook = document.getElementById("canvasFacebook");
  if (canvasFacebook.getContext){
    var ctxFacebook = canvasFacebook.getContext("2d");

    // ctxFacebook.drawImage(imgCanvas, 10, 10);

  } else {
    // canvas-unsupported code here
  }


  // var image = document.getElementById("imgCanvas");
  //
  // image.onload = function(){
  //   scaleToFill(this);
  // }

function scaleToFill(img, canvas, context){
    // get the scale
    var scale = Math.max(canvas.width / img.width, canvas.height / img.height);
    // get the top left position of the image
    var x = (canvas.width / 2) - (img.width / 2) * scale;
    var y = (canvas.height / 2) - (img.height / 2) * scale;
    context.drawImage(img, x, y, img.width * scale, img.height * scale);
}






  ctxFacebook.font = "30px Arial";
  ctxFacebook.fillText("Hello World", 10, 50);
  // ctx.font = "10px Arial";
  // ctx.fillText("Hello", 10, 50);

  // canvasFacebook.onload = function(){
  // var imagen2 = canvasFacebook.toDataURL("image/png");
  // console.log(imagen2);
  // document.querySelector(".output").innerHTML += imagen2;

  // document.getElementById('prueba').setAttribute("src", imagen2);
// }




  function checkLayout(){

    var infoImgContainerIframe = iframe.contentWindow.document.querySelector(".info_img_container");

    var boxUnoIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1");
    var logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
    var calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");

    var boxDosIframe = iframe.contentWindow.document.querySelector(".info_img_container .box2");

    var subtituloImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child");
    var detalleImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child");
    var resumenImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child");

    // empieza chequeo:
    if(
      (logoAsaarIframe.style.display == "inline" || calendarioIframe.style.display == "flex") &&
      boxDosIframe.style.display == "none" &&
      resumenImagenIframe.style.display == "none" &&
      subtituloImagenIframe.style.display == "none" &&
      detalleImagenIframe.style.display == "none"
      ){
      infoImgContainerIframe.style.alignContent="space-between";
      boxUnoIframe.style.marginTop="20px";
      } else {
        infoImgContainerIframe.style.alignContent="space-evenly";
        boxUnoIframe.style.marginTop="0px";
      }
    }

} // fin onload
