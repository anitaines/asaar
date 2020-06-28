window.onload = function(){

  // ELIMINAR IMAGEN:
  let eliminar = document.querySelectorAll(".eliminar");

  for (var i = 0; i < eliminar.length; i++) {
    eliminar[i].addEventListener("click", function(){
      // let form = this.previousElementSibling;

      let mensaje = "La imagen será eliminada.";

      if (window.confirm(mensaje)) {

        // form.submit();

        let imagen = this.parentElement;

        let csrf = this.previousElementSibling.firstElementChild.nextElementSibling.value;

        let idImagen = this.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling.value;

        let datosDelForm = new FormData;

        datosDelForm.append('_method', 'DELETE');
        datosDelForm.append('_token', csrf);
        datosDelForm.append('idImagen', idImagen);

        fetch("/eliminar-imagen", {
          method: 'post',
          body: datosDelForm
        })
        .then(function (res) {
          // console.log(res.json());
          if (res.ok){
            imagen.remove();
          }
        })
        .catch(function(error) {
          console.log('Hubo un problema con la petición Fetch:' + error.message);
        });

      }
    });
  }

} //fin onload
