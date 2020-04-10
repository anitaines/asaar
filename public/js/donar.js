var titulo_opcion = document.querySelectorAll(".titulo_opcion");

titulo_opcion.forEach(function(titulo){

  titulo.onclick = function (){

    event.preventDefault();

    if (titulo.nextElementSibling.classList.contains("detalle_opcion_display")){

      titulo_opcion.forEach(function(titulo){
        titulo.nextElementSibling.classList.add("detalle_opcion_display");

        titulo.lastElementChild.innerHTML = "▼";
        });

      titulo.nextElementSibling.classList.remove("detalle_opcion_display");

      titulo.lastElementChild.innerHTML = "▲";

    } else {
      titulo.nextElementSibling.classList.add("detalle_opcion_display");

      titulo.lastElementChild.innerHTML = "▼";
    }
  }
});
