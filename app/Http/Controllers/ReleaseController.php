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
        dd($request);
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
