window.onload = function(){

  // Menú en mobile y tablet:
  let menuMobileTablet = document.querySelectorAll(".menuMobileTablet a");

  let menuInformacion = document.querySelector(".admin .input");
  let menuImagen = document.querySelector(".admin .output .allCanvas");

  for (var i = 0; i < menuMobileTablet.length; i++) {
    menuMobileTablet[i].addEventListener("click", function(event){
      event.preventDefault();

      for (var i = 0; i < menuMobileTablet.length; i++){
        menuMobileTablet[i].firstElementChild.style.backgroundColor= "#ffffff";
        menuMobileTablet[i].firstElementChild.style.color= "var(--magenta)";
      }

      this.firstElementChild.style.backgroundColor= "var(--magenta)";
      this.firstElementChild.style.color= "#ffffff";

      switch (this.className) {
        case "menuInformacion":
          menuInformacion.style.display = "block";
          menuImagen.style.display = "none";
          break;
        case "menuImagen":
          menuInformacion.style.display = "none";
          menuImagen.style.display = "block";
          break;
        default:
          menuInformacion.style.display = "block";
          menuImagen.style.display = "none";
      }
    });
  }



  // imagen para canvas:
  let imgCanvasFacebook = document.getElementById('imgCanvasFacebook');

  // canvas:
  let canvasFacebook = document.getElementById("canvasFacebookDos");


  // funcionalidad opción de carga de imágenes:
  let imagenesOpcionCarga = document.querySelector(".imagenesOpcionCarga");
  imagenesOpcionCarga.addEventListener("click", function(){
    if(imagenesOpcionCarga.lastElementChild.innerHTML == "▼"){
      imagenesOpcionCarga.lastElementChild.innerHTML = "▲";
      document.querySelector(".admin .imagenesWrap .imagenes").style.height = "350px";
      document.querySelector(".admin .imagenesWrap .imagenes").style.overflow = "scroll";
      let imagenesCargadas = document.querySelectorAll(".admin .imagenesWrap .imagenes label");
      for (var i = 0; i < imagenesCargadas.length; i++) {
        imagenesCargadas[i].style.display = "block";
      }
    } else {
      imagenesOpcionCarga.lastElementChild.innerHTML = "▼";
      document.querySelector(".admin .imagenesWrap .imagenes").style.height = "38px";
      document.querySelector(".admin .imagenesWrap .imagenes").style.overflow = "hidden";
      let imagenesCargadas = document.querySelectorAll(".admin .imagenesWrap .imagenes label");
      for (var i = 0; i < imagenesCargadas.length; i++) {
        imagenesCargadas[i].style.display = "none";
      }
    }
  });

  let imagenesOpcionCargaNueva = document.querySelector(".imagenesOpcionCargaNueva p");
  imagenesOpcionCargaNueva.addEventListener("click", function(){
    if (imagenesOpcionCargaNueva.innerHTML == "Cargar nueva imagen ▼"){
      imagenesOpcionCargaNueva.innerHTML = "Cargar nueva imagen ▲"
      imagenesOpcionCargaNueva.parentElement.style.height= "auto";
      imagenesOpcionCargaNueva.parentElement.style.overflow= "unset";
    } else {
      imagenesOpcionCargaNueva.innerHTML = "Cargar nueva imagen ▼"
      imagenesOpcionCargaNueva.parentElement.style.height= "38px";
      imagenesOpcionCargaNueva.parentElement.style.overflow= "hidden";
    }
  });



  // funcionalidad thumbnails para imagen principal:
  let opcionesImagen = document.querySelector(".imagenes");
  // console.log(opcionesImagen.children[0]);
  for (var i = 1; i < opcionesImagen.children.length; i++) {
    opcionesImagen.children[i].addEventListener("input", function(){

      imgCanvasFacebook.src = "/storage/noticias/imagenesMain/desktop/" + this.firstElementChild.value;
      setCanvas(canvasFacebook, imgCanvasFacebook);

      // Borrar error de upload externo (si lo hubiera):
      document.querySelector(".alert.filesMain").innerHTML = "";
    });
  }


  // upload externo de nueva imagen:
  function handleFileSelect(evt) {

    let files = evt.target.files; // FileList object

      if(files.length > 0 ){

      let reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        // console.log(files[0]);
        return function(e) {
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png'){

          // Render imagen en Canvas:
          imgCanvasFacebook.src = e.target.result;
          setCanvas(canvasFacebook, imgCanvasFacebook);

          // Crear thumbnail:
          var newRadio = `
              <label class="imagenLabel">
                <div style="background-image: url('${e.target.result}');" class=""></div>
                <input type="radio" name="imagen" value="${e.target.result}" checked>
              </label>
                  `;
          document.getElementById('uploadedImage').innerHTML = newRadio;
          // Darle funcionalidad al thumbnail:
          document.getElementById('uploadedImage').children[0].addEventListener("input", function(){

            imgCanvasFacebook.src = e.target.result;
            setCanvas(canvasFacebook, imgCanvasFacebook);
          });
          // Reset alert:
          document.querySelector(".alert.filesMain").innerHTML = "";
        }else{
          // Mensajes de error:
          if(files[0].type != 'image/jpeg' || files[0].type != 'image/png'){
            document.querySelector(".alert.filesMain").innerHTML = files[0].name + " <b>no es un archivo de imagen válido</b>";
          }

          // Resetear value input:
          document.getElementById('files').value = "";
          // Si había un thumbnail exitoso anterior, borrarlo (la información del file de este thumbnail se reemplazó por el file erróneo y el thumbail ya no es válido):
          document.getElementById('uploadedImage').innerHTML = "";
          // Volver a la imagen precargada que haya quedado "checked" en el iframe y canvas o a imagen default:
          let imagenChecked = document.querySelector(".imagenLabel input:checked");
          if (imagenChecked == null){
            document.querySelector(".imagenLabel input").checked = true;

            imgCanvasFacebook.src = "/storage/noticias/imagenesMain/desktop/Ali.jpg";
            setCanvas(canvasFacebook, imgCanvasFacebook);
          }
        }
        };
      })(files[0]);
      // Read in the image file as a data URL.
      reader.readAsDataURL(files[0]);
    }else{
      document.querySelector(".alert.filesMain").innerHTML = "";

      // Si había un thumbnail exitoso anterior, borrarlo (la información del file de este thumbnail se reemplazó por el file erróneo y el thumbail ya no es válido):
      document.getElementById('uploadedImage').innerHTML = "";

      let imagenChecked = document.querySelector(".imagenLabel input:checked");
      if (imagenChecked == null){
        document.querySelector(".imagenLabel input").checked = true;

        imgCanvasFacebook.src = "/storage/noticias/imagenesMain/desktop/Ali.jpg";
        setCanvas(canvasFacebook, imgCanvasFacebook);
      }
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);




  // filtro imagen principal:
  let filtroImagen = document.querySelectorAll(".filtroImagen input");
  for (var i = 0; i < filtroImagen.length; i++) {
    filtroImagen[i].addEventListener("input", function(){

      setCanvas(canvasFacebook, imgCanvasFacebook);

    });
  }


  // incluir logo AsAAr:
  let logoAsaar = document.querySelector(".logoAsaar");
  logoAsaar.addEventListener("input", function(){

    setCanvas(canvasFacebook, imgCanvasFacebook);

  });



  // incluir calendario:
  let calendar = document.querySelector(".calendar");
  calendar.addEventListener("input", function(){
    if (calendar.firstElementChild.checked == true){
      calendar.parentElement.nextElementSibling.style.display ="flex";

      // completar mes:
      calendar.parentElement.nextElementSibling.children[0].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);

      });

      // completar día de la semana:
      calendar.parentElement.nextElementSibling.children[1].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);

      });

      // completar número:
      calendar.parentElement.nextElementSibling.children[2].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);

      });

    } else {
      calendar.parentElement.nextElementSibling.style.display ="none";
    }

    setCanvas(canvasFacebook, imgCanvasFacebook);
  });


  // incluir titular sobre imagen:
  let tituloImagen = document.querySelector(".tituloImagen textarea");
  tituloImagen.addEventListener("input", function(){
    if (this.value.length > 0){

    document.querySelector(".recuadroTitular").style.display = "block";
    document.querySelector(".colorTipoTitular").style.display = "block";
    document.querySelector(".colorFondoTitular").style.display = "block";

    } else {
      document.querySelector(".colorTipoTitular").style.display = "none";
      document.querySelector(".colorFondoTitular").style.display = "none";
      document.querySelector(".recuadroTitular").style.display = "none";
    }
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });

    // funcionalidad opción recuadro:
    let recuadroTitular = document.querySelector(".recuadroTitular");
    recuadroTitular.addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);

    });

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipo = document.querySelectorAll(".colorTipoTitular input");
    for (var i = 0; i < opcionesColorTipo.length; i++) {
      opcionesColorTipo[i].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondo = document.querySelectorAll(".colorFondoTitular input");
    for (var i = 0; i < opcionesColorFondo.length; i++) {
      opcionesColorFondo[i].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }




  // incluir bajada titular sobre imagen:
  let subtituloImagen = document.querySelector(".subtituloImagen textarea");
  subtituloImagen.addEventListener("input", function(){
    if (this.value.length > 0){

    document.querySelector(".colorTipoSubtitular").style.display = "block";
    document.querySelector(".colorFondoSubtitular").style.display = "block";

    } else if (this.value.length <= 0 && detalleImagen.value <= 0){

      document.querySelector(".colorTipoSubtitular").style.display = "none";
      document.querySelector(".colorFondoSubtitular").style.display = "none";
      }

      setCanvas(canvasFacebook, imgCanvasFacebook);
    });


  // incluir detalle información sobre imagen:
  let detalleImagen = document.querySelector(".detalleImagen textarea");
  detalleImagen.addEventListener("input", function(){
    if (this.value.length > 0){

    document.querySelector(".colorTipoSubtitular").style.display = "block";
    document.querySelector(".colorFondoSubtitular").style.display = "block";

    } else if (this.value.length <= 0 && subtituloImagen.value <= 0){

    document.querySelector(".colorTipoSubtitular").style.display = "none";
    document.querySelector(".colorFondoSubtitular").style.display = "none";
    }

    setCanvas(canvasFacebook, imgCanvasFacebook);
  });

  // funcionalidad thumbnails colores tipografía:
  let opcionesColorTipoSubtitular = document.querySelectorAll(".colorTipoSubtitular input");
  for (var i = 0; i < opcionesColorTipoSubtitular.length; i++) {
    opcionesColorTipoSubtitular[i].addEventListener("input", function(){

      setCanvas(canvasFacebook, imgCanvasFacebook);
    });
  }
  // funcionalidad thumbnails colores fondo:
  let opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
  for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
    opcionesColorFondoSubtitular[i].addEventListener("input", function(){

      setCanvas(canvasFacebook, imgCanvasFacebook);
    });
  }




  // incluir resumen sobre imagen:
  let resumenImagen = document.querySelector(".resumenImagen textarea");
  resumenImagen.addEventListener("input", function(){
    if (this.value.length > 0){

    document.querySelector(".colorTipoResumen").style.display = "block";
    document.querySelector(".colorFondoResumen").style.display = "block";

    } else {

    document.querySelector(".colorTipoResumen").style.display = "none";
    document.querySelector(".colorFondoResumen").style.display = "none";
    }

    setCanvas(canvasFacebook, imgCanvasFacebook);
  });

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipoResumen = document.querySelectorAll(".colorTipoResumen input");
    for (var i = 0; i < opcionesColorTipoResumen.length; i++) {
      opcionesColorTipoResumen[i].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoResumen = document.querySelectorAll(".colorFondoResumen input");
    for (var i = 0; i < opcionesColorFondoResumen.length; i++) {
      opcionesColorFondoResumen[i].addEventListener("input", function(){

        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }




  // incluir mensaje de rectificación sobre imagen:
  let rectificacionImagen = document.querySelector(".rectificacionImagen textarea");
  rectificacionImagen.addEventListener("input", function(){

      setCanvas(canvasFacebook, imgCanvasFacebook);
  });


  // kick off Canvas:
  setCanvas(canvasFacebook, imgCanvasFacebook);


  // DESCARGAR IMAGEN RED SOCIAL
  let linkFacebook = document.getElementById('linkFacebook');
  linkFacebook.addEventListener("click", function(){
    linkFacebook.setAttribute('download', 'imagenRedesSociales.png');
    linkFacebook.setAttribute('href', canvasFacebook.toDataURL("image/png").replace("image/png", "image/octet-stream"));
  });


  // PREVENT SUBMIT:
  let form = document.querySelector('form');
  form.onsubmit = function(event){
    event.preventDefault();
  }



  // FUNCIONES:

  // CANVAS:
  function setCanvas(canvas, imagen){

    if (canvas.getContext){

      var ctx = canvas.getContext("2d");

      ctx.fillStyle = "#ffffff";
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      // SETEAR VARIABLES:
      var logoCanvas = logoAsaar.firstElementChild.checked;

      var calendarioCanvas = calendar.firstElementChild.checked;

      // TITULAR:
      var textoTitular = tituloImagen.value;
      // var textoTitular = "TALLER DE PADRES";
      var maxWidthTitular = 1060;
      var maxWidthTitularRecuadro = maxWidthTitular + 20;
      var fontSizeTitular = 120;
      var fontTitular = "bold " + fontSizeTitular + "px 'Gidugu', sans-serif";
      var lineHeightTitular = 75;
      var lineasTitular = getMotherLines(ctx, textoTitular, maxWidthTitular, fontTitular);
      var hTitular = alturaTexto(lineasTitular, lineHeightTitular);

      // SUBTITULAR:
      var textoSubtitular = subtituloImagen.value;
      // var textoSubtitular = "Para padres de niños, adolescentes y adultos";
      var maxWidthSubtitular = 507;
      var maxWidthSubtitularRecuadro = maxWidthSubtitular + 20;
      var fontSizeSubtitular = 43;
      var fontSubtitular = "bold " + fontSizeSubtitular + "px 'Montserrat', sans-serif";
      var lineHeightSubtitular = 53;
      var lineasSubtitular = getMotherLines(ctx, textoSubtitular, maxWidthSubtitular,fontSubtitular);
      var hSubtitular = alturaTexto(lineasSubtitular, lineHeightSubtitular);

      // DETALLE
      var textoDetalle = detalleImagen.value;
      // var textoDetalle = "LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.Bono contribución $100. Inscripción en https:/ /goo.gl/forms/5UssYYdEHoQJ8b262";
      var maxWidthDetalle = 507;
      var maxWidthDetalleRecuadro = maxWidthDetalle + 20;
      var fontSizeDetalle = 38;
      var fontDetalle = fontSizeDetalle + "px 'Montserrat', sans-serif";
      var lineHeightDetalle = 48;
      var lineasDetalle = getMotherLines(ctx, textoDetalle, maxWidthDetalle, fontDetalle);
      var hDetalle = alturaTexto(lineasDetalle, lineHeightDetalle);

      // RESUMEN
      var textoResumen = resumenImagen.value;
      // var textoResumen = "Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger"
      var maxWidthResumen = 507;
      var maxWidthResumenRecuadro = maxWidthResumen + 20;
      var fontSizeResumen = 38;
      var fontResumen = fontSizeResumen + "px 'Montserrat', sans-serif";
      var lineHeightResumen = 48;
      var lineasResumen = getMotherLines(ctx, textoResumen, maxWidthResumen, fontResumen);
      var hResumen = alturaTexto(lineasResumen, lineHeightResumen);

      // RECTIFICACION
      var textoRectificacion = rectificacionImagen.value;
      // var textoRectificacion = "SUSPENDIDO";
      var maxWidthRectificacion = 1200;
      var fontSizeRectificacion = 150;
      var fontRectificacion = "bold " + fontSizeRectificacion + "px 'Montserrat', sans-serif";
      var lineHeightRectificacion = 160;
      var lineasRectificacion = getMotherLines(ctx, textoRectificacion, maxWidthRectificacion, fontRectificacion);
      var hRectificacion = alturaTexto(lineasRectificacion, lineHeightRectificacion);


      // SETEAR IMAGEN FONDO:
      imagen.src = imagen.src;

      let filtro = opcionChecked(filtroImagen);
      imagen.onload = function(){

        scaleToFill(this, canvas, ctx, filtro);
      // } //cierre onload, lo muevo al final de la función


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
        var posInicialYtitular = ((1170 - 255 - hBox2)/2) + 255 + lineHeightTitular - (hTitular/2);
      } else {
        var posInicialYtitular = ((1170 - hBox2)/2) + lineHeightTitular - (hTitular/2);
      }
      // Coordenada inicial SUBTITULAR:
      // x centrado con respecto al canvas si NO está resúmen:
      if (textoResumen){
        var factorXsubtitular = 8.66 + 527 + 8.66;
      }else{
        var factorXsubtitular = 0;
      }
      // y:
      var posInicialYsubtitular = posInicialYtitular + hTitular -30;
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
      var posInicialYresumen = posInicialYtitular + hTitular -35;


      // IMPRIMIR TEXTOS, RECUADROS, CAMBIAR COLORES:

      // IMPRIMIR WEB EN EL FOOTER:
      ctx.fillStyle = "#6ACF95";
      ctx.fillRect(0, 1155, 1200, 45);
      var webAsaar = "www.asperger.org.ar".split("").join(String.fromCharCode(8202));
      ctx.font = "bold 30px 'Montserrat', sans-serif";
      ctx.fillStyle = "#454545";
      var posXweb = (canvas.width/2) - (ctx.measureText(webAsaar).width/2);
      ctx.fillText(webAsaar, posXweb, 1185);

      // Titular:
      var colorTipoTitular = opcionChecked(opcionesColorTipo);

      var colorFondoTitular = opcionChecked(opcionesColorFondo);

      if (textoTitular && document.querySelector(".recuadroTitular").firstElementChild.firstElementChild.checked == true){
      imprimirRecuadro(canvas, ctx, colorTipoTitular, colorFondoTitular, fontSizeTitular, maxWidthTitularRecuadro, hTitular, factorXtitular, posInicialYtitular);
      } else {
        if (textoTitular && document.querySelector(".recuadroTitular").firstElementChild.firstElementChild.checked == false){
        imprimirRecuadro(canvas, ctx, "transparent", colorFondoTitular, fontSizeTitular, maxWidthTitularRecuadro, hTitular, factorXtitular, posInicialYtitular);
        }
      }

      imprimirTexto (canvas, ctx, lineasTitular, fontTitular, colorTipoTitular, lineHeightTitular, factorXtitular, posInicialYtitular-45);

      // Subtitular:
      var colorTipoSubitular = opcionChecked(opcionesColorTipoSubtitular);

      var colorFondoSubtitular = opcionChecked(opcionesColorFondoSubtitular);

      if (textoSubtitular || textoDetalle){
      imprimirRecuadroRadius(canvas, ctx, colorFondoSubtitular, fontSizeSubtitular, factorXsubtitular, posInicialYsubtitular, maxWidthSubtitularRecuadro, hSubtitular + hDetalle, 10);
      }

      imprimirTexto (canvas, ctx,lineasSubtitular, fontSubtitular, colorTipoSubitular, lineHeightSubtitular, factorXsubtitular, posInicialYsubtitular);

      // Detalle:
      imprimirTexto (canvas, ctx,lineasDetalle, fontDetalle, colorTipoSubitular, lineHeightDetalle, factorXdetalle, posInicialYdetalle);

      // Resumen:
      var colorTipoResumen = opcionChecked(opcionesColorTipoResumen);

      var colorFondoResumen = opcionChecked(opcionesColorFondoResumen);

      if (textoResumen){
      imprimirRecuadroRadius(canvas, ctx, colorFondoResumen, fontSizeResumen, factorXresumen, posInicialYresumen, maxWidthResumenRecuadro, hResumen, 10);
      }
      imprimirTexto (canvas, ctx,lineasResumen, fontResumen, colorTipoResumen, lineHeightResumen, factorXresumen, posInicialYresumen);

      // IMPRIMIR LOGO:
      if (logoCanvas){
        let logoAsaarImg = document.querySelector(".logoAsaarImg");
        ctx.drawImage(logoAsaarImg, 30, 30, 339.42, 195);
      }

      // IMPRIMIR CALENDARIO:
      if (calendarioCanvas){
        ctx.rotate(3 * Math.PI / 180);
        ctx.shadowBlur = 20;
        ctx.shadowOffsetX = 10;
        ctx.shadowOffsetY = 10;
        ctx.shadowColor = "black";
        ctx.fillStyle = "#fffadf";
        ctx.fillRect(960, -10, 195, 195);

        ctx.shadowBlur = 0;
        ctx.shadowOffsetX = 0;
        ctx.shadowOffsetY = 0;
        ctx.shadowColor = "#000000";
        ctx.fillStyle = "#f72929";
        ctx.fillRect(964, -7, 188, 56);

        var mesCalendario = calendar.parentElement.nextElementSibling.children[0].firstElementChild.value;
        ctx.font = "bold 28px Helvetica";
        ctx.fillStyle = "#fffadf";
        var mesPosX = 964 + ((188 - ctx.measureText(mesCalendario).width)/2);
        ctx.fillText(mesCalendario, mesPosX, 32);

        var diaCalendario = calendar.parentElement.nextElementSibling.children[1].firstElementChild.value.split("").join(String.fromCharCode(8201));
        ctx.font = "26px Helvetica";
        ctx.fillStyle = "black";
        var diaPosX = 964 + ((188 - ctx.measureText(diaCalendario).width)/2);
        ctx.fillText(diaCalendario, diaPosX, 80);

        var nroCalendario = calendar.parentElement.nextElementSibling.children[2].firstElementChild.value;
        ctx.font = "bold 80px Helvetica";
        ctx.fillStyle = "black";
        var nroPosX = 964 + ((188 - ctx.measureText(nroCalendario).width)/2);
        ctx.fillText(nroCalendario, nroPosX, 160);

        ctx.rotate(-3 * Math.PI / 180);
      }

      // IMPRIMIR RECTIFICACION:
      ctx.rotate(-45 * Math.PI / 180);

      var posInicialYrectificacion = (1800/2) - (hRectificacion/2) + (lineHeightRectificacion/2);

      imprimirTexto (canvas, ctx, lineasRectificacion, fontRectificacion, "#f72929", lineHeightRectificacion, -1200, posInicialYrectificacion);

      ctx.rotate(45 * Math.PI / 180);

    } //cierre onload imgCanvas

      } else {
        // canvas-unsupported code here
    }
  } // cierre function setCanvas()



  // FUNCIONES CANVAS:

  function imprimirTexto (canvas, context, text, font, color, lineHeight, xFactor, y){
      var posY = y - lineHeight;
      var posX;
      for (var i = 0; i < text.length; i++) {
        for (var ii = 0; ii < text[i].length; ii++) {
          context.font = font;
          // context.fillStyle = "#ab2097";
          context.fillStyle = color;
          posX = ((canvas.width - xFactor) /2) + xFactor - (context.measureText(text[i][ii]).width/2);
          posY = posY + lineHeight;
          context.fillText(text[i][ii], posX, posY);
        }
      }
    }


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


  function imprimirRecuadro(canvas, context, colorTipo, colorFondo, fontSize, width, height, xFactor, y){
      var posY = y - fontSize - 20;
      var posX;

      posX = ((canvas.width - xFactor) /2) + xFactor - (width/2);

      context.beginPath();
      context.lineWidth = "4";
      context.strokeStyle = colorTipo;
      context.rect(posX, posY, width, height);
      context.fillStyle = colorFondo;
      context.stroke();
      context.fill();
    }


  function imprimirRecuadroRadius (canvas, context, colorFondo, fontSize, xFactor, y, width, height, radius){
      var posY = y - fontSize - 20;
      var posX;

      posX = ((canvas.width - xFactor) /2) + xFactor - (width/2);

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
    }


  function scaleToFill(img, canvas, context, filter){
      // get the scale
      var scale = Math.max(canvas.width / img.width, canvas.height / img.height);
      // get the top left position of the image
      var x = (canvas.width / 2) - (img.width / 2) * scale;
      var y = (canvas.height / 2) - (img.height / 2) * scale;
      context.filter = filter;
      context.drawImage(img, x, y, img.width * scale, img.height * scale);
      context.filter = 'none';
  }


  function opcionChecked(inputs){
    let opciones = inputs;
    for (var i = 0; i < opciones.length; i++) {
      if (opciones[i].checked == true){
        let opcionElegida = opciones[i].value;
        return opcionElegida;
      }
    }
  }

  window.addEventListener('keydown',function(e){
    if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){
      if(e.target.nodeName ==='INPUT'&& e.target.type !== 'textarea'){
        e.preventDefault();return false;
      }
    }
  },true);

} // fin onload
