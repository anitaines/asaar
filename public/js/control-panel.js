window.onload = function(){

  // ELIMINAR NOTICIA:
  let eliminar = document.querySelectorAll(".eliminar");

  for (var i = 0; i < eliminar.length; i++) {
    eliminar[i].addEventListener("click", function(){
      let form = this.previousElementSibling;

      let noticiaNro = this.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.nextElementSibling.firstElementChild.value;
      let noticiaTitulo = this.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild.innerHTML;
      let noticiaFecha = this.nextElementSibling.nextElementSibling.firstElementChild.nextElementSibling.innerHTML;

      let mensaje = 'Eliminar noticia \nNro. ' + noticiaNro + '\nTítulo: ' + noticiaTitulo + '\n' + noticiaFecha;


      if (window.confirm(mensaje)) {
        console.log("confirmado");
        form.submit();
      // } else {
      //   console.log("cancelado");
      }
    });
  }


} //fin onload
