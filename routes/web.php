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

// Inicio
Route::get('/', 'ReleaseController@carousel');

Route::get('/home', 'ReleaseController@carousel');


// Sección Asperger
Route::get('/asperger-cea', 'AspergerController@index');

// Sección Quiénes somos
Route::get('/quienes-somos', function () {
    return view('quienesSomos');
});

// Sección Actividades
Route::get('/actividades', 'ActivityController@index');

// Contacto
Route::get('/contacto', 'ContactController@create');

Route::post('/contacto', 'ContactController@store');

// Asociarse
Route::get('/asociarse', 'JoinController@create');

Route::post('/asociarse', 'JoinController@store');

// Donar
Route::get('/donar', function () {
    return view('donar');
});

// Sección noticias
Route::get('/noticias', 'ReleaseController@index');

// Noticia
Route::get('/noticia/{id}/{slug}', 'ReleaseController@show');


// ADMIN:
// Control panel
Route::get('/control-panel', 'ReleaseController@cPanel'); //falta auth

// Eliminar noticia
Route::delete('/eliminar-noticia', 'ReleaseController@destroy'); //falta auth

// Crear noticia
Route::get('/plantilla-noticia', function () {
    return view('plantilla-noticia');
}); //middelware?? esta ruta se accede logueado y solo se usa en iframe

Route::get('/generar-noticias', 'ReleaseController@create'); //falta auth

Route::post('/generar-noticias', 'ReleaseController@store'); //falta auth

Route::get('/generar-noticias-success', function () { //falta auth
    return view('generar-noticias-success');
});

// Modificar noticia
Route::get('/modificar-noticia/{id}', 'ReleaseController@edit'); //falta auth

Route::post('/modificar-noticia/{id}', 'ReleaseController@update'); //falta auth

// Crear imagen para redes sociales
Route::get('/generar-imagen', 'ReleaseController@createImage'); //falta auth

// Administrar carousel inicio
Route::get('/administrar-carousel', 'ReleaseController@carouselAdmin'); //falta auth

Route::post('/administrar-carousel', 'ReleaseController@carouselStore'); //falta auth

// Administrar imágenes guardadas
Route::get('/administrar-imagenes', 'ImageController@index'); //falta auth

// Eliminar imagen guardada
Route::delete('/eliminar-imagen', 'ImageController@destroy'); //falta auth


// Route::get('/editar_articulo/{id}', 'ArticleController@edit')->middleware('auth');
//
// Route::put('/editar_articulo/{id}', 'ArticleController@update')->middleware('auth');
