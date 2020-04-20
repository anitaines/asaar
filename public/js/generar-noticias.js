window.onload = function(){
  var imagenesOpcionCarga = document.querySelector(".imagenesOpcionCarga");
  imagenesOpcionCarga.onclick = function(){
    if(imagenesOpcionCarga.lastElementChild.innerHTML == "▼"){
      imagenesOpcionCarga.lastElementChild.innerHTML = "▲";
      document.querySelector(".admin .imagenesWrap .imagenes").style.height = "350px";
      document.querySelector(".admin .imagenesWrap .imagenes").style.overflow = "scroll";
      var imagenesCargadas = document.querySelectorAll(".admin .imagenesWrap .imagenes label");
      for (var i = 0; i < imagenesCargadas.length; i++) {
        imagenesCargadas[i].style.display = "block";
      }
    } else {
      imagenesOpcionCarga.lastElementChild.innerHTML = "▼";
      document.querySelector(".admin .imagenesWrap .imagenes").style.height = "38px";
      document.querySelector(".admin .imagenesWrap .imagenes").style.overflow = "hidden";
      var imagenesCargadas = document.querySelectorAll(".admin .imagenesWrap .imagenes label");
      for (var i = 0; i < imagenesCargadas.length; i++) {
        imagenesCargadas[i].style.display = "none";
      }
    }
  }

  var imagenesOpcionCargaNueva = document.querySelector(".imagenesOpcionCargaNueva p");
  imagenesOpcionCargaNueva.onclick = function(){
    if (imagenesOpcionCargaNueva.innerHTML == "Cargar nueva imagen ▼"){
      imagenesOpcionCargaNueva.innerHTML = "Cargar nueva imagen ▲"
      imagenesOpcionCargaNueva.parentElement.style.height= "auto";
      imagenesOpcionCargaNueva.parentElement.style.overflow= "unset";
    } else {
      imagenesOpcionCargaNueva.innerHTML = "Cargar nueva imagen ▼"
      imagenesOpcionCargaNueva.parentElement.style.height= "38px";
      imagenesOpcionCargaNueva.parentElement.style.overflow= "hidden";
    }
  }

  // PREVIEW NOTICIA y CANVAS:

  // iframe layout preview:
  let iframe = document.getElementById("output_iframe");

  // preview imagen principal en iframe:
  let imagenPrincipal = iframe.contentWindow.document.querySelector(".img_container");

  // imagen para canvas:
  let imgCanvas = document.getElementById('imgCanvas');

  // Facebook layout preview:
  var canvasFacebook = document.getElementById("canvasFacebook");



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
      // Canvas:
      setCanvas();
    } else {
      document.querySelector(".admin .imagenesWrap").style.display ="none";
      imagenPrincipal.style.display = "none";
      // Canvas:
      setCanvas();
    }
  }

  // funcionalidad thumbnails:
  let opcionesImagen = document.querySelector(".imagenes");
  // console.log(opcionesImagen.children[0]);
  for (var i = 1; i < opcionesImagen.children.length; i++) {
    opcionesImagen.children[i].oninput = function(){
      // insertar imagen elegida en preview iframe:
      imagenPrincipal.style.backgroundImage = "url(" + this.firstElementChild.value + ")";

      // Canvas:
      imgCanvas.src = this.firstElementChild.value;
      setCanvas();
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
          setCanvas();

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
            setCanvas();
          }
          // Reset alert:
          document.querySelector(".alert").innerHTML = "";
        }else{
          document.querySelector(".alert").innerHTML = files[0].name + " <b>no es un archivo de imagen válido</b>";
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
    } else {
      logoAsaarIframe.style.display ="none";
      box1Iframe.style.justifyContent="flex-end";
    }
    checkLayout();
    // Canvas:
    setCanvas();
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
        // Canvas:
        setCanvas();
      }
      // completar día de la semana:
      calendar.nextElementSibling.children[1].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").firstElementChild.innerHTML = this.firstElementChild.value;
        // Canvas:
        setCanvas();
      }
      // completar número:
      calendar.nextElementSibling.children[2].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").lastElementChild.innerHTML = this.firstElementChild.value;
        // Canvas:
        setCanvas();
      }

    } else {
      calendarioIframe.style.display ="none";
      calendar.nextElementSibling.style.display ="none";
    }
    checkLayout();
    // Canvas:
    setCanvas();
  }

  // incluir titular sobre imagen:
  let tituloImagen = document.querySelector(".tituloImagen textarea");
  tituloImagen.oninput = function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box2 p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoTitular").style.display = "block";

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipo = document.querySelectorAll(".colorTipoTitular input");
    for (var i = 0; i < opcionesColorTipo.length; i++) {
      opcionesColorTipo[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color = this.value;
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.borderColor = this.value;
        // Canvas:
        setCanvas();
      }
    }

    document.querySelector(".colorFondoTitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondo = document.querySelectorAll(".colorFondoTitular input");
    for (var i = 0; i < opcionesColorFondo.length; i++) {
      opcionesColorFondo[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.backgroundColor = this.value;
        // Canvas:
        setCanvas();
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "none";

      document.querySelector(".colorTipoTitular").style.display = "none";

      document.querySelector(".colorFondoTitular").style.display = "none";
    }
    checkLayout();
    // Canvas:
    setCanvas();
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

        // Canvas:
        setCanvas();
      }
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas();
      }
    }

  } else {
    if (this.value.length <= 0 && detalleImagen.value <= 0){
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "none";
    }
    }
    checkLayout();
    // Canvas:
    setCanvas();
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

        // Canvas:
        setCanvas();
      }
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas();
      }
    }

    } else {
      if (this.value.length <= 0 && subtituloImagen.value <= 0){
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "none";
    }
    }
    checkLayout();
    // Canvas:
    setCanvas();
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
        // Canvas:
        setCanvas();
      }
    }

    document.querySelector(".colorFondoResumen").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoResumen = document.querySelectorAll(".colorFondoResumen input");
    for (var i = 0; i < opcionesColorFondoResumen.length; i++) {
      opcionesColorFondoResumen[i].oninput = function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas();
      }
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.display = "none";

      document.querySelector(".colorTipoResumen").style.display = "none";

      document.querySelector(".colorFondoResumen").style.display = "none";
    }
    checkLayout();
    // Canvas:
    setCanvas();
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


  // CANVAS:
  // - imagen facebook: 1200 x 1200 px
  // - imagen twitter: 1024 x 512 px (rechequear)
  // - imagen instagram: 1080 x 1080 px


  // CAPTURAR ELEMENTOS PARA CANVAS:
  // imagen fondo:
    // var imgCanvas = document.getElementById('imgCanvas');

  // CANVAS FACEBOOK:

  // acá arranca la función
  // la voy llamando en cada oninput

  // var canvasFacebook = document.getElementById("canvasFacebook");
  // setCanvas()

  function setCanvas(){

    if (canvasFacebook.getContext){

      var ctxFacebook = canvasFacebook.getContext("2d");

      ctxFacebook.fillStyle = "#ffffff";
      ctxFacebook.fillRect(0, 0, 1200, 1200);

      // ctxFacebook.clearRect(0, 0, 1200, 1200);

      // SETEAR VARIABLES:
      var logoCanvas = logoAsaar.firstElementChild.checked;

      var calendarioCanvas = calendar.firstElementChild.checked;

      // var textoTitular = "TALLER DE PADRES";
      var textoTitular = tituloImagen.value;
      var lineasTitular = getMotherLines(ctxFacebook, textoTitular, 1060, "bold 70px 'Gidugu', sans-serif");
      var hTitular = alturaTexto(lineasTitular, 80);

      // var textoSubtitular = "Para padres de niños, adolescentes y adultos";
      var textoSubtitular = subtituloImagen.value;
      var lineasSubtitular = getMotherLines(ctxFacebook, textoSubtitular, 507, "bold 45px 'Montserrat', sans-serif");
      var hSubtitular = alturaTexto(lineasSubtitular, 50);

      // var textoDetalle = "LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.";
      var textoDetalle = detalleImagen.value;
      var lineasDetalle = getMotherLines(ctxFacebook, textoDetalle, 507, "30px 'Montserrat', sans-serif");
      var hDetalle = alturaTexto(lineasDetalle, 40);

      // var textoResumen = "Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.";
      var textoResumen = resumenImagen.value;
      var lineasResumen = getMotherLines(ctxFacebook, textoResumen, 507, "30px 'Montserrat', sans-serif");
      var hResumen = alturaTexto(lineasResumen, 40);


      // SETEAR IMAGEN FONDO:
      imgCanvas.src = imgCanvas.src;
      imgCanvas.onload = function(){
        scaleToFill(this, canvasFacebook, ctxFacebook);
      // } //cierre onload, lo muevo al final de la función


      // IMPRIMIR LOGO:
      if (logoCanvas){
        let logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
        ctxFacebook.drawImage(logoAsaarIframe, 30, 30, 339.42, 195);
      }

      // IMPRIMIR CALENDARIO:
      if (calendarioCanvas){
        ctxFacebook.rotate(3 * Math.PI / 180);
        ctxFacebook.shadowBlur = 20;
        ctxFacebook.shadowOffsetX = 10;
        ctxFacebook.shadowOffsetY = 10;
        ctxFacebook.shadowColor = "black";
        ctxFacebook.fillStyle = "#fffadf";
        ctxFacebook.fillRect(960, -10, 195, 195);

        ctxFacebook.shadowBlur = 0;
        ctxFacebook.shadowOffsetX = 0;
        ctxFacebook.shadowOffsetY = 0;
        ctxFacebook.shadowColor = "#000000";
        ctxFacebook.fillStyle = "#f72929";
        ctxFacebook.fillRect(964, -7, 188, 56);

        var mesCalendario = calendar.nextElementSibling.children[0].firstElementChild.value;
        ctxFacebook.font = "bold 28px Helvetica";
        ctxFacebook.fillStyle = "#fffadf";
        var mesPosX = 964 + ((188 - ctxFacebook.measureText(mesCalendario).width)/2);
        ctxFacebook.fillText(mesCalendario, mesPosX, 32);

        var diaCalendario = calendar.nextElementSibling.children[1].firstElementChild.value.split("").join(String.fromCharCode(8201));
        ctxFacebook.font = "26px Helvetica";
        ctxFacebook.fillStyle = "black";
        var diaPosX = 964 + ((188 - ctxFacebook.measureText(diaCalendario).width)/2);
        ctxFacebook.fillText(diaCalendario, diaPosX, 80);

        var nroCalendario = calendar.nextElementSibling.children[2].firstElementChild.value;
        ctxFacebook.font = "bold 80px Helvetica";
        ctxFacebook.fillStyle = "black";
        var nroPosX = 964 + ((188 - ctxFacebook.measureText(nroCalendario).width)/2);
        ctxFacebook.fillText(nroCalendario, nroPosX, 160);

        ctxFacebook.rotate(-3 * Math.PI / 180);
      }


      // OBTENER COORDENADAS PARA CADA TEXTO:
      // Coordenada inicial TITULAR:
      // x siempre centrado con respecto al canvas:
      var factorXtitular = 0;
      // y:
      if(hResumen > (hSubtitular + hDetalle)){
        var hBox2 = hResumen;
      } else {
        var hBox2 = hSubtitular + hDetalle;
      }
      if (logoCanvas || calendarioCanvas){
        var posInicialYtitular = ((1160 - 255 - hBox2)/2) + 255 - (hTitular/2);
      } else {
        var posInicialYtitular = ((1160 - hBox2)/2) - (hTitular/2);
      }
      // Coordenada inicial SUBTITULAR:
      // x centrado con respecto al canvas si NO está resúmen:
      if (textoResumen){
        var factorXsubtitular = 8.66 + 527 + 8.66;
      }else{
        var factorXsubtitular = 0;
      }
      // y:
      var posInicialYsubtitular = posInicialYtitular + hTitular;
      // Coordenada inicial DETALLE:
      // x centrado con respecto al canvas si NO está resúmen:
      if (textoResumen){
        var factorXdetalle = 8.66 + 527 + 8.66;
      }else{
        var factorXdetalle = 0;
      }
      // y:
      var posInicialYdetalle = posInicialYsubtitular + hSubtitular;
      // Coordenada inicial RESUMEN:
      // x centrado con respecto al canvas si NO está subtitular y/o detalle:
      if (textoSubtitular || textoDetalle){
        var factorXresumen = 8.66 - 527 - 20.66;
      }else{
        var factorXresumen = 0;
      }
      // y:
      var posInicialYresumen = posInicialYtitular + hTitular;


      // IMPRIMIR TEXTOS, RECUADROS, CAMBIAR COLORES:

      // Titular:
      var colorTipoTitular = iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color;

      var colorFondoTitular = iframe.contentWindow.document.querySelector(".info_img_container .box2").style.backgroundColor;

      if (textoTitular){
      imprimirRecuadro(ctxFacebook, colorTipoTitular, colorFondoTitular, 70, 1080, hTitular, factorXtitular, posInicialYtitular);
      }

      imprimirTexto (ctxFacebook,lineasTitular, "bold 70px 'Gidugu', sans-serif", colorTipoTitular, 80, factorXtitular, posInicialYtitular);

      // Subtitular:
      var colorTipoSubitular = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color;

      var colorFondoSubtitular = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor;

      if (textoSubtitular || textoDetalle){
      imprimirRecuadroRadius(ctxFacebook, colorFondoSubtitular, 45, factorXsubtitular, posInicialYsubtitular, 527, hSubtitular + hDetalle, 20);
      }

      imprimirTexto (ctxFacebook,lineasSubtitular, "bold 45px 'Montserrat', sans-serif", colorTipoSubitular, 50, factorXsubtitular, posInicialYsubtitular);

      // Detalle:
      if (textoDetalle){
      // imprimirRecuadro(ctxFacebook, 45, 527, hDetalle, factorXdetalle, posInicialYdetalle);

      // imprimirRecuadroRadius(ctxFacebook, 45, factorXdetalle, posInicialYdetalle, 527, hDetalle, 20);
      }
      imprimirTexto (ctxFacebook,lineasDetalle, "30px 'Montserrat', sans-serif", colorTipoSubitular, 40, factorXdetalle, posInicialYdetalle);

      // Resumen:
      var colorTipoResumen = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").style.color;

      var colorFondoResumen = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.backgroundColor;

      if (textoResumen){
      // imprimirRecuadro(ctxFacebook, 45, 527, hResumen, factorXresumen, posInicialYresumen);

      imprimirRecuadroRadius(ctxFacebook, colorFondoResumen, 45, factorXresumen, posInicialYresumen, 527, hResumen, 20);
      }
      imprimirTexto (ctxFacebook,lineasResumen, "30px 'Montserrat', sans-serif", colorTipoResumen, 40, factorXresumen, posInicialYresumen);

      // IMPRIMIR WEB EN EL FOOTER:
      var webAsaar = "www.asperger.org.ar".split("").join(String.fromCharCode(8202));
      ctxFacebook.font = "30px 'Montserrat', sans-serif";
      ctxFacebook.fillStyle = "black";
      posXweb = (canvasFacebook.width/2) - (ctxFacebook.measureText(webAsaar).width/2);
      ctxFacebook.fillText(webAsaar, posXweb, 1160);

      // PASAR A IMAGEN:
      // var imagen2 = canvasFacebook.toDataURL("image/png");

      // document.getElementById('prueba').setAttribute("src", imagen2);

    } //cierre onload imgCanvas

      } else {
        // canvas-unsupported code here
    }
  } // cierre function setCanvas()

