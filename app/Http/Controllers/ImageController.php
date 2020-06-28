<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $imagenes = DB::table('images')
        ->where('origin', '=', 'uploaded')
        ->orderBy('id', 'desc')
        ->get();
      // dd($imagenes[0]->origin);

      return view("/administrar-imagenes", compact('imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * param  \App\Image  $image
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      // $borrarImagen = Image::findOrFail($request->idImagen);
      // $borrarImagen->delete();
      //
      // return redirect("/administrar-imagenes");


      // return($request);

      if(Image::where('id', $request->idImagen)->exists()) {
      $imagen = Image::find($request->idImagen);
      $imagen->delete();

        return response()->json([
          "message" => "Record deleted",
          "request" => $request->idImagen
        ], 202);
      } else {
        return response()->json([
          "message" => "Record not found",
          "request" => $request->idImagen
        ], 404);
    }
    }
}
