<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Validator;

use App\Configuracion;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.configuraciones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $configuracion = new Configuracion();

        return view('admin.configuraciones.create', compact('configuracion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'anio_fizcal'       => [
                'required',
                'numeric',
                'digits:4',
                Rule::unique('configuraciones')->where(function ($query){
                    $query->where('estado', 'activo');
                })
            ],
            'igv'               => 'required|numeric|min:1',
            'serie_factura'     => 'required|numeric|min:1',
            'numero_factura'    => 'required|numeric|min:1',
            'serie_guia'        => 'required|numeric|min:1',
            'numero_guia'       => 'required|numeric|min:1'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        /*
         * Establecer como inactivas todas las configuraciones (activas)
         */
        Configuracion::where('activo', '1')->update(['activo' => '0']);

        /*
         * Registrar la nueva configuracion (como activa)
         */
        Configuracion::create([
            'anio_fizcal'       => $request->anio_fizcal,
            'igv'               => (double) $request->igv,
            'serie_factura'     => $request->serie_factura,
            'numero_factura'    => $request->numero_factura,
            'serie_guia'        => $request->serie_guia,
            'numero_guia'       => $request->numero_guia
        ]);

        return view('admin.configuraciones.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuracion = Configuracion::findOrFail($id);

        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuracion = Configuracion::findOrFail($id);

        return view('admin.configuraciones.edit', compact('configuracion'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $configuracion = Configuracion::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'anio_fizcal'       => [
                'required',
                'numeric',
                'digits:4',
                Rule::unique('configuraciones')->where(function ($query){
                    $query->where('estado', 'activo');
                })->ignore($configuracion->id)
            ],
            'igv'               => 'required|numeric|min:1',
            'serie_factura'     => 'required|numeric|min:1',
            'numero_factura'    => 'required|numeric|min:1',
            'serie_guia'        => 'required|numeric|min:1',
            'numero_guia'       => 'required|numeric|min:1'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        $configuracion->anio_fizcal = $request->anio_fizcal;
        $configuracion->igv = (double) $request->igv;
        $configuracion->serie_factura = $request->serie_factura;
        $configuracion->numero_factura = $request->numero_factura;
        $configuracion->serie_guia = $request->serie_guia;
        $configuracion->numero_guia = $request->numero_guia;

        $configuracion->save();

        return view('admin.configuraciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $configuracion = Configuracion::findOrFail($id);

        $configuracion->estado = 'inactivo';
        $configuracion->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
