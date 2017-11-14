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


Route::resource('/task','TaskController');


Route::get('demo', function () {
     //return 'hola desde demo';
     return view('demo');
});

Route::get('/admin', function () {
    return 'hola desde admin';
});


Route::get('/test','TestController@index');
Route::get('/test/{name}/{age}','TestController@show');
Route::get('/testdatos/{user}','TestController@datos');

Route::resource('/profile','ProfileController');





Route::get('/nombre', function(){
    $nombre = config('app.name');
    return $nombre;
});

Route::get('/tiempo', function(){
    $nombre = config('app.timezone');
    return $nombre;
});

Route::get('/runtime', function(){
    config(['app.timezone' => 'America/Mexico_City']);
    $nombre = config('app.timezone');
    return $nombre;
});

