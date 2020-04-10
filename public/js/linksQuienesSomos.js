// window.onload = function(){

document.documentElement.style.scrollBehavior = "auto";

var quienesSomosLink = document.querySelector(".link_quienesSomos a");

var misionLink = document.querySelector(".link_mision a");

var autoridadesLink = document.querySelector(".link_autoridades a");

var ayudarLink = document.querySelector(".link_ayudar a");

var dipticoLink = document.querySelector(".link_diptico a");


quienesSomosLink.onclick = function(){
  underline (this);
}

misionLink.onclick = function(){
  underline (this);
}

autoridadesLink.onclick = function(){
  underline (this);
}

ayudarLink.onclick = function(){
  underline (this);
}

dipticoLink.onclick = function(){
  underline (this);
}


let observer = new IntersectionObserver((entries, observer) => {
  entries.forEach(entry => {
      if(entry.isIntersecting){
            switch (entry.target.className) {
              case "main_aspergerCEA intro_quienesSomos":
                underline (quienesSomosLink);
                break;
              case "main_aspergerCEA main_mision":
                  underline (misionLink);
                break;
              case "main_aspergerCEA main_autoridades":
                  underline (autoridadesLink);
                break;
              case "main_aspergerCEA main_ayudar":
                  underline (ayudarLink);
                break;
              case "main_aspergerCEA main_diptico":
                  underline (dipticoLink);
                break;
              default:
                underline (quienesSomosLink);
            }
        }
      });
  }, {rootMargin: "-45% 0% -50% 0%"});

document.querySelectorAll('.main_aspergerCEA').forEach(main => { observer.observe(main) });


function underline (link){
  quienesSomosLink.style.borderBottom = "none";
  misionLink.style.borderBottom = "none";
  autoridadesLink.style.borderBottom = "none";
  ayudarLink.style.borderBottom = "none";
  dipticoLink.style.borderBottom = "none";

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

// } //cierre onload
