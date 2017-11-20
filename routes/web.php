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
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('/task','TaskController');

    Route::group(['middleware' => ['checkage:33']], function () {
        Route::resource('/profile','ProfileController');
        Route::resource('/mercaderia','MercaderiaController');
        Route::resource('/tercero','TerceroController');
    });


    Route::get('/age', ['middleware'=>'checkage:21',
        function(){ return '<h1>Bienvenido ya sos mayor ...<p>'.
        Auth::user()->name.'. <p>Edad - '.Auth::user()->Age().'!!</h1>'; }]);
});


    Route::get('/admin', function () {
        dd(Auth::user()->Age());
    })->middleware('auth');

    Route::get('/demo', function () { return view('demo'); })->middleware('auth');
    Route::get('/nombre', function(){ $nombre = config('app.name');    return $nombre;});

    Route::get('/tiempo', function(){    $nombre = config('app.timezone');    return $nombre;});

    Route::get('/runtime', function(){
        config(['app.timezone' => 'America/Mexico_City']);
        $nombre = config('app.timezone');
        return $nombre;
    });

