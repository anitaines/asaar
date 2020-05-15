<div class="accion">

  <div class="eliminar">

    <div class="botonEliminar">
      <a>
        <p>Eliminar noticias</p>
        <p>del carrusel</p>
      </a>
    </div>

    <div class="itemsEliminar">
      @foreach ($noticiasAll as $key => $value)
        @if ($value->carousel != null)
        <div class="accionItem">
          <div class="accionInfo">
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
              <p>{{$value->title}}</p>
            </a>
            <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
          </div>
          <div class="input">
            <label class="checkbox-label"> Eliminar
              <input type="hidden" name="" value="{{$value->carousel}}">
              <input type="checkbox" name="eliminarNoticiaCarousel[]" value="{{$value->id}}">
              <span class="checkbox-custom">✓</span>
            </label>
          </div>
        </div>
        @endif
      @endforeach
    </div>
  </div>

  <div class="agregar">

    <div class="botonAgregar">
      <a>
        <p>Agregar noticias</p>
        <p>al carrusel</p>
      </a>
    </div>

    <div class="imagenesDisponibles" style="display: block;">
      <p>Elegir imagen para carousel:</p>
      <div class="imagenesDisponiblesWrap">
        @foreach ($carouselImagenes as $keyImagen => $valueImagen)
          @if ($valueImagen->available == true)
            <label> Elegir
            @else
            <label style="display:none;"> Elegir
          @endif
            <input type="radio" name="agregarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}">
            <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center; height: 100px;"></div>
          </label>
        @endforeach
      </div>
    </div>

    <div class="itemsAgregar">
      @foreach ($noticiasAll as $key => $value)
        @if ($value->carousel == null)
        <div class="accionItem">
          <div class="accionInfo">
            <a href="/noticias/{{$value->id}}/{{$value->slug}}" target="_blank" rel="noreferrer">
              <p>{{$value->title}}</p>
            </a>
            <p>Fecha de publicación: {{Carbon\Carbon::parse($value->created_at)->format('d-F-Y')}}</p>
          </div>
          <div class="input">
            <label class="checkbox-label"> Agregar
              {{-- <input type="checkbox" name="agregarNoticiaCarousel[]" value="{{$value->id}}"> --}}
              <input type="checkbox" name="" value="">
              <span class="checkbox-custom">✓</span>
            </label>
          </div>
        </div>
        {{-- <div class="imagenesDisponibles">
          <p>Elegir imagen para carousel:</p>
          <div class="imagenesDisponiblesWrap">
            @foreach ($carouselImagenes as $keyImagen => $valueImagen)
              <label> Elegir
                <input type="radio" name="agregarNoticiaCarousel[{{$value->id}}]" value="{{$valueImagen->name}}">
                <div class="carouselImagen" style="background-image: url('/media/noticias/carousel/{{$valueImagen->name}}');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center; height: 100px;"></div>
              </label>
            @endforeach
          </div>
        </div> --}}
      @endif
    @endforeach

    </div>

  </div>

</div>





{{-- JS: --}}

// ITEMS ELIMINAR:
let itemsEliminar = document.querySelectorAll(".itemsEliminar .accionItem");
// console.log(itemsEliminar[0].lastElementChild.firstElementChild.firstElementChild.nextElementSibling);
for (var i = 0; i < itemsEliminar.length; i++) {
  itemsEliminar[i].lastElementChild.firstElementChild.firstElementChild.nextElementSibling.oninput = function(){

    let carouselActualItems = document.querySelector(".carouselActual").children;

    let imagenesDisponiblesItems = document.querySelector(".imagenesDisponiblesWrap").children;

    if (this.checked == true){
      // sacar noticia del preview carousel:
      for (var i = 0; i < carouselActualItems.length; i++){
        if (carouselActualItems[i].firstElementChild.value == this.value) {
          carouselActualItems[i].style.display = "none";
        }
      }
      // poner su imagen disponible:
      for (var i = 0; i < imagenesDisponiblesItems.length; i++){
        if (imagenesDisponiblesItems[i].firstElementChild.value == this.previousElementSibling.value) {
          imagenesDisponiblesItems[i].style.display = "block";
        }
      }

    } else {
      // dejar noticia en el preview carousel:
      for (var i = 0; i < carouselActualItems.length; i++){
        if (carouselActualItems[i].firstElementChild.value == this.value) {
          carouselActualItems[i].style.display = "flex";
        }
      }
      // poner su imagen NO disponible:
      for (var i = 0; i < imagenesDisponiblesItems.length; i++){
        if (imagenesDisponiblesItems[i].firstElementChild.value == this.previousElementSibling.value) {
          imagenesDisponiblesItems[i].style.display = "none";
        }
      }

    }
  }
}


// ITEMS AGREGAR:
let itemsAgregar = document.querySelectorAll(".itemsAgregar .accionItem");
// console.log(itemsAgregar[0].lastElementChild.firstElementChild.firstElementChild);
for (var i = 0; i < itemsAgregar.length; i++) {
  itemsAgregar[i].lastElementChild.firstElementChild.firstElementChild.oninput = function(){

    let carouselActualItems = document.querySelector(".carouselActual").children;

    let imagenesDisponiblesItems = document.querySelector(".imagenesDisponiblesWrap").children;

    if (this.checked == true){
      // agregar noticia al preview carousel:

      // poner su imagen disponible:



    } else {
      // dejar noticia en el preview carousel:

      // poner su imagen NO disponible:


    }
  }
}
