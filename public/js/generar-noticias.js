window.onload = function(){

  // PREVIEW y SETEO NOTICIA y CANVAS:

  // iframe para preview noticia:
  let iframe = document.getElementById("output_iframe");

  // preview imagen principal en iframe:
  let imagenPrincipal = iframe.contentWindow.document.querySelector(".img_container");
  let imagenPrincipalWrap = iframe.contentWindow.document.querySelector(".wrap_img");

  // imagen para canvas:
  // let imgCanvas = document.getElementById('imgCanvas');
  let imgCanvasFacebook = document.getElementById('imgCanvasFacebook');
  // let imgCanvasTwitter = document.getElementById('imgCanvasTwitter');

  // canvas para preview imagen red social:
  let canvasFacebook = document.getElementById("canvasFacebook");

  // var canvasTwitter = document.getElementById("canvasTwitter");
  // // console.log(canvasTwitter);



  // setear titular noticia:
  let inputTitulo = document.getElementById("title");
  inputTitulo.addEventListener("input", function(){
    let titulo = iframe.contentWindow.document.getElementsByTagName("h3")[0];

    titulo.style.display = "block";
    titulo.innerHTML = this.value;
    // validar titular noticia oninput:
    validarTitulo();
  });

  // validar titular noticia onblur:
  inputTitulo.addEventListener("blur", function(){
    validarTitulo();
  });



  // setear bajada titular noticia:
  let inputSubtitulo = document.getElementById("subtitle");
  inputSubtitulo.addEventListener("input", function(){
    let subtitulo = iframe.contentWindow.document.getElementsByTagName("h4")[0];

    subtitulo.style.display = "block";
    subtitulo.innerHTML = this.value;

    // validar subtitulo noticia:
    validarSubtitulo();
  });



  // setear imagen principal:

  // incluir imagen principal == sí => display de más opciones y display de preview imagen en iframe:
  let imagenNoticiaCheckbox = document.querySelector(".imagenNoticia");
  imagenNoticiaCheckbox.addEventListener("input", function(){
    if (imagenNoticiaCheckbox.firstElementChild.checked == true){
      document.querySelector(".admin .imagenesWrap").style.display ="block";
      imagenPrincipalWrap.style.display = "block";
      // Canvas:
      setCanvas(canvasFacebook, imgCanvasFacebook);
    } else {
      document.querySelector(".admin .imagenesWrap").style.display ="none";
      imagenPrincipalWrap.style.display = "none";
      // Canvas:
      setCanvas(canvasFacebook, imgCanvasFacebook);
    }
  });



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
      // insertar imagen elegida en preview iframe:
      imagenPrincipal.style.backgroundImage = "url('storage/noticias/imagenesMain/" + this.firstElementChild.value + "')";
      // Canvas:
      imgCanvasFacebook.src = "storage/noticias/imagenesMain/" + this.firstElementChild.value;
      setCanvas(canvasFacebook, imgCanvasFacebook);
      // Borrar error de upload externo (si lo hubiera):
      document.querySelector(".alert.filesMain").innerHTML = "";
    });
  }



  // upload externo de nueva imagen principal:
  function handleFileSelect(evt) {

    let files = evt.target.files; // FileList object

      if(files.length > 0 ){

      let reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        // console.log(files[0]);
        return function(e) {
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png' && files[0].size < 2100000){
          // Render imagen:
          imagenPrincipal.style.backgroundImage = "url(" + e.target.result + ")";

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
            // imagen.style.display = "block";
            imagenPrincipal.style.backgroundImage = "url(" + e.target.result + ")";

            // Canvas:
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
          if(files[0].size >= 2100000){
            document.querySelector(".alert.filesMain").innerHTML = files[0].name + " <b> archivo demasiado grande. La imagen no debe pesar más de 2MB</b>";
          }
          // Resetear value input:
          document.getElementById('files').value = "";
          // Si había un thumbnail exitoso anterior, borrarlo (la información del file de este thumbnail se reemplazó por el file erróneo y el thumbail ya no es válido):
          document.getElementById('uploadedImage').innerHTML = "";
          // Volver a la imagen precargada que haya quedado "checked" en el iframe y canvas o a imagen default:
          let imagenChecked = document.querySelector(".imagenLabel input:checked");
          if (imagenChecked == null){
            document.querySelector(".imagenLabel input").checked = true;

            imagenPrincipal.style.backgroundImage = "url(storage/noticias/imagenesMain/Ali.jpg)";

            imgCanvasFacebook.src = "storage/noticias/imagenesMain/Ali.jpg";
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

        imagenPrincipal.style.backgroundImage = "url(storage/noticias/imagenesMain/Ali.jpg)";

        imgCanvasFacebook.src = "storage/noticias/imagenesMain/Ali.jpg";
        setCanvas(canvasFacebook, imgCanvasFacebook);
      }
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);




  // filtro imagen principal:
  let filtroImagen = document.querySelectorAll(".filtroImagen input");
  for (var i = 0; i < filtroImagen.length; i++) {
    filtroImagen[i].addEventListener("input", function(){
      imagenPrincipal.style.filter = this.value;
      // Canvas:
      setCanvas(canvasFacebook, imgCanvasFacebook);
    });
  }



  // incluir logo AsAAr:
  let logoAsaar = document.querySelector(".logoAsaar");
  logoAsaar.addEventListener("input", function(){
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
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir calendario:
  let calendar = document.querySelector(".calendar");
  calendar.addEventListener("input", function(){
    let calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");
    if (calendar.firstElementChild.checked == true){
      calendarioIframe.style.display ="flex";
      calendar.parentElement.nextElementSibling.style.display ="flex";

      if (iframe.contentWindow.document.querySelector(".info_img_container .box1 img").style.display == "none"){
        iframe.contentWindow.document.querySelector(".info_img_container .box1").style.justifyContent="flex-end";
      } else {
        iframe.contentWindow.document.querySelector(".info_img_container .box1").style.justifyContent="space-between";
      }

      // completar mes:
      calendar.parentElement.nextElementSibling.children[0].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_mes").firstElementChild.innerHTML = this.firstElementChild.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
      // completar día de la semana:
      calendar.parentElement.nextElementSibling.children[1].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").firstElementChild.innerHTML = this.firstElementChild.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
      // completar número:
      calendar.parentElement.nextElementSibling.children[2].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar .calendar_dia").lastElementChild.innerHTML = this.firstElementChild.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });

    } else {
      calendarioIframe.style.display ="none";
      calendar.parentElement.nextElementSibling.style.display ="none";
    }
    checkLayout();
    // Canvas:
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir titular sobre imagen:
  let tituloImagen = document.querySelector(".tituloImagen textarea");
  tituloImagen.addEventListener("input", function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box2 p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".recuadroTitular").style.display = "block";

    // funcionalidad opción recuadro:
    let recuadroTitular = document.querySelector(".recuadroTitular");
    recuadroTitular.addEventListener("input", function(){
      if (recuadroTitular.firstElementChild.firstElementChild.checked == true){
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.border = "4px solid " + iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      } else {
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.border = "0px solid " + iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      }
    });

    document.querySelector(".colorTipoTitular").style.display = "block";

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipo = document.querySelectorAll(".colorTipoTitular input");
    for (var i = 0; i < opcionesColorTipo.length; i++) {
      opcionesColorTipo[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color = this.value;
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.borderColor = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    document.querySelector(".colorFondoTitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondo = document.querySelectorAll(".colorFondoTitular input");
    for (var i = 0; i < opcionesColorFondo.length; i++) {
      opcionesColorFondo[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box2").style.backgroundColor = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box2").style.display = "none";

      document.querySelector(".colorTipoTitular").style.display = "none";

      document.querySelector(".colorFondoTitular").style.display = "none";

      document.querySelector(".recuadroTitular").style.display = "none";
    }

    // validación:
    validarTituloImagen();

    checkLayout();
    // Canvas:
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir bajada titular sobre imagen:
  let subtituloImagen = document.querySelector(".subtituloImagen textarea");
  subtituloImagen.addEventListener("input", function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoSubtitular").style.display = "block";

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipoSubtitular = document.querySelectorAll(".colorTipoSubtitular input");
    for (var i = 0; i < opcionesColorTipoSubtitular.length; i++) {
      opcionesColorTipoSubtitular[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color = this.value;

        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.color = this.value;

        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

  } else {
    if (this.value.length <= 0 && detalleImagen.value <= 0){
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.display = "none";

      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.display = "none";
    }
    }
    // validación:
    validarSubtituloImagen();

    checkLayout();
    // Canvas:
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir detalle información sobre imagen:
  let detalleImagen = document.querySelector(".detalleImagen textarea");
  detalleImagen.addEventListener("input", function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoSubtitular").style.display = "block";

    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipoSubtitular = document.querySelectorAll(".colorTipoSubtitular input");
    for (var i = 0; i < opcionesColorTipoSubtitular.length; i++) {
      opcionesColorTipoSubtitular[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color = this.value;

        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.color = this.value;

        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    document.querySelector(".colorFondoSubtitular").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    let opcionesColorFondoSubtitular = document.querySelectorAll(".colorFondoSubtitular input");
    for (var i = 0; i < opcionesColorFondoSubtitular.length; i++) {
      opcionesColorFondoSubtitular[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    } else {
      if (this.value.length <= 0 && subtituloImagen.value <= 0){
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.display = "none";

      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "none";

      document.querySelector(".colorTipoSubtitular").style.display = "none";

      document.querySelector(".colorFondoSubtitular").style.display = "none";
    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child").style.display = "none";
    }
    }
    // validación:
    validarDetalleImagen();

    checkLayout();
    // Canvas:
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir resumen sobre imagen:
  let resumenImagen = document.querySelector(".resumenImagen textarea");
  resumenImagen.addEventListener("input", function(){
    if (this.value.length > 0){
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.display = "block";
    iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").innerHTML = this.value.replace(/\n/g, "<br>");

    document.querySelector(".colorTipoResumen").style.display = "block";
    // funcionalidad thumbnails colores tipografía:
    let opcionesColorTipoResumen = document.querySelectorAll(".colorTipoResumen input");
    for (var i = 0; i < opcionesColorTipoResumen.length; i++) {
      opcionesColorTipoResumen[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").style.color = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    document.querySelector(".colorFondoResumen").style.display = "block";
    // funcionalidad thumbnails colores fondo:
    var opcionesColorFondoResumen = document.querySelectorAll(".colorFondoResumen input");
    for (var i = 0; i < opcionesColorFondoResumen.length; i++) {
      opcionesColorFondoResumen[i].addEventListener("input", function(){
        iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.backgroundColor = this.value;
        // Canvas:
        setCanvas(canvasFacebook, imgCanvasFacebook);
      });
    }

    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.display = "none";

      document.querySelector(".colorTipoResumen").style.display = "none";

      document.querySelector(".colorFondoResumen").style.display = "none";
    }
    // validación:
    validarResumenImagen();

    checkLayout();
    // Canvas:
    setCanvas(canvasFacebook, imgCanvasFacebook);
  });



  // incluir mensaje de rectificación sobre imagen:
  let rectificacionImagen = document.querySelector(".rectificacionImagen textarea");
  rectificacionImagen.addEventListener("input", function(){
    if (this.value.length > 0){
      iframe.contentWindow.document.querySelector(".info_img_container .box4").style.display = "block";
      iframe.contentWindow.document.querySelector(".info_img_container .box4 p").innerHTML = this.value.replace(/\n/g, "<br>");
      // Canvas:
      setCanvas(canvasFacebook, imgCanvasFacebook);
    } else {
      iframe.contentWindow.document.querySelector(".info_img_container .box4").style.display = "none";
      // Canvas:
      setCanvas(canvasFacebook, imgCanvasFacebook);
    }
    // validación:
    validarRectificacionImagen();
  });



  // párrafo noticia:
  let parrafo = iframe.contentWindow.document.querySelector(".parrafo");
  let inputContenido = document.getElementById("content");
  inputContenido.addEventListener("input", function(){
    parrafo.style.display = "block";
    // parrafo.innerHTML = this.value.replace(/\n/g, "<br>");

    let nuevoParrafo = " <br> " + this.value.replace(/\n/g, " <br> ");

    let parrafoLineasArray = nuevoParrafo.split(" ");

    let aMail = parrafoLineasArray.filter(filtrarMail);

    function filtrarMail(value){
      return value.includes("@");
    }

    let aWeb = parrafoLineasArray.filter(filtrarWeb);

    function filtrarWeb(value){
      let regex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gi;
      return regex.test(value);
    }

    for (var i = 0; i < aMail.length; i++) {
      nuevoParrafo = nuevoParrafo.replace(" "+aMail[i], ' <a href="mailto:' + aMail[i] + '">' + aMail[i] + '</a>' );
    }

    for (var i = 0; i < aWeb.length; i++) {
      if (aWeb[i].includes("http://") || aWeb[i].includes("https://")){
        nuevoParrafo = nuevoParrafo.replace(" "+aWeb[i], ' <a href="' + aWeb[i] + '" target="_blank" rel="noreferrer">' + aWeb[i] + '</a> ');
      } else {
        nuevoParrafo = nuevoParrafo.replace(" "+aWeb[i], ' <a href="http://' + aWeb[i] + '" target="_blank" rel="noreferrer">' + aWeb[i] + '</a> ');
      }
    }

    parrafo.innerHTML = nuevoParrafo;

    // validación:
    validarContentNoticia()
  });



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
          if(files[0].type == 'image/jpeg' || files[0].type == 'image/png' && files[0].size < 2100000){
          // Render imagen:
          let iframe = document.getElementById("output_iframe");
          let imagenesAdicionales = iframe.contentWindow.document.querySelector(`.${evt.target.id}`);
          let newImagen = `
              <img src="${e.target.result}" alt="imagen noticia">
                  `;
          imagenesAdicionales.innerHTML += newImagen;
          // Crear thumbnail:
          let newThumbnail = `
                <div class="" style="background-image: url('${e.target.result}'); height: 150px"></div>
                  `;
          document.getElementById(evt.target.id).nextElementSibling.nextElementSibling.innerHTML += newThumbnail;

          document.getElementById(`${evt.target.id}`).style.display="none";
          document.getElementById(`${evt.target.id}`).nextElementSibling.style.display="block";

          // Reset alert:
          document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = "";
        }else{
          // Mensajes de error:
          if(files[0].type != 'image/jpeg' || files[0].type != 'image/png'){
            document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = files[0].name + " <b>no es un archivo de imagen válido</b>";
          }
          if(files[0].size >= 2100000){
            document.getElementById(`${evt.target.id}`).parentElement.lastElementChild.innerHTML = files[0].name + " <b> archivo demasiado grande. La imagen no debe pesar más de 2MB</b>";
          }
          // Resetear value input:
          document.getElementById(`${evt.target.id}`).value = "";
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
  let remover = document.querySelectorAll(".remover");
  for (var i = 0; i < remover.length; i++) {
    remover[i].addEventListener("click", function(){

      let identificador = this.previousElementSibling.name;

      // borrar imagen en iframe:
      let imagenesAdicionales = iframe.contentWindow.document.querySelector("." + identificador);
      imagenesAdicionales.children[0].remove();
      // borrar thumbail en documento:
      this.nextElementSibling.children[0].remove();
      // restablecer input:
      this.previousElementSibling.style.display="inline-block";
      this.previousElementSibling.value="";
      this.style.display="none";
    });
  }



  // DESCARGAR IMAGEN RED SOCIAL
  let linkFacebook = document.getElementById('linkFacebook');
  linkFacebook.addEventListener("click", function(){
    linkFacebook.setAttribute('download', 'imagenRedesSociales.png');
    linkFacebook.setAttribute('href', canvasFacebook.toDataURL("image/png").replace("image/png", "image/octet-stream"));
  });

  // VALIDAR FORMULARIO
  // validar TITULO NOTICIA
  function validarTitulo(){
    let alert = document.querySelector(".alert.title");
    let alertSubmit = document.querySelector(".alert.title.submit");
    if (inputTitulo.value.length == 0){
      alert.innerHTML = "Este campo debe estar completo";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else if (inputTitulo.value.length > 255){
      alert.innerHTML = "Este campo debe tener como máximo 255 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar BAJADA TITULO NOTICIA
  function validarSubtitulo(){
    let alert = document.querySelector(".alert.subtitle");
    let alertSubmit = document.querySelector(".alert.subtitle.submit");
    if (inputSubtitulo.value.length > 255){
      alert.innerHTML = "Este campo debe tener como máximo 255 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar TITULO SOBRE IMAGEN
  function validarTituloImagen(){
    let alert = document.querySelector(".alert.tituloImagen");
    let alertSubmit = document.querySelector(".alert.tituloImagen.submit");
    if (tituloImagen.value.length > 500){
      alert.innerHTML = "Este campo debe tener como máximo 500 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar BAJADA TITULO SOBRE IMAGEN
  function validarSubtituloImagen(){
    let alert = document.querySelector(".alert.subtituloImagen");
    let alertSubmit = document.querySelector(".alert.subtituloImagen.submit");
    if (subtituloImagen.value.length > 500){
      alert.innerHTML = "Este campo debe tener como máximo 500 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar DETALLE SOBRE IMAGEN
  function validarDetalleImagen(){
    let alert = document.querySelector(".alert.detalleImagen");
    let alertSubmit = document.querySelector(".alert.detalleImagen.submit");
    if (detalleImagen.value.length > 500){
      alert.innerHTML = "Este campo debe tener como máximo 500 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar RESUMEN SOBRE IMAGEN
  function validarResumenImagen(){
    let alert = document.querySelector(".alert.resumenImagen");
    let alertSubmit = document.querySelector(".alert.resumenImagen.submit");
    if (resumenImagen.value.length > 500){
      alert.innerHTML = "Este campo debe tener como máximo 500 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar RECTIFICACION SOBRE IMAGEN
  function validarRectificacionImagen(){
    let alert = document.querySelector(".alert.rectificacionImagen");
    let alertSubmit = document.querySelector(".alert.rectificacionImagen.submit");
    if (rectificacionImagen.value.length > 255){
      alert.innerHTML = "Este campo debe tener como máximo 255 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // validar CONTENIDO
  function validarContentNoticia(){
    let alert = document.querySelector(".alert.contentNoticia");
    let alertSubmit = document.querySelector(".alert.contentNoticia.submit");
    if (inputContenido.value.length > 3000){
      alert.innerHTML = "Este campo debe tener como máximo 3000 caracteres";
      alert.style.display = "block";
      alertSubmit.style.display = "block";
      return false;
    } else {
      alert.style.display = "none";
      alertSubmit.style.display = "none";
      return true;
    }
  }
  // VALIDAR SUBMIT:
  let form = document.querySelector('form');
  form.onsubmit = function(event){

      if(!validarTitulo() || !validarSubtitulo() || !validarTituloImagen() || !validarSubtituloImagen() || !validarDetalleImagen() || !validarResumenImagen() || !validarRectificacionImagen() || !validarContentNoticia()){
        event.preventDefault();
        document.querySelector(".resumenErrores").style.display = "block";
      }
  }



  // FUNCIONES:

  function checkLayout(){

    let infoImgContainerIframe = iframe.contentWindow.document.querySelector(".info_img_container");

    let boxUnoIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1");
    let logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
    let calendarioIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 .calendar");

    let boxDosIframe = iframe.contentWindow.document.querySelector(".info_img_container .box2");

    let subtituloImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child");
    let detalleImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:last-child");
    let resumenImagenIframe = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child");

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
      // imgCanvas.src = imgCanvas.src;
      imagen.src = imagen.src;

      let filtro = imagenPrincipal.style.filter;
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
      var colorTipoTitular = iframe.contentWindow.document.querySelector(".info_img_container .box2 p").style.color;

      var colorFondoTitular = iframe.contentWindow.document.querySelector(".info_img_container .box2").style.backgroundColor;

      if (textoTitular && document.querySelector(".recuadroTitular").firstElementChild.firstElementChild.checked == true){
      imprimirRecuadro(canvas, ctx, colorTipoTitular, colorFondoTitular, fontSizeTitular, maxWidthTitularRecuadro, hTitular, factorXtitular, posInicialYtitular);
      } else {
        if (textoTitular && document.querySelector(".recuadroTitular").firstElementChild.firstElementChild.checked == false){
        imprimirRecuadro(canvas, ctx, "transparent", colorFondoTitular, fontSizeTitular, maxWidthTitularRecuadro, hTitular, factorXtitular, posInicialYtitular);
        }
      }

      imprimirTexto (canvas, ctx, lineasTitular, fontTitular, colorTipoTitular, lineHeightTitular, factorXtitular, posInicialYtitular-45);

      // Subtitular:
      var colorTipoSubitular = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child p:first-child").style.color;

      var colorFondoSubtitular = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:last-child").style.backgroundColor;

      if (textoSubtitular || textoDetalle){
      imprimirRecuadroRadius(canvas, ctx, colorFondoSubtitular, fontSizeSubtitular, factorXsubtitular, posInicialYsubtitular, maxWidthSubtitularRecuadro, hSubtitular + hDetalle, 10);
      }

      imprimirTexto (canvas, ctx,lineasSubtitular, fontSubtitular, colorTipoSubitular, lineHeightSubtitular, factorXsubtitular, posInicialYsubtitular);

      // Detalle:
      imprimirTexto (canvas, ctx,lineasDetalle, fontDetalle, colorTipoSubitular, lineHeightDetalle, factorXdetalle, posInicialYdetalle);

      // Resumen:
      var colorTipoResumen = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child p").style.color;

      var colorFondoResumen = iframe.contentWindow.document.querySelector(".info_img_container .box3 div:first-child").style.backgroundColor;

      if (textoResumen){
      imprimirRecuadroRadius(canvas, ctx, colorFondoResumen, fontSizeResumen, factorXresumen, posInicialYresumen, maxWidthResumenRecuadro, hResumen, 10);
      }
      imprimirTexto (canvas, ctx,lineasResumen, fontResumen, colorTipoResumen, lineHeightResumen, factorXresumen, posInicialYresumen);

      // IMPRIMIR LOGO:
      if (logoCanvas){
        let logoAsaarIframe = iframe.contentWindow.document.querySelector(".info_img_container .box1 img");
        ctx.drawImage(logoAsaarIframe, 30, 30, 339.42, 195);
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


} // fin onload
