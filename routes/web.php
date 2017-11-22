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
    Route::resource('/profile','ProfileController');

    Route::group(['middleware' => ['checkage:3']], function () {
        Route::resource('/mercaderia','MercaderiaController');
        Route::resource('/tercero','TerceroController');
        Route::resource('/book','BookController');
    });


    Route::get('/age', ['middleware'=>'checkage:21',
        function(){ return '<h1>Bienvenido ya sos mayor ...<p>'.
        Auth::user()->name.'. <p>Edad - '.Auth::user()->Age().'!!</h1>'; }]);
});


Route::get('/admin', function () {
    dd(Auth::user()->Age());
})->middleware('auth');

Route::get('/demo', function () { return view('demo'); })->middleware('auth');
Route::get('/nombre', ['middleware' => 'auth', function(){ $nombre = config('app.name');    return $nombre;} ] );

Route::get('/tiempo', function(){    $nombre = config('app.timezone');    return $nombre;});

Route::get('/runtime', function(){
    config(['app.timezone' => 'America/Mexico_City']);
    $nombre = config('app.timezone');
    return $nombre;
});


Route::post('/send_info', function () { 

    dd($request);

    $rules =  array('captcha' => ['required', 'captcha']); 

    $captcha = Input::get('captcha');

    $validator = Validator::make(
        ['captcha' => $captcha ], 
        $rules, 
        // Mensaje de error personalizado 
        ['captcha' => 'El captcha ingresado es incorrecto.' ]
    ); 

    if ($validator->passes()) { 
        echo "Todo Correcto, sigue codeando :)"; 
    } else { 
        return View::make('welcome')->withErrors($validator); 
    } 
});