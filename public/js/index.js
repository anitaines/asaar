// LINEAR GRADIENT HEADER:
document.getElementById("header").style.backgroundColor="transparent";

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  // console.log(document.documentElement.scrollTop);
  if ((document.body.scrollTop > 50 && document.body.scrollTop <= 100) || (document.documentElement.scrollTop > 50 && document.documentElement.scrollTop <= 100)) {
    document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,0), rgba(243,243,243,0.1), rgba(243,243,243,0.2), rgba(243,243,243,0.3),rgba(243,243,243,0.4), rgba(243,243,243,0.5))";

  } else {
    if ((document.body.scrollTop > 100 && document.body.scrollTop <= 150) || (document.documentElement.scrollTop > 100 && document.documentElement.scrollTop <= 150)) {
      document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,0.6), rgba(243,243,243,0.7), rgba(243,243,243,0.8), rgba(243,243,243,0.9), rgba(243,243,243,1))";

    } else {
      if ((document.body.scrollTop > 150) || (document.documentElement.scrollTop > 150)){
        document.getElementById("header").style.backgroundImage= "linear-gradient(to top, rgba(243,243,243,1), rgba(243,243,243,1))";

      }else{
        // document.getElementById("header").style.backgroundColor = "transparent";
        document.getElementById("header").style.backgroundImage= "none";
        }
      }
    }
  }

// SLIDESHOW:
var slideIndex = 1;

var myTimer;

var slideshowContainer;

showSlides(slideIndex);
myTimer = setInterval(function(){plusSlides(1)}, 4000);

// NEXT AND PREVIOUS CONTROL
function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
    } else {
     showSlides(slideIndex += 1);
  }

  //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
    } else {
      myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
    }
  }

//Controls the current slide and resets interval if needed
function currentSlide(n){
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  showSlides(slideIndex = n);
  }

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  // slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].style.display = "flex";
  slides[slideIndex-1].classList.remove("transition-news-back");
  slides[slideIndex-1].classList.add("transition-news");

  if (dots.length>0){
    dots[slideIndex-1].className += " active";
  }
}

  // pause - resume
  let div_noticia = document.querySelectorAll(".div_noticia");

  for (var i = 0; i < div_noticia.length; i++) {

    div_noticia[i].addEventListener("mouseenter", function(){
      clearInterval(myTimer);
    });

    div_noticia[i].addEventListener("mouseleave", function(){
      clearInterval(myTimer);
      myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
    });
  }


  // reverse transition
  let aPrev = document.querySelector(".prev");
  let mySlides = document.querySelectorAll(".mySlides");
  aPrev.addEventListener("click", function(){
    for (var i = 0; i < mySlides.length; i++) {
      mySlides[i].classList.remove("transition-news");
      mySlides[i].classList.add("transition-news-back");

      // setTimeout(function(){reset()}, 4000);

    }
  });

  // function reset(){
  //   for (var i = 0; i < mySlides.length; i++) {
  //     console.log("reseteé " + mySlides[i]);
  //     mySlides[i].classList.remove("transition-news-back");
  //     mySlides[i].classList.add("transition-news");
  //   }
  // }



// RE RENDER FB??
//     let TIMEOUT = null;
// window.onresize = () => {
// if(TIMEOUT === null) {
//   TIMEOUT = window.setTimeout(() => {
//     TIMEOUT = null;
//     //fb_iframe_widget class is added after first FB.FXBML.parse()
//     //fb_iframe_widget_fluid is added in same situation, but only for mobile devices (tablets, phones)
//     //By removing those classes FB.XFBML.parse() will reset the plugin widths.
//
//     document.querySelector('.fb-page').classList.remove('fb_iframe_widget');
//     document.querySelector('.fb-page').classList.remove('fb_iframe_widget_fluid')
//     FB.XFBML.parse();
//   }, 300);
// }
// }

// prueba:
// window.onresize = () => {
// window.FB.XFBML.parse() }

// links:
// https://stackoverflow.com/questions/30083986/facebook-page-plugin-rerender-change-width-dynamically-responsive-rwd
//
// https://developers.facebook.com/docs/reference/javascript/FB.XFBML.parse/#examples
//
// https://gist.github.com/RopoMen/29516a94e31455afe9b6
