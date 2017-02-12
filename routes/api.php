<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/clientes', function(){
    return Datatables::eloquent(App\Cliente::where('estado','activo')->orderBy('nombre', 'ASC'))->make(true);
});

Route::get('/empleados', function(){
    return Datatables::eloquent(App\Empleado::where('estado','activo')->orderBy('apellidos', 'ASC'))->make(true);
});

Route::get('/unidades', function(){
    return Datatables::eloquent(App\Unidad::where('estado','activo')->orderBy('nombre', 'ASC'))->make(true);
});

Route::get('/productos', function(){
    return Datatables::collection(App\Producto::dataTable())->make(true);
});

Route::get('/datos-para-venta', function(){

    return [
        'clientes'  => App\Cliente::orderBy('nombre', 'ASC')->get(),
        'productos' => App\Producto::dataTable()
    ];

});


