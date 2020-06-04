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
}); //middelware??

Route::get('/noticias', 'ReleaseController@index');

Route::get('/noticia/{id}/{slug}', 'ReleaseController@show');

// CREAR CONTROLADORES Y AUTH EN ESTE LINK:
// Route::get('/generar-noticias', function () {
//     return view('generar-noticias');
// });

Route::get('/control-panel', 'ReleaseController@cPanel'); //falta auth

Route::delete('/eliminar-noticia', 'ReleaseController@destroy'); //falta auth

Route::post('/generar-noticias', 'ReleaseController@store'); //falta auth

Route::get('/generar-noticias-success', function () { //falta auth
    return view('generar-noticias-success');
});

Route::get('/modificar-noticia/{id}', 'ReleaseController@edit'); //falta auth

Route::post('/modificar-noticia/{id}', 'ReleaseController@update'); //falta auth

Route::get('/generar-imagen', 'ReleaseController@createImage'); //falta auth

Route::get('/administrar-carousel', 'ReleaseController@carouselAdmin'); //falta auth

Route::post('/administrar-carousel', 'ReleaseController@carouselStore'); //falta auth

Route::get('/administrar-imagenes', 'ImageController@index'); //falta auth


// Route::get('/editar_articulo/{id}', 'ArticleController@edit')->middleware('auth');
//
// Route::put('/editar_articulo/{id}', 'ArticleController@update')->middleware('auth');
