<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

use App\Empleado;
use App\User;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.empleados.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleado = new Empleado();
        $user = new User();

        return view('admin.empleados.create', compact('empleado', 'user'));
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
            'dni'               => 'required|unique:empleados,dni|size:8',
            'nombres'           => 'required|min:3',
            'apellidos'         => 'required|min:3',
            'direccion'         => 'required|min:5',
            'fecha_nacimiento'  => 'required|date|adult',
            'telefono'          => 'min:6',
            'username'          => 'required_if:tiene_usuario,SI|unique:users,username',
            'email'             => 'required_if:tiene_usuario,SI|unique:users,email',
            'password'          => 'required_if:tiene_usuario,SI|min:6'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        DB::transaction(function() use($request){

            $empleado = Empleado::create([
                'dni'               => trim($request->dni),
                'nombres'           => title_case(trim($request->nombres)),
                'apellidos'         => title_case(trim($request->apellidos)),
                'direccion'         => title_case(trim($request->direccion)),
                'fecha_nacimiento'  => new Carbon($request->fecha_nacimiento),
                'telefono'          => trim($request->telefono),
                'email'             => trim($request->email)
            ]);

            if($request->tiene_usuario == 'SI'){
                User::create([
                    'empleado_id'   => $empleado->id,
                    'username'      => $request->username,
                    'email'         => $request->email,
                    'password'      => bcrypt($request->password),
                ]);
            }

        });

        return view('admin.empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::findOrFail($id);

        return view('admin.empleados.show', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $user = (isset($empleado->user)) ? $empleado->user : new User();

        return view('admin.empleados.edit', compact('empleado', 'user'));
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
        $empleado = Empleado::findOrFail($id);
        $has_user = isset($empleado->user);
        $user_id = ($has_user) ? $empleado->user->id : 0;

        $validator = Validator::make($request->all(), [
            'dni'               => [
                'required',
                'size:8',
                Rule::unique('empleados')->ignore($empleado->id)
            ],
            'nombres'           => 'required|min:3',
            'apellidos'         => 'required|min:3',
            'direccion'         => 'required|min:5',
            'fecha_nacimiento'  => 'required|date|adult',
            'telefono'          => 'min:6',
            'username'          => 'sometimes|required_if:tiene_usuario,SI|unique:users,username',
            'email'             => 'sometimes|required_if:tiene_usuario,SI|unique:users,email',
            'password'          => 'sometimes|required_if:tiene_usuario,SI|min:6',
            'new_username'      => [
                'sometimes',
                'required',
                Rule::unique('users', 'username')->ignore($user_id)
            ],
            'new_email'         => [
                'sometimes',
                'required',
                Rule::unique('users', 'email')->ignore($user_id)
            ],
            'new_password'      => 'sometimes|min:6'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'        => 422,
                'responseJSON'  => $validator->errors()
            ]);
        }

        DB::transaction(function() use($empleado, $has_user, $request){

            $empleado->dni = trim($request->dni);
            $empleado->nombres = title_case(trim($request->nombres));
            $empleado->apellidos = title_case(trim($request->apellidos));
            $empleado->direccion = title_case(trim($request->direccion));
            $empleado->fecha_nacimiento = new Carbon($request->fecha_nacimiento);
            $empleado->telefono = trim($request->telefono);

            $empleado->save();

            if(!$has_user){
                if($request->tiene_usuario == 'SI'){
                    User::create([
                        'empleado_id'   => $empleado->id,
                        'username'      => trim($request->username),
                        'email'         => trim($request->email),
                        'password'      => bcrypt($request->password),
                    ]);
                }
            }else{
                $user = $empleado->user;
                if($request->eliminar_usuario == 'SI'){
                    $user->delete();
                }else{
                    $user->username = $request->new_username;
                    $user->email = $request->new_email;
                    if( trim($request->new_password) != '' && !is_null($request->new_password)){
                        $user->password = bcrypt($request->new_password);
                    }
                    $user->save();
                }
            }

        });

        return view('admin.empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->estado = 'inactivo';
        $empleado->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
