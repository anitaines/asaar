window.onload = function(){

  // ELIMINAR IMAGEN:
  let eliminar = document.querySelectorAll(".eliminar");

  for (var i = 0; i < eliminar.length; i++) {
    eliminar[i].addEventListener("click", function(){
      let form = this.previousElementSibling;

      let mensaje = "La imagen será eliminada.";


      if (window.confirm(mensaje)) {

        form.submit();
        
      }
    });
  }

} //fin onload
