<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspergerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $key = config('services.google.key');

      // Habilidades Sociales, Lenguaje y Comunicación, Integración Sensorial y Terapias Relacionales:
      $url1 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtR0-iL8NBHPBO8svW5xD5rB&key=" . $key;
      $json1 = file_get_contents($url1);
      $playlistHabilidades = json_decode($json1, TRUE);
      // dd($playlistHabilidades);
      // dd($playlistHabilidades["items"][10]["snippet"]["resourceId"]["videoId"]);

      // Educación: Inclusión e Integración Escolar:
      $url2 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtRbPiVPL9Qz8301hqrhc2bS&key=" . $key;
      $json2 = file_get_contents($url2);
      $playlistEducacion = json_decode($json2, TRUE);
      // dd($playlistEducacion);

      // Salud y Familia: El rol de la Familia, Comunicación, Descompensaciones Conductuales, Sexualidad:
      $url3 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtSiEjk9qXvmvw6HDd396oKM&key=" . $key;
      $json3 = file_get_contents($url3);
      $playlistSalud = json_decode($json3, TRUE);

      // Adultos: Diagnósticos Tardíos, Transición a la Vida Adulta, Inserción Laboral, Sexualidad:
      $url4 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtRJkO_njc_aU9kIUwhH6jMj&key=" . $key;
      $json4 = file_get_contents($url4);
      $playlistAdultos = json_decode($json4, TRUE);

      return view("/asperger", compact('playlistHabilidades', 'playlistEducacion', 'playlistSalud', 'playlistAdultos'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
