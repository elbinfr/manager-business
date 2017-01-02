<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('/', function(){
        return view('layouts.master');
    });

    //+++++ Datos +++++++++++++++++++++++++++++++++++++
    Route::resource('/clientes', 'ClienteController');
    Route::resource('/empleados', 'EmpleadoController');
    Route::resource('/productos', 'ProductoController');
    Route::resource('/unidades', 'UnidadController');

    //+++++ Logistica +++++++++++++++++++++++++++++++++++++
    Route::resource('/ventas', 'VentaController');
});
