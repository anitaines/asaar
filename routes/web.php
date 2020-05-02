<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'ReleaseController@carousel');

Route::get('/home', 'ReleaseController@carousel');

// Route::get('/asperger-cea', function () {
//     return view('asperger');
// });

Route::get('/asperger-cea', 'AspergerController@index');

Route::get('/quienes-somos', function () {
    return view('quienesSomos');
});

// Route::get('/actividades', function () {
//     return view('actividades');
// });

Route::get('/actividades', 'ActivityController@index');

Route::get('/contacto', 'ContactController@create');

Route::post('/contacto', 'ContactController@store');

Route::get('/asociarse', 'JoinController@create');

Route::post('/asociarse', 'JoinController@store');

Route::get('/donar', function () {
    return view('donar');
});

Route::get('/plantilla-noticia', function () {
    return view('plantilla-noticia');
});

Route::get('/plantilla-noticia/{id}', 'ReleaseController@show');
// CREAR CONTROLADORES Y AUTH EN ESTE LINK:
// Route::get('/generar-noticias', function () {
//     return view('generar-noticias');
// });

Route::get('/generar-noticias', 'ReleaseController@create'); //falta auth

Route::post('/generar-noticias', 'ReleaseController@store'); //falta auth
