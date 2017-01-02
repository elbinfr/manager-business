<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'unidades';

    protected $fillable = [
        'id',
        'simbolo',
        'nombre',
        'estado'
    ];

    public function productos()
    {
        return $this->hasMany('App\Productos');
    }

    public static function dropDawn()
    {
        return Unidad::where('estado', 'activo')->pluck('nombre', 'id');
    }
}
