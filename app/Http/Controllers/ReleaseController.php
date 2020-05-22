<?php

namespace App\Http\Controllers;

use App\Release;
use App\Image;
use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $colores = ["#AB2097","#6ACF95","#FC8901","#34BFD2"];

      // $noticiasAll = Release::all()->SortByDesc('id');
      // funciona cualquiera de los dos:
      // dd($noticiasAll[0]->title);
      // dd($noticiasAll[0]["title"]);

      // para usar este método tiene que llamar arriba a use Illuminate\Support\Facades\DB;
      $noticiasAll= DB::table('releases')
                ->orderBy('id', 'desc')
                ->get();
                // ->paginate(12);
      // dd($noticiasAll);
      // dd($noticiasAll[0]->title);
      // dd($noticiasAll[0]["title"]); NO FUNCIONA: "Cannot use object of type stdClass as array"

      // $noticiasAll = Release::paginate(3)->SortByDesc('id');

      return view("/noticias", compact('noticiasAll', 'colores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $imagenes = Image::orderBy('id')->get();
      // dd($imagenes);
      $mes = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];
      $diaSemana = ["DOMINGO", "LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO"];

      $colorTipoTitular = [
        "Magenta"=> "#AB2097",
        "Verde"=> "#6ACF95",
        "Naranja"=> "#FC8901",
        "Cyan"=> "#34BFD2",
        "Blanco"=> "#ffffff",
        "Negro"=> "#454545",
      ];
      $colorFondoTitular = [
        "Sin color"=> "transparent",
        "Blanco"=> "rgba(255, 255, 255, 0.9)",
        "Negro"=> "rgba(69, 69, 69, 0.9)",
      ];

      $colorTipoSubtitular = [
        "Blanco"=> "#ffffff",
        "Negro"=> "#454545",
      ];
      $colorFondoSubtitular = [
        "Magenta"=> "#AB2097",
        "Verde"=> "#6ACF95",
        "Naranja"=> "#FC8901",
        "Cyan"=> "#34BFD2",
        "Blanco"=> "rgba(255, 255, 255, 0.9)",
        "Negro"=> "rgba(69, 69, 69, 0.9)",
        "Sin color"=> "transparent",
      ];

      $colorTipoResumen = [
        "Magenta"=> "rgb(255, 105, 180)", // hotpink
        "Verde"=> "rgb(0, 250, 154)", // mediumspringgreen
        "Naranja"=> "rgb(255, 140, 0)", // darkorange
        "Cyan"=> "rgb(0, 255, 255)", // cyan
        "Blanco"=> "#ffffff",
        "Negro"=> "rgb(69, 69, 69)",
      ];
      $colorFondoResumen = [
        "Sin color"=> "transparent",
        "Blanco"=> "rgba(255, 255, 255, 0.9)",
        "Negro"=> "rgba(69, 69, 69, 0.9)",
      ];


      return view("/generar-noticias", compact('imagenes', 'mes', 'diaSemana', 'colorTipoTitular', 'colorFondoTitular', 'colorTipoSubtitular', 'colorFondoSubtitular', 'colorTipoResumen', 'colorFondoResumen'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // dd($request);
      $rules = [
      'title' => ['required', 'string', 'max:255'],
      'subtitle' => ['nullable','string', 'max:255'],
      // 'imagenNoticia' => ['required', 'string', 'max:5'],
      'imagenNoticia' => ['string', 'max:5'],
      // 'imagen' => ['nullable', 'string', 'max:255'],
      'imagen' => ['nullable', 'string'],
      'filtroImagen' => ['nullable', 'string', 'max:25'],
      'logoAsaar' => ['nullable', 'string', 'max:5'],
      'calendar' => ['nullable', 'string', 'max:5'],
      'mes' => ['nullable', 'string', 'max:25'],
      'dia' => ['nullable', 'string', 'max:25'],
      'numero' => ['nullable', 'string', 'max:5'],
      'tituloImagen' => ['nullable','string', 'max:500'],
      'colorTipoTitular' => ['nullable', 'string', 'max:30'],
      'colorFondoTitular' => ['nullable', 'string', 'max:30'],
      'recuadro' => ['nullable', 'string', 'max:5'],
      'subtituloImagen' => ['nullable','string', 'max:500'],
      'detalleImagen' => ['nullable','string', 'max:500'],
      'colorTipoSubitular' => ['nullable', 'string', 'max:30'],
      'colorFondoSubtitular' => ['nullable', 'string', 'max:30'],
      'resumenImagen' => ['nullable','string', 'max:500'],
      'colorTipoResumen' => ['nullable', 'string', 'max:30'],
      'colorFondoResumen' => ['nullable', 'string', 'max:30'],
      'rectificacionImagen' => ['nullable', 'string', 'max:255'],
      'content' => ['nullable','string', 'max:3000'],
      'filesMain' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus1' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus2' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus3' => ['nullable', 'file', 'image', 'max:2048'],
      ];
      $messages = [
        'required' => 'Este campo debe estar completo.',
        'max' => 'Este campo debe tener :max caracteres como máximo.',
        'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
        'image' => 'El archivo de la imagen solo puede ser jpeg, jpg o png.',
        'files.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus1.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus2.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus3.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
      ];


      $this->validate($request, $rules, $messages);

      $noticia= new Release;

      $noticia->slug = Str::slug($request->title, '-');

      $noticia->title = $request->title;

      $noticia->subtitle = $request->subtitle;

      if($request->imagenNoticia == "si"){
        $noticia->imagenNoticia = $request->imagenNoticia;

        if (preg_match("/data:image/",$request->imagen) == 0){
          $noticia->imagen = $request->imagen;
        } else {
          $rutaImage = $request->filesMain->store("public/noticias/imagenesMain");
          $nombreFilesMain = basename($rutaImage);

          $noticia->imagen = $nombreFilesMain;

          $nuevaImagen = new Image;
          $nuevaImagen->name = $nombreFilesMain;
          $nuevaImagen->origin = "Uploaded";
          $nuevaImagen->save();
        }
      } else {
        $noticia->imagenNoticia = "no";
        $noticia->imagen = null;
      }

      // Por las dudas:
      if ($noticia->imagen == null){
        $noticia->imagenNoticia = "no";
      }

      // if (preg_match("/data:image/",$request->imagen) == 0){
      //   $noticia->imagen = $request->imagen;
      // } else {
      //   $rutaImage = $request->filesMain->store("public/noticias/imagenesMain");
      //   $nombreFilesMain = basename($rutaImage);
      //
      //   $noticia->imagen = $nombreFilesMain;
      //
      //   $nuevaImagen = new Image;
      //   $nuevaImagen->name = $nombreFilesMain;
      //   $nuevaImagen->origin = "Uploaded";
      //   $nuevaImagen->save();
      // }

      if ($request->imagenNoticia == "si"){
        $noticia->filtroImagen = $request->filtroImagen;
      } else {
        $noticia->filtroImagen = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->logoAsaar = $request->logoAsaar;
      } else {
        $noticia->logoAsaar = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->calendar = $request->calendar;
        $noticia->mes = $request->mes;
        $noticia->dia = $request->dia;
        $noticia->numero = $request->numero;
      } else {
        $noticia->calendar = null;
        $noticia->mes = null;
        $noticia->dia = null;
        $noticia->numero = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->tituloImagen = $request->tituloImagen;
        if ($request->tituloImagen){
          $noticia->colorTipoTitular = $request->colorTipoTitular;
          $noticia->colorFondoTitular = $request->colorFondoTitular;
          $noticia->recuadro = $request->recuadro;
        } else{
          $noticia->colorTipoTitular = null;
          $noticia->colorFondoTitular = null;
          $noticia->recuadro = null;
        }
      } else {
        $noticia->tituloImagen = null;
        $noticia->colorTipoTitular = null;
        $noticia->colorFondoTitular = null;
        $noticia->recuadro = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->subtituloImagen = $request->subtituloImagen;
        $noticia->detalleImagen = $request->detalleImagen;
        if ($noticia->subtituloImagen || $noticia->detalleImagen){
          $noticia->colorTipoSubtitular = $request->colorTipoSubtitular;
          $noticia->colorFondoSubtitular = $request->colorFondoSubtitular;
        } else{
          $noticia->colorTipoSubtitular = null;
          $noticia->colorFondoSubtitular = null;
        }
      } else {
        $noticia->subtituloImagen = null;
        $noticia->detalleImagen = null;
        $noticia->colorTipoSubtitular = null;
        $noticia->colorFondoSubtitular = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->resumenImagen = $request->resumenImagen;
        if ($noticia->resumenImagen){
          $noticia->colorTipoResumen = $request->colorTipoResumen;
          $noticia->colorFondoResumen = $request->colorFondoResumen;
        } else{
          $noticia->colorTipoResumen = null;
          $noticia->colorFondoResumen = null;
        }
      } else {
        $noticia->resumenImagen = null;
        $noticia->colorTipoResumen = null;
        $noticia->colorFondoResumen = null;
      }

      if ($request->imagenNoticia == "si"){
        $noticia->rectificacionImagen = $request->rectificacionImagen;
      } else {
        $noticia->rectificacionImagen = null;
      }

      $noticia->content = $request->content;

      if ($request->filesPlus1) {
        $rutafilesPlus1 = $request->filesPlus1->store("public/noticias/imagenesPlus");
        $nombrefilesPlus1 = basename($rutafilesPlus1);
      }else {
        $nombrefilesPlus1 = null;
      }
      $noticia->filesPlus1 = $nombrefilesPlus1;

      if ($request->filesPlus2) {
        $rutafilesPlus2 = $request->filesPlus2->store("public/noticias/imagenesPlus");
        $nombrefilesPlus2 = basename($rutafilesPlus2);
      }else {
        $nombrefilesPlus2 = null;
      }
      $noticia->filesPlus2 = $nombrefilesPlus2;

      if ($request->filesPlus3) {
        $rutafilesPlus3 = $request->filesPlus3->store("public/noticias/imagenesPlus");
        $nombrefilesPlus3 = basename($rutafilesPlus3);
      }else {
        $nombrefilesPlus3 = null;
      }
      $noticia->filesPlus3 = $nombrefilesPlus3;

      // dd($request, $noticia);

      $noticia->save();

      return redirect('/home');
      // next: redirect a adminCarousel con paremtros y flash? AGREGAR CAROUSEL A LA VALIDACION Y GUARDADO
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    // public function show(Release $release)
    {
      // $noticia = Release::find($id);

      $noticia = Release::where('id', '=', $id)
      ->where('slug', '=', $slug)
      ->first();
      // dd($noticia);
      return view("/plantilla-noticia", compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function edit(Release $release)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Release $release)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function destroy(Release $release)
    {
        //
    }


    /**
     * Mostrar noticias en el carousel de inicio.
     *
     */
    public function carousel()
    {
        $noticiasCarousel = Release::whereNotNull('carousel')
        ->orderBy('id', 'desc')
        ->get();
        // dd($noticiasCarousel);
        // dd($noticiasCarousel[0]->carousel);
        // dd($noticiasCarousel[0]["carousel"]);

        return view('/index', compact('noticiasCarousel'));
    }


    /**
     *
     */
    public function carouselAdmin()
    {
      $carouselActual = Release::whereNotNull('carousel')
      ->orderBy('id', 'desc')
      ->get();
      // dd($carouselActual);

      $noticiasAll= DB::table('releases')
      ->orderBy('id', 'desc')
      ->get();

      $carouselImagenes = Carousel::all();

      return view('/administrar-carousel', compact('carouselActual', 'noticiasAll', 'carouselImagenes'));
    }


    /**
     *
     */
    public function carouselStore(Request $request)
    {
        // dd($request);
        $rules = [
        'modificarNoticiaCarousel' => ['nullable','array'],
        'modificarNoticiaCarousel.*' => ['nullable','string', 'max:255'],
        ];
        $messages = [
          // 'max' => 'Este campo debe tener :max caracteres como máximo.',
        ];

        $this->validate($request, $rules, $messages);

        // if ($request->modificarNoticiaCarousel){
        //   foreach ($request->modificarNoticiaCarousel as $key => $value){
        //     if ($value == null){
        //       $noticia = Release::find($key);
        //
        //       $imagen = Carousel::where('name', $noticia->carousel)->first();
        //       $imagen->available = true;
        //       $imagen->save();
        //
        //       $noticia->carousel = $value;
        //
        //       $noticia->save();
        //
        //     } else {
        //       $noticia = Release::find($key);
        //
        //       $imagen = Carousel::where('name', $value)->first();
        //       $imagen->available = false;
        //       $imagen->save();
        //
        //       $noticia->carousel = $value;
        //
        //       $noticia->save();
        //
        //     }
        //   }
        // }

        if ($request->modificarNoticiaCarousel){
          foreach ($request->modificarNoticiaCarousel as $key => $value){

              $noticia = Release::find($key);

              $noticia->carousel = $value;

              $noticia->save();

          }
        }

        return view('/index');
    }


}
