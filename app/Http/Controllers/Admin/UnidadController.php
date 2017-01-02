<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Validator;

use App\Unidad;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.unidades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidad = new Unidad();

        return view('admin.unidades.create', compact('unidad'));
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
            'nombre'    => 'required|min:3|max:150|unique:unidades,nombre',
            'simbolo'   => 'required|min:1|max:10|unique:unidades,simbolo'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'    => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        Unidad::create([
            'simbolo'   => trim($request->simbolo),
            'nombre'    => trim($request->nombre)
        ]);

        return view('admin.unidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unidad = Unidad::findOrFail($id);

        return view('admin.unidades.show', compact('unidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidad = Unidad::findOrFail($id);

        return view('admin.unidades.edit', compact('unidad'));
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
        $unidad = Unidad::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'min:3',
                'max:150',
                Rule::unique('unidades')->ignore($unidad->id)
            ],
            'simbolo' => [
                'required',
                'min:1',
                'max:10',
                Rule::unique('unidades')->ignore($unidad->id)
            ]
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        $unidad->nombre = trim($request->nombre);
        $unidad->simbolo = trim($request->simbolo);

        $unidad->save();

        return view('admin.unidades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unidad = Unidad::findOrFail($id);
        $unidad->estado = 'inactivo';

        $unidad->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
