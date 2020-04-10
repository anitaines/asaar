{{-- <div class="info_img_container">
  <div class="box1">
    <img src="/media/logos/logoFull.svg" alt="Logotipo Asociación Asperger Argentina">
    <div class="calendar">
      <div class="">
        <p>MARZO</p>
      </div>
      <div class="">
        <p>SÁBADO</p>
        <p>14</p>
      </div>
    </div>
  </div>
  <div class="box2">

    <div class="">
      <p>Encuentro de padres para padres, familiares o amigos de personas con dudas acerca del reciente diagnóstico, tratamientos, escolaridad, trámites, legislación o bien personas que tengan deseos de conocer de qué se trata el Síndrome de Asperger.</p>
    </div>

    <div class="">

      <div class="">
        <p>TALLER DE PADRES</p>
      </div>

      <div class="">
        <p>Para padres de niños, adolescentes y adultos</p>
        <p>LEOPOLDO MARECHAL 1160, CABA. De 16:30hs a 18:00hs.<br>
        Bono contribución $100. Inscripción en https://goo.gl/forms/5UssYYdEHoQJ8b262</p>
      </div>

    </div>

  </div>
  <div class="box3">
    <p>www.asperger.org.ar</p>
  </div>
</div> --}}





.main_detalle_noticias .img_container{
  position: relative;
  height: 537px;
  width: 100%;
  background-image: url('/media/noticias/preloaded/03.jpeg');
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-radius: 6px;
  margin: 15px 0px 30px 0px;
  overflow: hidden;
}
.main_detalle_noticias .img_container .info_img_container{
  position: absolute;
  top: 0;
  display: flex;
  flex-wrap: wrap;
  align-content: space-around;
  height: 537px;
}
.main_detalle_noticias .img_container .info_img_container .box1{
  display: flex;
  align-items: end;
  justify-content: space-between;
  width: 100%;
}
.main_detalle_noticias .img_container .info_img_container .box1 img{
  width: 20%;
  margin-left: 35px;
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar{
  display: flex;
  flex-wrap: wrap;
  background-color: #fffadf;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
  width: 155px;
  height: 155px;
  margin-right: 35px;
  transform: rotate(3deg);
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar div:first-child{
  width: 100%;
  background-color: #f72929;
  margin: 3px;
  color: #fffadf;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 18px;
  letter-spacing: 2px;
  font-weight: bold;
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar div:first-child p{
  margin: 5px;
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar div:last-child{
  width: 100%;
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar div:last-child p:first-child{
  color: black;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 16px;
  letter-spacing: 5px;
  line-height: 1.5;
  margin: 0;
}
.main_detalle_noticias .img_container .info_img_container .box1 .calendar div:last-child p:last-child{
  color: black;
  font-family: Helvetica, Arial, sans-serif;
  font-size: 73px;
  font-weight: bold;
  line-height: 1;
  margin-bottom: 0;
}
.main_detalle_noticias .img_container .info_img_container .box2{
  width: 100%;
  display: flex;
  justify-content: space-evenly;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:first-child{
  width: 29%;
  background-color: rgba(69, 69, 69, 0.5);
  border-radius: 6px;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:first-child p{
  line-height: 1.5;
  color: wheat;
  margin: 10px;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child{
  width: 63%;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-content: space-between;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child div:first-child{
  /*background-color: rgba(255, 255, 255, 0.5); */
  background-color: transparent;
  border-radius: 0px;
  width: 100%;
  border: 4px solid var(--magenta);
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child div:first-child p{
  color: var(--magenta);
  font-family: 'Gidugu', sans-serif;
  font-size: 70px;
  font-weight: bold;
  line-height: 0.7;
  letter-spacing: 2px;
  margin: 20px 10px;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child div:last-child{
  width: 100%;
  /* background-color: rgba(106, 207, 149, 0.5); */
  background-color: var(--magenta);
  border-radius: 6px;
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child div:last-child p:first-child{
  font-size: 23px;
  color: #ffffff;
  font-weight: bold;
  line-height: 1.5;
  margin: 5px 10px;
  /* text-shadow: 2px 2px var(--black); */
}
.main_detalle_noticias .img_container .info_img_container .box2 div:last-child div:last-child p:last-child{
  font-size: 16px;
  color: white;
  line-height: 1.5;
  margin: 5px 10px;
}
.main_detalle_noticias .img_container .info_img_container .box3{
  width: 100%;
}
.main_detalle_noticias .img_container .info_img_container .box3 p{
  color: #ffffff;
  letter-spacing: 2px;
  margin-bottom: 0;
}
.main_detalle_noticias .img_container .main_img{
  width: 100%;
  border-radius: 6px;
  margin: 15px 0px 30px 0px;
}
