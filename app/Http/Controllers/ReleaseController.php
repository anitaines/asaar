<?php

namespace App\Http\Controllers;

use App\Release;
use App\Image;
use App\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as ImageIntervention;

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

      $noticiasAll= DB::table('releases')
                ->orderBy('id', 'desc')
                ->get();
                // ->paginate(12);

      return view("/noticias", compact('noticiasAll', 'colores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $imagenes = Image::orderBy('id', 'DESC')->get();

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
          // $rutaImage = $request->filesMain->store("public/noticias/imagenesMain");
          // $nombreFilesMain = basename($rutaImage);
          //
          // $noticia->imagen = $nombreFilesMain;
          //
          // $nuevaImagen = new Image;
          // $nuevaImagen->name = $nombreFilesMain;
          // $nuevaImagen->origin = "Uploaded";
          // $nuevaImagen->save();


          // Con Image Intervention:
          $image = $request->file('filesMain');
          $fileName = basename($image);
          $fileExtension = $image->getClientOriginalExtension();

          // Mobile:
          $imageResizeMobile = ImageIntervention::make($image->getRealPath());
          $imageResizeMobile->resize(null, 655, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeMobile->save('storage/noticias/imagenesMain/mobile/' .$fileName . "." .$fileExtension);

          // Tablet:
          $imageResizeTablet = ImageIntervention::make($image->getRealPath());
          $imageResizeTablet->resize(875, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeTablet->save('storage/noticias/imagenesMain/tablet/' .$fileName . "." .$fileExtension);

          // Desktop:
          $imageResizeDesktop = ImageIntervention::make($image->getRealPath());
          $imageResizeDesktop->resize(1632, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeDesktop->save('storage/noticias/imagenesMain/desktop/' .$fileName . "." .$fileExtension);

          // Thumbnail:
          $imageResizeThumbnail = ImageIntervention::make($image->getRealPath());
          $imageResizeThumbnail->resize(520, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeThumbnail->save('storage/noticias/imagenesMain/thumbnails/' .$fileName . "." .$fileExtension);

          // Info DB para noticia:
          $noticia->imagen = $fileName . "." .$fileExtension;

          // DB para imagen:
          $nuevaImagen = new Image;
          $nuevaImagen->name = $fileName . "." .$fileExtension;
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

      if ($request->imagenNoticia == "si" && $request->calendar == "si"){
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

      // if ($request->filesPlus1) {
      //   $rutafilesPlus1 = $request->filesPlus1->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus1 = basename($rutafilesPlus1);
      //
      //   // Con Image Intervention:
      //   // $imagePlus1 = $request->file('filesPlus1');
      //   // $fileNamePlus1 = basename($imagePlus1);
      //   // $fileExtensionPlus1 = $imagePlus1->getClientOriginalExtension();
      //   //
      //   // // Mobile:
      //   // $imageResizeMobilePlus1 = ImageIntervention::make($imagePlus1->getRealPath());
      //   // $imageResizeMobilePlus1->resize(415, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeMobilePlus1->save('storage/noticias/imagenesPlus/mobile/' .$fileNamePlus1 . "." .$fileExtensionPlus1);
      //   //
      //   // // Tablet:
      //   // $imageResizeTabletPlus1 = ImageIntervention::make($imagePlus1->getRealPath());
      //   // $imageResizeTabletPlus1->resize(875, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeTabletPlus1->save('storage/noticias/imagenesPlus/tablet/' .$fileNamePlus1 . "." .$fileExtensionPlus1);
      //   //
      //   // // Desktop:
      //   // $imageResizeDesktopPlus1 = ImageIntervention::make($imagePlus1->getRealPath());
      //   // $imageResizeDesktopPlus1->resize(1632, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeDesktopPlus1->save('storage/noticias/imagenesPlus/desktop/' .$fileNamePlus1 . "." .$fileExtensionPlus1);
      //   //
      //   // $nombrefilesPlus1 = $fileNamePlus1 . "." .$fileExtensionPlus1;
      // }else {
      //   $nombrefilesPlus1 = null;
      // }
      // $noticia->filesPlus1 = $nombrefilesPlus1;

      // if ($request->filesPlus2) {
      //   $rutafilesPlus2 = $request->filesPlus2->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus2 = basename($rutafilesPlus2);
      //
      //   // Con Image Intervention:
      //   // $imagePlus2 = $request->file('filesPlus2');
      //   // $fileNamePlus2 = basename($imagePlus2);
      //   // $fileExtensionPlus2 = $imagePlus2->getClientOriginalExtension();
      //
      //   // Mobile:
      //   // $imageResizeMobilePlus2 = ImageIntervention::make($imagePlus2->getRealPath());
      //   // $imageResizeMobilePlus2->resize(415, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeMobilePlus2->save('storage/noticias/imagenesPlus/mobile/' .$fileNamePlus2 . "." .$fileExtensionPlus2);
      //
      //   // Tablet:
      //   // $imageResizeTabletPlus2 = ImageIntervention::make($imagePlus2->getRealPath());
      //   // $imageResizeTabletPlus2->resize(875, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeTabletPlus2->save('storage/noticias/imagenesPlus/tablet/' .$fileNamePlus2 . "." .$fileExtensionPlus2);
      //
      //   // Desktop:
      //   // $imageResizeDesktopPlus2 = ImageIntervention::make($imagePlus2->getRealPath());
      //   // $imageResizeDesktopPlus2->resize(1632, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeDesktopPlus2->save('storage/noticias/imagenesPlus/desktop/' .$fileNamePlus2 . "." .$fileExtensionPlus2);
      //   //
      //   // $nombrefilesPlus2 = $fileNamePlus2 . "." .$fileExtensionPlus2;
      // }else {
      //   $nombrefilesPlus2 = null;
      // }
      // $noticia->filesPlus2 = $nombrefilesPlus2;

      // if ($request->filesPlus3) {
      //   $rutafilesPlus3 = $request->filesPlus3->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus3 = basename($rutafilesPlus3);
      //
      //   // Con Image Intervention:
      //   // $imagePlus3 = $request->file('filesPlus3');
      //   // $fileNamePlus3 = basename($imagePlus3);
      //   // $fileExtensionPlus3 = $imagePlus3->getClientOriginalExtension();
      //
      //   // Mobile:
      //   // $imageResizeMobilePlus3 = ImageIntervention::make($imagePlus3->getRealPath());
      //   // $imageResizeMobilePlus3->resize(415, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeMobilePlus3->save('storage/noticias/imagenesPlus/mobile/' .$fileNamePlus3 . "." .$fileExtensionPlus3);
      //
      //   // Tablet:
      //   // $imageResizeTabletPlus3 = ImageIntervention::make($imagePlus3->getRealPath());
      //   // $imageResizeTabletPlus3->resize(875, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeTabletPlus3->save('storage/noticias/imagenesPlus/tablet/' .$fileNamePlus3 . "." .$fileExtensionPlus3);
      //
      //   // Desktop:
      //   // $imageResizeDesktopPlus3 = ImageIntervention::make($imagePlus3->getRealPath());
      //   // $imageResizeDesktopPlus3->resize(1632, null, function ($constraint) {
      //   //     $constraint->aspectRatio();
      //   // });
      //   // $imageResizeDesktopPlus3->save('storage/noticias/imagenesPlus/desktop/' .$fileNamePlus3 . "." .$fileExtensionPlus3);
      //   //
      //   // $nombrefilesPlus3 = $fileNamePlus3 . "." .$fileExtensionPlus3;
      // }else {
      //   $nombrefilesPlus3 = null;
      // }
      // $noticia->filesPlus3 = $nombrefilesPlus3;

      // dd($request, $noticia);

      $noticia->save();

      return redirect('/generar-noticias-success');

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
      $noticia = Release::where('id', '=', $id)
      ->where('slug', '=', $slug)
      ->firstOrFail();

      return view("/plantilla-noticia", compact('noticia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    // public function edit(Release $release)
    public function edit($id)
    {
      $imagenes = Image::orderBy('id', 'DESC')->get();

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

      $noticia = Release::findOrFail($id);

      return view("/modificar-noticia", compact('imagenes', 'mes', 'diaSemana', 'colorTipoTitular', 'colorFondoTitular', 'colorTipoSubtitular', 'colorFondoSubtitular', 'colorTipoResumen', 'colorFondoResumen', 'noticia'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Release $release)
    public function update(Request $request, $id)
    {
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

      $noticia = Release::findOrFail($id);
      // dd($noticia);

      $noticia->slug = Str::slug($request->title, '-');

      $noticia->title = $request->title;

      $noticia->subtitle = $request->subtitle;

      if($request->imagenNoticia == "si"){
        $noticia->imagenNoticia = $request->imagenNoticia;

        if (preg_match("/data:image/",$request->imagen) == 0){
          $noticia->imagen = $request->imagen;
        } else {
          // $rutaImage = $request->filesMain->store("public/noticias/imagenesMain");
          // $nombreFilesMain = basename($rutaImage);
          //
          // $noticia->imagen = $nombreFilesMain;
          //
          // $nuevaImagen = new Image;
          // $nuevaImagen->name = $nombreFilesMain;
          // $nuevaImagen->origin = "Uploaded";
          // $nuevaImagen->save();

          // Con Image Intervention:
          $image = $request->file('filesMain');
          $fileName = basename($image);
          $fileExtension = $image->getClientOriginalExtension();

          // Mobile:
          $imageResizeMobile = ImageIntervention::make($image->getRealPath());
          $imageResizeMobile->resize(null, 655, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeMobile->save('storage/noticias/imagenesMain/mobile/' .$fileName . "." .$fileExtension);

          // Tablet:
          $imageResizeTablet = ImageIntervention::make($image->getRealPath());
          $imageResizeTablet->resize(875, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeTablet->save('storage/noticias/imagenesMain/tablet/' .$fileName . "." .$fileExtension);

          // Desktop:
          $imageResizeDesktop = ImageIntervention::make($image->getRealPath());
          $imageResizeDesktop->resize(1632, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeDesktop->save('storage/noticias/imagenesMain/desktop/' .$fileName . "." .$fileExtension);

          // Thumbnail:
          $imageResizeThumbnail = ImageIntervention::make($image->getRealPath());
          $imageResizeThumbnail->resize(520, null, function ($constraint) {
              $constraint->aspectRatio();
              $constraint->upsize();
          });
          $imageResizeThumbnail->save('storage/noticias/imagenesMain/thumbnails/' .$fileName . "." .$fileExtension);

          // Info DB para noticia:
          $noticia->imagen = $fileName . "." .$fileExtension;

          // DB para imagen:
          $nuevaImagen = new Image;
          $nuevaImagen->name = $fileName . "." .$fileExtension;
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

      if ($request->imagenNoticia == "si" && $request->calendar == "si"){
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

      // if ($request->filesPlus1Removida && !$request->filesPlus1){
      //   $noticia->filesPlus1 = null;
      // }
      // if ($request->filesPlus1) {
      //   $rutafilesPlus1 = $request->filesPlus1->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus1 = basename($rutafilesPlus1);
      //
      //   $noticia->filesPlus1 = $nombrefilesPlus1;
      // }

      // if ($request->filesPlus2Removida && !$request->filesPlus2){
      //   $noticia->filesPlus2 = null;
      // }
      // if ($request->filesPlus2) {
      //   $rutafilesPlus2 = $request->filesPlus2->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus2 = basename($rutafilesPlus2);
      //
      //   $noticia->filesPlus2 = $nombrefilesPlus2;
      // }

      // if ($request->filesPlus3Removida && !$request->filesPlus3){
      //   $noticia->filesPlus3 = null;
      // }
      // if ($request->filesPlus3) {
      //   $rutafilesPlus3 = $request->filesPlus3->store("public/noticias/imagenesPlus");
      //   $nombrefilesPlus3 = basename($rutafilesPlus3);
      //
      //   $noticia->filesPlus3 = $nombrefilesPlus3;
      // }

      $noticia->save();

      return redirect('/control-panel');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cPanel()
    {
      $colores = ["#AB2097","#6ACF95","#FC8901","#34BFD2"];

      $noticiasAll= DB::table('releases')
                ->orderBy('id', 'desc')
                ->get();
                // ->paginate(12);

      return view("/control-panel", compact('noticiasAll', 'colores'));
    }

    /**
     * Remove the specified resource from storage.
     * param \App\Release  $release
     * param int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Release $release)
    // public function destroy(Request $request)
    // {
    //
    //     $borrarNoticia = Release::findOrFail($request->idNoticia);
    //
    //     $borrarNoticia->delete();
    //
    //     return redirect("/control-panel");
    // }
    public function destroy(Request $request)
    {
        // dd($request);
        // $borrarNoticia = Release::findOrFail($request->idNoticia);
        //
        // $borrarNoticia->delete();

        if(Release::where('id', $request->idNoticia)->exists()) {
        $noticia = Release::find($request->idNoticia);
        $noticia->delete();

        return response()->json([
          "message" => "Record deleted"
        ], 202);
      } else {
        return response()->json([
          "message" => "Record not found"
        ], 404);
      }


    }


    /**
     * Mostrar noticias en el carousel de inicio.
     *
     */
    public function carousel()
    {
        // $colores = ["#AB2097","#6ACF95","#FC8901","#34BFD2"];
        $colores = ["rgba(172, 60, 151, 0.9)","rgba(106, 207, 149, 0.9)","rgba(239, 136, 51, 0.9)","rgba(86, 192, 211, 0.9)"];
        // $colores = [magenta, verde, naranja, blue];

        $noticiasCarousel = Release::whereNotNull('carousel')
        ->orderBy('id', 'desc')
        ->get();

        return view('/index', compact('noticiasCarousel', 'colores'));
    }


    /**
     *
     */
    public function carouselAdmin()
    {
      $carouselActual = Release::whereNotNull('carousel')
      ->orderBy('id', 'desc')
      ->get();

      $noticiasAll= DB::table('releases')
      ->orderBy('id', 'desc')
      ->get();

      $carouselImagenes = Carousel::all();

      return view('/administrar-carousel-dos', compact('carouselActual', 'noticiasAll', 'carouselImagenes'));
    }


    /**
     *
     */
    public function carouselStore(Request $request)
    {
        $rules = [
        'modificarNoticiaCarousel' => ['nullable','array'],
        'modificarNoticiaCarousel.*' => ['nullable','string', 'max:255'],
        ];
        $messages = [
          // 'max' => 'Este campo debe tener :max caracteres como máximo.',
        ];

        $this->validate($request, $rules, $messages);


        if ($request->modificarNoticiaCarousel){
          foreach ($request->modificarNoticiaCarousel as $key => $value){

              $noticia = Release::findOrFail($key);

              $noticia->carousel = $value;

              $noticia->save();

          }
        }

        return redirect('/control-panel');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createImage()
    {
      $imagenes = Image::orderBy('id', 'DESC')->get();

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


      return view("/generar-imagen", compact('imagenes', 'mes', 'diaSemana', 'colorTipoTitular', 'colorFondoTitular', 'colorTipoSubtitular', 'colorFondoSubtitular', 'colorTipoResumen', 'colorFondoResumen'));

    }


}
