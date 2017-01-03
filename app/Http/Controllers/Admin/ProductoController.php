<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Validator;

use App\Producto;
use App\Unidad;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.productos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $unidades = Unidad::dropDawn();

        return view('admin.productos.create', compact('producto', 'unidades'));
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
            'nombre'                => [
                'required',
                'min:3',
                'max:150',
                Rule::unique('productos')->where('unidad_id', $request->unidad_id)
            ],
            'unidad_id'             => 'required|exists:unidades,id',
            'precio_referencial'    => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        Producto::create([
            'unidad_id'             => $request->unidad_id,
            'nombre'                => trim($request->nombre),
            'precio_referencial'    => (double)$request->precio_referencial
        ]);

        return view('admin.productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unidades = Unidad::dropDawn();
        $producto = Producto::findOrFail($id);

        return view('admin.productos.edit', compact('producto', 'unidades'));
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
        $producto = Producto::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'min:3',
                'max:150',
                Rule::unique('productos')->ignore($producto->id)->where('unidad_id', $request->unidad_id)
            ],
            'unidad_id'             => 'required|exists:unidades,id',
            'precio_referencial'    => 'required|numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'    => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        $producto->unidad_id = $request->unidad_id;
        $producto->nombre = trim($request->nombre);
        $producto->precio_referencial = (double) $request->precio_referencial;
        $producto->save();

        return view('admin.productos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->estado = 'inactivo';
        $producto->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
