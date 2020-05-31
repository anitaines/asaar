window.onload = function(){

checkLayout();

function checkLayout(){

  let infoImgContainer = document.querySelector(".info_img_container");

  let boxUno = document.querySelector(".info_img_container .box1");
  // console.log(boxUno);
  let logoAsaar = document.querySelector(".info_img_container .box1 img");
  let calendario = document.querySelector(".info_img_container .box1 .calendar");
  // console.log(calendario);

  let boxDos = document.querySelector(".info_img_container .box2");
  // console.log(boxDos);

  let subtituloImagen = document.querySelector(".info_img_container .box3 div:last-child p:first-child");
  let detalleImagen = document.querySelector(".info_img_container .box3 div:last-child p:last-child");
  let resumenImagen = document.querySelector(".info_img_container .box3 div:first-child");

  // empieza chequeo:
  if(
    (logoAsaar.style.display != "none" || calendario.style.display != "none" ) &&
    boxDos.style.display == "none" &&
    resumenImagen.style.display == "none" &&
    subtituloImagen.style.display == "none" &&
    detalleImagen.style.display == "none"
    ){
    infoImgContainer.style.alignContent="space-between";
    boxUno.style.marginTop="20px";
    } else {
      infoImgContainer.style.alignContent="space-evenly";
      boxUno.style.marginTop="0px";
    }
  }

}
