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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//!!--- ZONA ADMINISTRADOR ---!!
Route::get('/admin', 'adminController@index')->name('admni');
//!!--- GRUPO ADMIN ---!!
Route::prefix('admin')->group(function () {

    //Zona Usuarios
    Route::get('users', 'admin\UserController@index' );

    Route::get('{id}', 'admin\UserController@show' )->name('perfil');

    Route::post('update-user', 'admin\UserController@update' );

    //Aka
    Route::post('create-aka', 'admin\UserController@store' );

});
//--- ZONA WEB ---
Route::get('/home', 'HomeController@index')->name('home');
//!!--- ZONA WEB --- !!

//CREAR ZONAS
Route::get('/add-zona', 'ZonaEventoController@index')->name('add-zona');

Route::post('/add-zona', 'ZonaEventoController@create')->name('add-zona');


//CREAR TORNEOS
Route::get('/add-torneo', 'TorneoController@index')->name('add-torneo');

Route::post('/add-torneo', 'TorneoController@create')->name('add-torneo');

Route::get('/delete/{slug}', 'TorneoController@destroy')->name('delete-torneo');

Route::get('/admin/{slug}', 'TorneoController@show')->name('delete-torneo');

//CREAR EVENTO
Route::get('/add-evento', 'EventoController@index')->name('add-evento');

Route::post('/add-evento-zona', 'EventoController@createZona')->name('add-evento');

Route::post('/add-evento', 'EventoController@create')->name('add-evento');



//!!--- ZONA ADMINISTRADOR ---!!


//!!--- Storage Link ---!!

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app\\img-up\\users\\3\\user-icon\\'.$filename);
    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
