window.onload = function(){

  // iframe layout preview:
  let iframe = document.getElementById("output_iframe");

  // preview imagen principal en iframe:
  let imagenPrincipal = iframe.contentWindow.document.querySelector(".img_container");

  // imagen para canvas:
  let imgCanvas = document.getElementById('imgCanvas');

  // imagen Facebook layout preview:
  // var canvasFacebook = document.getElementById("canvasFacebook");



  // setear titular noticia:
  let inputTitulo = document.getElementById("title");
  inputTitulo.oninput = function(){
    let titulo = iframe.contentWindow.document.getElementsByTagName("h3")[0];

    titulo.style.display = "block";
    titulo.innerHTML = this.value;
  }

  // setear bajada titular noticia:
  let inputSubtitulo = document.getElementById("subtitle");
  inputSubtitulo.oninput = function(){
    let subtitulo = iframe.contentWindow.document.getElementsByTagName("h4")[0];

    subtitulo.style.display = "block";
    subtitulo.innerHTML = this.value;
  }

  // setear preview imagen principal:
  // let imagen = iframe.contentWindow.document.querySelector(".img_container");

  // setear imagen principal:

  // incluir imagen principal == sí => display de más opciones y display de preview imagen en iframe:
  var imagenNoticiaCheckbox = document.querySelector(".imagenNoticia");
  imagenNoticiaCheckbox.oninput = function(){
    if (imagenNoticiaCheckbox.firstElementChild.checked == true){
      document.querySelector(".admin .imagenesWrap").style.display ="block";
      imagenPrincipal.style.display = "block";
      // canvasFacebook.style.backgroundImage = "url('/media/noticias/preloaded/03.jpeg')";
    } else {
      document.querySelector(".admin .imagenesWrap").style.display ="none";
      imagenPrincipal.style.display = "none";
      // canvasFacebook.style.backgroundImage = "none";
    }
  }

  // funcionalidad thumbnails:
  let opcionesImagen = document.querySelector(".imagenes");
  // console.log(opcionesImagen.children[0]);
  for (var i = 0; i < opcionesImagen.children.length; i++) {
    opcionesImagen.children[i].oninput = function(){
      // insertar imagen elegida en preview iframe:
      imagenPrincipal.style.backgroundImage = "url(" + this.lastElementChild.value + ")";

      // Canvas:
      imgCanvas.src = this.lastElementChild.value;
      // insertar imagen elegida en preview canvas Facebook:
      imgCanvas.onload = function(){
        scaleToFill(this, canvasFacebook, ctxFacebook);
      }
    }
  }

  // upload externa de nueva imagen principal:
  function handleFileSelect(evt) {
    let files = evt.target.files; // FileList object

      if(files.length > 0 ){

      let reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png'){
          // Render imagen:
          imagenPrincipal.style.backgroundImage = "url(" + e.target.result + ")";

          // Render imagen en Canvas:
          imgCanvas.src = e.target.result;
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
            imagenPrincipal.style.backgroundImage = "url(" + e.target.result + ")";

            // Canvas:
            imgCanvas.src = e.target.result;
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
  let logoAsaar = document.querySelector(".logoAsaar");
  logoAsaar.oninput = function(){
    let box1Iframe = iframe.contentWindow.document.querySelector(".info_img_container .box1");
    let logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
    if (logoAsaar.firstElementChild.checked == true){
      logoAsaarIframe.style.display ="inline";
      box1Iframe.style.justifyContent="space-between";

      // Canvas:
      // insertar logo en preview canvas Facebook:
      // ctxFacebook.drawImage(logoAsaarIframe, 10, 10, 50, 50);

    } else {
      logoAsaarIframe.style.display ="none";
      box1Iframe.style.justifyContent="flex-end";
    }
    checkLayout();
  }

  // incluir calendario:
  let calendar = document.querySelector(".calendar");
  calendar.oninput = function(){
    let calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");
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
  let tituloImagen = document.querySelector(".tituloImagen textarea");
  tituloImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box2 p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoTitular").style.display = "block";


var texto = this.value;
getLines(ctxFacebook, texto, 500);
// console.log(getLinesForParagraphs(ctxFacebook, texto, 500));

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipo = document.querySelectorAll(".colorTipoTitular input");
    for (var i = 0; i < opcionesColorTipo.length; i++) {
      opcionesColorTipo[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color = this.value;
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.borderColor = this.value;
      }
    }

    document.querySelector(".colorFondoTitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondo = document.querySelectorAll(".colorFondoTitular input");
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

    // LOGO:
    let logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
    ctxFacebook.drawImage(logoAsaarIframe, 30, 30, 216, 124);
    // console.log(logoAsaarIframe.clientWidth);
    // console.log(logoAsaarIframe.clientHeight);

    // CALENDARIO:

    // let calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");
    // console.log(calendarioIframe.style);

    // context.rotate(angle in radians);
    ctxFacebook.rotate(3 * Math.PI / 180);
    ctxFacebook.fillStyle = "#fffadf";
    // context.fillRect(x,y,width,height);
    ctxFacebook.fillRect(1000, -10, 163, 163);

    // ctxFacebook.rotate(3 * Math.PI / 180);
    ctxFacebook.fillStyle = "#f72929";
    // context.fillRect(x,y,width,height);
    ctxFacebook.fillRect(1005, -10, 151, 56);

    var mes_calendario = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar_mes").firstElementChild.innerHTML;
    ctxFacebook.font = "30px Helvetica";
    ctxFacebook.fillStyle = "#fffadf";
    ctxFacebook.fillText(mes_calendario, 1005, -10);




    // TITULAR CAJA:
    var div2 = document.querySelector(".div2");
    console.log(div2.clientWidth);
    console.log(div2.clientHeight);
    ctxFacebook.rotate(-3 * Math.PI / 180);

    ctxFacebook.beginPath();
    ctxFacebook.lineWidth = "4";
    ctxFacebook.strokeStyle = "#ab2097";

    var xPos = (canvasFacebook.width/2) - (div2.clientWidth/2);
    var yPos = (canvasFacebook.height/2) - (div2.clientHeight/2);

    ctxFacebook.rect(xPos,yPos, div2.clientWidth, div2.clientHeight);
    ctxFacebook.stroke();

    // TITULAR TEXTO:
    // ctxFacebook.font = "bold 70px 'Gidugu', sans-serif";
    // ctxFacebook.fillStyle = "#ab2097";
    // ctxFacebook.textAlign = "center";
    // var titular_texto = "TALLER DE PADRES".split("").join(String.fromCharCode(8202));
    // // ctxFacebook.fillText(titular_texto, canvasFacebook.width/2,yPos);
    // ctxFacebook.fillText("tAller de padres TALLER DE PADRES TALLER DE PADRES TALLER DE PADRES TALLER DE PADRES TALLER DE PADRES TALLER DE PADRES", canvasFacebook.width/2,yPos);




    /* color: var(--magenta); */

    /* line-height: 0.7; */
    // line-height: 1;
    // letter-spacing: 2px;
    // text-align: center;
    // margin: 20px 10px;
    // var texto = "1234 56 78910 111213 14 151617 181920 21 222324 25262728 29 303132 333435 36 373839 404142 43 444546 474849 50 515253";
    //
    // getLines(ctxFacebook, texto, 500);

    // function getLinesForParagraphs(ctx, text, maxWidth) {
    //   return text.split("\n").map(para => getLines(ctx, para, maxWidth)).reduce([], (a, b) => a.concat(b))
    // }

    function getLines(ctx, text, maxWidth) {
      // var text = text.split("").join(String.fromCharCode(8202));
      var motherLines = text.split("\n");

      for (var i = 0; i < motherLines.length; i++) {


      var words = motherLines[i].split(" ");
      var lines = [];
      var currentLine = words[0];

      for (var i = 1; i < words.length; i++) {
        var word = words[i];
        var width = ctx.measureText(currentLine + " " + word).width;
        if (width < maxWidth) {
            currentLine += " " + word;
          } else {
            lines.push(currentLine);
            currentLine = word;
        }
      }
      lines.push(currentLine);
      // return lines;
      var posX;
      var posY = 500;
      for (var i = 0; i < lines.length; i++) {
        ctx.font = "bold 70px 'Gidugu', sans-serif";
        ctx.fillStyle = "#ab2097";

        posX = (canvasFacebook.width/2) - (ctxFacebook.measureText(lines[i]).width/2);

        posY = posY + 80;

        ctx.fillText(lines[i], posX, posY);
      }
    }
    }
    // function getLines(ctx, text, maxWidth) {
    //   // var text = text.split("").join(String.fromCharCode(8202));
    //   var motherLines = text.split("\n");
    //
    //   var words = text.split(" ");
    //   var lines = [];
    //   var currentLine = words[0];
    //
    //   for (var i = 1; i < words.length; i++) {
    //     var word = words[i];
    //     var width = ctx.measureText(currentLine + " " + word).width;
    //     if (width < maxWidth) {
    //         currentLine += " " + word;
    //       } else {
    //         lines.push(currentLine);
    //         currentLine = word;
    //     }
    //   }
    //   lines.push(currentLine);
    //   // return lines;
    //   var posX;
    //   var posY = 500;
    //   for (var i = 0; i < lines.length; i++) {
    //     ctx.font = "bold 70px 'Gidugu', sans-serif";
    //     ctx.fillStyle = "#ab2097";
    //
    //     posX = (canvasFacebook.width/2) - (ctxFacebook.measureText(lines[i]).width/2);
    //
    //     posY = posY + 80;
    //
    //     ctx.fillText(lines[i], posX, posY);
    //   }
    // }

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






  // ctxFacebook.font = "30px Arial";
  // ctxFacebook.fillText("Hello World", 10, 50);
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
