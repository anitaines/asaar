// window.onload = function(){

document.documentElement.style.scrollBehavior = "auto";

var congresosLink = document.querySelector(".link_congresos a");

var debatesLink = document.querySelector(".link_debates a");

var tallerLink = document.querySelector(".link_taller a");

var gruposLink = document.querySelector(".link_grupos a");

congresosLink.onclick = function(){
  underline (this);
}

debatesLink.onclick = function(){
  underline (this);
}

tallerLink.onclick = function(){
  underline (this);
}

gruposLink.onclick = function(){
  underline (this);
}

let observer = new IntersectionObserver((entries, observer) => {
  // console.log(observer);
  entries.forEach(entry => {
      if(entry.isIntersecting){
        // console.log(entry.target.className);
            switch (entry.target.className) {
              case "main_aspergerCEA main_intervenciones main_congresos":
                underline (congresosLink);
                break;
              case "main_aspergerCEA main_intervenciones main_debates":
                  underline (debatesLink);
                break;
              case "main_aspergerCEA main_taller":
                  underline (tallerLink);
                break;
              case "main_aspergerCEA main_grupos":
                  underline (gruposLink);
                break;
              default:
                underline (congresosLink);
            }
        }
      });
  }, {rootMargin: "-45% 0% -50% 0%"});

document.querySelectorAll('.main_aspergerCEA').forEach(main => { observer.observe(main) });


function underline (link){
  congresosLink.style.borderBottom = "none";
  debatesLink.style.borderBottom = "none";
  tallerLink.style.borderBottom = "none";
  gruposLink.style.borderBottom = "none";

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


// ** PLAYLISTS: **
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

var playlistContainer = document.querySelectorAll(".intervenciones_container");

playlistContainer.forEach(function(container){
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

          if (container == playlistContainer[0] || container == playlistContainer[1] || container == playlistContainer[2] || container == playlistContainer[3]){
            plist[i].firstElementChild.style.color = "var(--green)";
          }else{
            plist[i].firstElementChild.style.color = "var(--blue)";
          }
        }
      }).call(this, i);
    }
    // console.log(container); //c/div con iframe+playlist
    // console.log(container.lastElementChild); //playlist
    // console.log(container.lastElementChild.children);//items
  });

// } //cierre onload
