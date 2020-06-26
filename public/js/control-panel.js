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


      // if (window.confirm(mensaje)) {
      //   // console.log("confirmado");
      //   form.submit();
      // // } else {
      // //   console.log("cancelado");
      // }



      if (window.confirm(mensaje)) {

        // var csrf = this.previousElementSibling.firstElementChild.nextElementSibling.value;
        // console.log(csrf);
        // var idNoticia = this.previousElementSibling.firstElementChild.nextElementSibling.nextElementSibling.value;
        // console.log(idNoticia);

        // var campos = {
        //   token: token,
        //   idNoticia: idNoticia,
        // }
        // var datosDelForm = new FormData();
        // datosDelForm.append('request', JSON.stringify(campos));
        // console.log(datosDelForm);

        // fetch("/api/eliminar-noticia", {
        //   method: 'DELETE',
        //   // body: datosDelForm
        //   body: JSON.stringify({
        //     token: token,
        //     idNoticia: idNoticia,
        //         })
        // })
        // .then(function(response){
        //   return response.text();
        // })
        // .then(function(data){
        //   console.log(data);
        // })

        var csrf = this.previousElementSibling.firstElementChild.value;
        console.log(csrf);
        var idNoticia = this.previousElementSibling.firstElementChild.nextElementSibling.value;
        console.log(idNoticia);

        let form = new FormData

        form.append('_token', csrf)
        form.append('idNoticia', idNoticia)

        fetch("/api/api-eliminar-noticia", {
        method: 'post',
        // body: JSON.stringify({
        //   _token: token,
        //   idNoticia: idNoticia,
        //       })
        body: form
        }).then(function (res) {
            console.log(res.json())
        })

      }








    });
  }


} //fin onload
