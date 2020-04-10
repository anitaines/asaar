<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $key = config('services.google.key');

      $url1 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtQZsIbrO9aDdMjAise5WPEE&key=" . $key;
      $json1 = file_get_contents($url1);
      $playlistSalta = json_decode($json1, TRUE);
      // dd($playlistSalta);
      // dd($playlistSalta["items"][10]["snippet"]["resourceId"]["videoId"]);

      $url2 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtRV7qVYw8ruPatszi5axUPf&key=" . $key;
      $json2 = file_get_contents($url2);
      $playlistJornada8 = json_decode($json2, TRUE);

      $url3 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtS2awSQ5TZazrhfKAFIXBMZ&key=" . $key;
      $json3 = file_get_contents($url3);
      $playlistJornada7 = json_decode($json3, TRUE);

      $url4 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtTftSvQeeqDLRfIFCo7aVp4&key=" . $key;
      $json4 = file_get_contents($url4);
      $playlistJornada6 = json_decode($json4, TRUE);

      $url5 = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId=PLHN3RoZSVRtRL2JsZXX31PBQWQrg3C7zr&key=" . $key;
      $json5 = file_get_contents($url5);
      $playlistDebates = json_decode($json5, TRUE);

      return view("/actividades", compact('playlistSalta', 'playlistJornada8', 'playlistJornada7', 'playlistJornada6', 'playlistDebates'));
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
