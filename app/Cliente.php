<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'id',
        'tipo_documento',
        'numero_documento',
        'nombre',
        'direccion',
        'telefono',
        'email',
        'saldo_inicial',
        'activo'
    ];

    public static function dropDawn()
    {
        return Cliente::where('estado', 'activo')->pluck('nombre', 'numero_documento');
    }
}
