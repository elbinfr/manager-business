<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Validation\Rule;
use Validator;

use App\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();

        return view('admin.clientes.create', compact('cliente'));
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
            'tipo_documento' => 'required|in:DNI,RUC',
            'numero_documento' => 'required|unique:clientes,numero_documento|length_if:tipo_documento,DNI,8,RUC,11',
            'nombre' => 'required|min:5',
            'direccion' => 'required|min:5',
            'telefono' => 'min:6',
            'email' => 'email',
            'saldo_inicial' => 'numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'responseJSON' => $validator->errors()
            ]);
        }


        Cliente::create([
            'tipo_documento' => $request->tipo_documento,
            'numero_documento' => trim($request->numero_documento),
            'nombre' => trim($request->nombre),
            'direccion' => title_case(trim($request->direccion)),
            'telefono' => trim($request->telefono),
            'email' => trim($request->email),
            'saldo_inicial' => (double)$request->saldo_inicial
        ]);

        return view('admin.clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.edit', compact('cliente'));
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
        $cliente = Cliente::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'tipo_documento' => 'required|in:DNI,RUC',
            'numero_documento' => [
                'required',
                'length_if:tipo_documento,DNI,8,RUC,11',
                Rule::unique('clientes')->ignore($id)
            ],
            'nombre' => 'required|min:5',
            'direccion' => 'required|min:5',
            'telefono' => 'min:6',
            'email' => 'email',
            'saldo_inicial' => 'numeric|min:0'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => 422,
                'responseJSON' => $validator->errors()
            ]);
        }

        $cliente->tipo_documento = $request->tipo_documento;
        $cliente->numero_documento = trim($request->numero_documento);
        $cliente->nombre = trim($request->nombre);
        $cliente->direccion = title_case(trim($request->direccion));
        $cliente->telefono = trim($request->telefono);
        $cliente->email = trim($request->email);
        $cliente->saldo_inicial = (double)$request->saldo_inicial;

        $cliente->save();

        return view('admin.clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->estado = 'inactivo';
        $cliente->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