//   var descargar_canvas = document.querySelector(".descargar_canvas");
//   descargar_canvas.onclick = function(){
//     // var imagen2 = canvasFacebook.toDataURL("image/png");
//     //
//     // document.getElementById('prueba').setAttribute("src", imagen2);
//
//     // document.getElementById('prueba').style.display = "block";
//
//     // var canvas = document.getElementById("mycanvas");
// var image = canvasFacebook.toDataURL("image/png").replace("image/png", "image/octet-stream"); //Convert image to 'octet-stream' (Just a download, really)
// window.location.href = image;
//   }
  var link = document.getElementById('link');
  link.onclick = function(){
    link.setAttribute('download', 'imagenFacebook.png');
    link.setAttribute('href', canvasFacebook.toDataURL("image/png").replace("image/png", "image/octet-stream"));
    // link.click();
  }


  // FUNCIONES CANVAS:

    // function imprimirTexto (text, font, lineHeight, y){
    //   var posY = y;
    //   var posX;
    //   for (var i = 0; i < text.length; i++) {
    //     for (var ii = 0; ii < text[i].length; ii++) {
    //       ctxFacebook.font = font;
    //       ctxFacebook.fillStyle = "#ab2097";
    //       posX = (canvasFacebook.width/2) - (ctxFacebook.measureText(text[i][ii]).width/2);
    //       posY = posY + lineHeight;
    //       ctxFacebook.fillText(text[i][ii], posX, posY);
    //     }
    //   }
    // }

  function imprimirTexto (context, text, font, color, lineHeight, xFactor, y){
      var posY = y - lineHeight;
      var posX;
      for (var i = 0; i < text.length; i++) {
        for (var ii = 0; ii < text[i].length; ii++) {
          context.font = font;
          // context.fillStyle = "#ab2097";
          context.fillStyle = color;
          posX = ((canvasFacebook.width - xFactor) /2) + xFactor - (context.measureText(text[i][ii]).width/2);
          posY = posY + lineHeight;
          context.fillText(text[i][ii], posX, posY);
        }
      }
    }


    // function anchoTexto(contexto, text){
    //   var ancho = 0;
    //   for (var i = 0; i < text.length; i++) {
    //     for (var ii = 0; ii < text[i].length; ii++) {
    //       // if (text[i][ii].length > 0){
    //         if(contexto.measureText(text[i][ii]).width > ancho){
    //           ancho = contexto.measureText(text[i][ii]).width;
    //         }
    //
    //       // }
    //     }
    //   }
    //   return ancho;
    // }

  function alturaTexto (text, lineHeight){
      var cantidadLineas = 0;
      for (var i = 0; i < text.length; i++) {
        for (var ii = 0; ii < text[i].length; ii++) {
          if (text[i][ii].length > 0){
            cantidadLineas = cantidadLineas + 1;
          }
        }
      }
      if (cantidadLineas > 0){
        var altura = (cantidadLineas * lineHeight) + 60;
      } else {
        var altura = 0;
      }
      return altura;
    }


  function imprimirRecuadro(context, colorTipo, colorFondo, fontSize, width, height, xFactor, y){
      var posY = y - fontSize - 20;
      var posX;

      posX = ((canvasFacebook.width - xFactor) /2) + xFactor - (width/2);

      context.beginPath();
      context.lineWidth = "4";
      // context.lineWidth = lineWidth;
      // context.strokeStyle = "#ab2097";
      context.strokeStyle = colorTipo;
      context.rect(posX, posY, width, height);
      context.fillStyle = colorFondo;
      context.stroke();
      context.fill();
    }


  function imprimirRecuadroRadius (context, colorFondo, fontSize, xFactor, y, width, height, radius){
      var posY = y - fontSize - 20;
      var posX;

      posX = ((canvasFacebook.width - xFactor) /2) + xFactor - (width/2);

      if (width < 2 * radius) radius = width / 2;
      if (height < 2 * radius) radius = height / 2;
      context.beginPath();
      context.moveTo(posX + radius, posY);
      context.arcTo(posX + width, posY, posX + width, posY + height, radius);
      context.arcTo(posX + width, posY + height, posX, posY + height, radius);
      context.arcTo(posX, posY + height, posX, posY, radius);
      context.arcTo(posX, posY, posX + width, posY, radius);
      context.closePath();
      context.fillStyle = colorFondo;
      context.fill();

      // context.lineWidth = "4";
      // // context.lineWidth = lineWidth;
      // context.strokeStyle = "#ab2097";
      // // context.strokeStyle = color;
    }

  function getMotherLines (ctx, text, maxWidth, font){
      var motherLines = text.split("\n");
      var motherLinesResult = [];
      for (var i = 0; i < motherLines.length; i++) {
        motherLinesResult.push(getLines(ctx, motherLines[i], maxWidth, font));
      }
      return motherLinesResult;
    }

  function getLines(ctx, text, maxWidth, font) {
      var words = text.split(" ");
      var lines = [];
      var currentLine = words[0];
      ctx.font = font;
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
      return lines;
    } // cierre funcion getLines

  function scaleToFill(img, canvas, context){
      // get the scale
      var scale = Math.max(canvas.width / img.width, canvas.height / img.height);
      // get the top left position of the image
      var x = (canvas.width / 2) - (img.width / 2) * scale;
      var y = (canvas.height / 2) - (img.height / 2) * scale;
      // context.globalCompositeOperation = "destination-over";
      context.filter = 'grayscale(100%)';
      context.drawImage(img, x, y, img.width * scale, img.height * scale);
      context.filter = 'none';
  }


  // FUNCION CANVAS A IMAGEN:
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
