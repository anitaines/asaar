var dropdownMobile = document.querySelector(".button-newMobile");
var dropdownMobileContent = document.querySelector(".dropdown-content-newMobile");

dropdownMobile.onclick = function(){
  dropdownMobileContent.classList.toggle("dropdown-content-display");
  if (dropdownMobile.innerHTML == "Menú ▲"){
    dropdownMobile.innerHTML = "Menú ▼";
  }else{
    dropdownMobile.innerHTML = "Menú ▲";
  }
}
