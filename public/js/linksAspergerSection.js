// window.onload = function(){

// ** NAVEGACION: **
// Desactivando el scroll smooth para esta sección:
document.documentElement.style.scrollBehavior = "auto";

// Capturando todos los elementos que voy a necesitar:
var aspergerCEALink = document.querySelector(".link_aspergerCEA a");
// var aspergerCEADiv = document.querySelector(".intro_aspergerCEA");

var diagnosticosLink = document.querySelector(".link_diagnosticos a");
// var diagnosticosDiv = document.querySelector(".main_diagnosticos");

var intervencionesLink = document.querySelector(".link_intervenciones a");
// var intervencionesDiv = document.querySelector(".main_intervenciones");

var bibliotecaLink = document.querySelector(".link_biblioteca a");
// var bibliotecaDiv = document.querySelector(".main_biblioteca");


// Acciones:

aspergerCEALink.onclick = function (){
  underline (this);
}

diagnosticosLink.onclick = function (){
  underline (this);
}

intervencionesLink.onclick = function (){
  underline (this);
}

bibliotecaLink.onclick = function (){
  underline (this);
}

// let observer = new IntersectionObserver((entries, observer) => {
//   entries.forEach(entry => {
//       if(entry.isIntersecting){
//             switch (entry.target.className) {
//               case "h1_aspergerCEA h1_intro_aspergerCEA":
//                 underline (aspergerCEALink);
//                 break;
//               case "h1_aspergerCEA h1_diagnosticos":
//                   underline (diagnosticosLink);
//                 break;
//               case "h1_aspergerCEA h1_intervenciones":
//                   underline (intervencionesLink);
//                 break;
//               case "h1_aspergerCEA h1_biblioteca":
//                   underline (bibliotecaLink);
//                 break;
//               default:
//                 underline (aspergerCEALink);
//             }
//         }
//       });
//   }, {rootMargin: "-15% 0% -50% 0%"});
//
// document.querySelectorAll('.h1_aspergerCEA').forEach(h1 => { observer.observe(h1) });

let observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
      if(entry.isIntersecting){
            switch (entry.target.className) {
              case "main_aspergerCEA intro_aspergerCEA":
                underline (aspergerCEALink);
                break;
              case "main_aspergerCEA main_diagnosticos":
                  underline (diagnosticosLink);
                break;
              case "main_aspergerCEA main_intervenciones":
                  underline (intervencionesLink);
                break;
              case "main_aspergerCEA main_biblioteca":
                  underline (bibliotecaLink);
                break;
              default:
                underline (aspergerCEALink);
            }
        }
      });
  }, {rootMargin: "-45% 0% -50% 0%"});

document.querySelectorAll('.main_aspergerCEA').forEach(main => { observer.observe(main) });


// Funciones:
function underline (link){
  aspergerCEALink.style.borderBottom = "none";
  diagnosticosLink.style.borderBottom = "none";
  intervencionesLink.style.borderBottom = "none";
  bibliotecaLink.style.borderBottom = "none";

  link.style.borderBottom = "2px solid #ffffff";
}

// HIDE NAVBAR ON SCROLL MOBILE & TABLET:
var prevScrollpos = window.pageYOffset;

window.onscroll = function() {
  if (window.innerWidth < 768){
    var currentScrollPos = window.pageYOffset;
    if (prevScrollpos > currentScrollPos) {
      document.querySelector(".nav_aspergerCEA").style.opacity = "1";
    } else {
      document.querySelector(".nav_aspergerCEA").style.opacity = "0";
    }
    prevScrollpos = currentScrollPos;
  }
}


// ** VIDEOS DIAGNOSTICOS: **

var aDiagnosticos = document.querySelectorAll(".container3_diagnósticos a");

for (var i = 0; i < aDiagnosticos.length; i++) {
  aDiagnosticos[i].onclick = function (){
    event.preventDefault();
    // console.log(i);
  }
}

var iframe_poster_diagnosticos = document.querySelectorAll(".iframe_poster_diagnosticos");

for (var i = 0; i < iframe_poster_diagnosticos.length; i++) {
  (function (i) {
  iframe_poster_diagnosticos[i].onclick = function (){
    iframe_poster_diagnosticos[i].style.display = "none";

    var iframe_diagnosticos_src = iframe_poster_diagnosticos[i].parentElement.previousElementSibling.href;
    var iframeDiagnostico = `
        <iframe width="100%" height="315" src="${iframe_diagnosticos_src}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            `;
    iframe_poster_diagnosticos[i].parentElement.innerHTML = iframeDiagnostico;
  }
  }).call(this, i);
}


// ** PLAYLISTS INTERVENCIONES: **

var iframe_poster = document.querySelectorAll(".iframe_poster");

for (var i = 0; i < iframe_poster.length; i++) {
  (function (i) {
  iframe_poster[i].onclick = function (){
    iframe_poster[i].style.display = "none";
    iframe_poster[i].nextElementSibling.style.display = "block";

    var firstItemHref = iframe_poster[i].parentElement.lastElementChild.firstElementChild.firstElementChild.href;
    var firstIframe = `
        <iframe width="100%" height="315" src="${firstItemHref}?&autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            `;
    iframe_poster[i].nextElementSibling.innerHTML = firstIframe;
  }
  }).call(this, i);
}

var intervencionesContainer = document.querySelectorAll(".intervenciones_container");

intervencionesContainer.forEach(function(container){
  var plist = container.lastElementChild.children;
  for (var i = 0; i < plist.length; i++) {
  (function (i) {
    plist[i].onclick = function (){
        event.preventDefault();

        container.firstElementChild.style.display = "none";

        container.firstElementChild.nextElementSibling.style.display = "block";

        var itemHref = plist[i].firstElementChild.href;
        var iframe = `
            <iframe width="100%" height="315" src="${itemHref}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                `;
        container.firstElementChild.nextElementSibling.innerHTML = iframe;

        for (var a = 0; a < plist.length; a++) {
          plist[a].firstElementChild.style.color = "var(--black)";
        }

        if (container == intervencionesContainer[0]){
          plist[i].firstElementChild.style.color = "var(--orange)";
        }else{
          if (container == intervencionesContainer[1]){
            plist[i].firstElementChild.style.color = "var(--blue)";
          }else{
            if (container == intervencionesContainer[2]){
              plist[i].firstElementChild.style.color = "var(--magenta)";
            }else{
              plist[i].firstElementChild.style.color = "var(--orange)";
            }
          }
        }
      }
    }).call(this, i);
  }
  // console.log(container); //c/div con iframe+playlist
  // console.log(container.lastElementChild); //playlist
  // console.log(container.lastElementChild.children);//items
});


  // } //cierre onload
