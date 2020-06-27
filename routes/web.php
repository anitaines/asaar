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

// Rutas auth CON registro:
// Auth::routes();

// Rutas auth SIN registro:
Auth::routes(['register' => false]);


// Inicio
Route::get('/', 'ReleaseController@carousel');

Route::get('/home', 'ReleaseController@carousel');

Route::get('/index', 'ReleaseController@carousel');


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
Route::get('/control-panel', 'ReleaseController@cPanel')->middleware('auth');

// Eliminar noticia
Route::get('/eliminar-noticia', function () {
    abort(404);
});

Route::delete('/eliminar-noticia', 'ReleaseController@destroy')->middleware('auth');

// Crear noticia
Route::get('/plantilla-noticia', function () {
    return view('plantilla-noticia');
})->middleware('auth'); // a esta ruta se accede logueado y solo se usa en iframe

Route::get('/generar-noticias', 'ReleaseController@create')->middleware('auth');

Route::post('/generar-noticias', 'ReleaseController@store')->middleware('auth');

Route::get('/generar-noticias-success', function () {
    return view('generar-noticias-success');
})->middleware('auth');

// Modificar noticia
Route::get('/modificar-noticia/{id}', 'ReleaseController@edit')->middleware('auth');

Route::post('/modificar-noticia/{id}', 'ReleaseController@update')->middleware('auth'); //falta auth

// Crear imagen para redes sociales
Route::get('/generar-imagen', 'ReleaseController@createImage')->middleware('auth');

// Administrar carousel inicio
Route::get('/administrar-carousel', 'ReleaseController@carouselAdmin')->middleware('auth');

Route::post('/administrar-carousel', 'ReleaseController@carouselStore')->middleware('auth'); //falta auth

// Administrar imágenes guardadas
Route::get('/administrar-imagenes', 'ImageController@index')->middleware('auth');

// Eliminar imagen guardada
Route::get('/eliminar-imagen', function () {
    abort(404);
});

Route::delete('/eliminar-imagen', 'ImageController@destroy')->middleware('auth');


// Cambiar password de usuario
// Route::get('/changepassword', function() {
//     $user = App\User::where('username', 'acá va el nombre de usuario')->firstOrFail();
//     $user->password = Hash::make('acá va la contraseña nueva');
//     $user->save();
//
//     echo 'Password changed successfully.';
// });


// Eliminar usuario
// Route::get('/deleteuser', function() {
//     $user = App\User::where('username', 'acá va el nombre de usuario')->firstOrFail();
//     $user->delete();
//
//     echo 'User removed successfully.';
// });
