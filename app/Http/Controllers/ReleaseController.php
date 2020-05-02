<?php

namespace App\Http\Controllers;

use App\Release;
use App\Image;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function carousel()
    {
        //cuando esté la DB modificar esta parte para que guarde en una variable las noticias
        // $articulos = Article::all()->shuffle();
        // dd($articulos);
        //
        // return view("/index", compact('articulos'));

        return view('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      'imagenNoticia' => ['required', 'string', 'max:5'],
      'imagen' => ['nullable', 'string', 'max:255'],
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
      'files' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus1' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus2' => ['nullable', 'file', 'image', 'max:2048'],
      'filesPlus3' => ['nullable', 'file', 'image', 'max:2048'],
      ];
      $messages = [
        'required' => 'El campo :attribute debe estar completo.',
        'max' => 'El campo :attribute debe tener :max caracteres como máximo.',
        'file' =>  'Error en la carga del archivo. Por favor volver a subir.',
        'image' => 'El archivo de la imagen solo puede ser jpeg, jpg o png.',
        'files.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus1.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus2.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
        'filesPlus3.max' => 'El archivo de la imagen es demasiado grande, no debe superar 2MB.',
      ];

      // $this->validate($request, $rules, $messages);

      $noticia= new Release;
      // dd($noticia);
// dd($request);
// dd($request->files);
      if ($request->filesMain) {
        $rutaImage = $request->filesMain->store("public/media/noticias");
        $nombreFilesMain = basename($rutaImage);// + nombre dir uploded??
      }else {
        $nombreFiles = null;
      }
      if ($request->filesPlus1) {
        $rutafilesPlus1 = $request->filesPlus1->store("public/media/noticias"); //guardar en otro dir y mover??
        $nombrefilesPlus1 = basename($rutafilesPlus1);// + nombre dir uploded??
      }else {
        $nombrefilesPlus1 = null;
      }
      if ($request->filesPlus2) {
        $rutafilesPlus2 = $request->filesPlus2->store("public/media/noticias"); //guardar en otro dir y mover??
        $nombrefilesPlus2 = basename($rutafilesPlus2);// + nombre dir uploded??
      }else {
        $nombrefilesPlus2 = null;
      }
      if ($request->filesPlus3) {
        $rutafilesPlus3 = $request->filesPlus3->store("public/media/noticias"); //guardar en otro dir y mover??
        $nombrefilesPlus3 = basename($rutafilesPlus3);// + nombre dir uploded??
      }else {
        $nombrefilesPlus3 = null;
      }


      $noticia->title = $request->title;
      $noticia->subtitle = $request->subtitle;
      $noticia->imagenNoticia = $request->imagenNoticia;
      if ($request->imagenNoticia == "si"){
        if (strpos($request->imagen,"data:image/jpeg;") == false){
          $noticia->imagen = $request->imagen;
        } else {
          $noticia->imagen = $nombreFilesMain;
        }
        $noticia->filtroImagen = $request->filtroImagen;
        $noticia->logoAsaar = $request->logoAsaar;
        $noticia->calendar = $request->calendar;
        $noticia->mes = $request->mes;
        $noticia->dia = $request->dia;
        $noticia->numero = $request->numero;
        $noticia->tituloImagen = $request->tituloImagen;
        $noticia->colorTipoTitular = $request->colorTipoTitular;
        $noticia->colorFondoTitular = $request->colorFondoTitular;
        $noticia->recuadro = $request->recuadro;
        $noticia->subtituloImagen = $request->subtituloImagen;
        $noticia->detalleImagen = $request->detalleImagen;
        $noticia->colorTipoSubitular = $request->colorTipoSubitular;
        $noticia->colorFondoSubtitular = $request->colorFondoSubtitular;
        $noticia->resumenImagen = $request->resumenImagen;
        $noticia->colorTipoResumen = $request->colorTipoResumen;
        $noticia->colorFondoResumen = $request->colorFondoTitular;
        $noticia->rectificacionImagen = $request->rectificacionImagen;
      } else {
        $noticia->imagen = null;
        $noticia->filtroImagen = null;
        $noticia->logoAsaar = null;
        $noticia->calendar = null;
        $noticia->mes = null;
        $noticia->dia = null;
        $noticia->numero = null;
        $noticia->tituloImagen = null;
        $noticia->colorTipoTitular = null;
        $noticia->colorFondoTitular = null;
        $noticia->recuadro = null;
        $noticia->subtituloImagen = null;
        $noticia->detalleImagen = null;
        $noticia->colorTipoSubitular = null;
        $noticia->colorFondoSubtitular = null;
        $noticia->resumenImagen = null;
        $noticia->colorTipoResumen = null;
        $noticia->colorFondoResumen = null;
        $noticia->rectificacionImagen = null;
      }
      $noticia->content = $request->content;
      $noticia->filesPlus1 = $nombrefilesPlus1;
      $noticia->filesPlus2 = $nombrefilesPlus2;
      $noticia->filesPlus3 = $nombrefilesPlus3;

      // dd($request, $noticia);

      $noticia->save();

      return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Release  $release
     * @return \Illuminate\Http\Response
     */
    public function show(Release $release)
    {
        //
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
}
