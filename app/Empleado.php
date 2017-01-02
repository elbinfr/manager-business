<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'dni',
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'direccion',
        'telefono',
        'estado'
    ];

    protected $dates = [
        'fecha_nacimiento'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function printUserName()
    {
        $nombres = explode(" ", $this->nombres);
        $apellidos = explode(" ", $this->apellidos);

        return $nombres[0] . ' ' . $apellidos[0];
    }
}
