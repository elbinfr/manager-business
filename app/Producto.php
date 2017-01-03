<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'id',
        'unidad_id',
        'nombre',
        'precio_referencial',
        'estado'
    ];

    public function unidad()
    {
        return $this->belongsTo('App\Unidad');
    }

    public static function dataTable()
    {
        return DB::table('productos')
                    ->join('unidades', 'productos.unidad_id', '=', 'unidades.id')
                    ->select('productos.*', 'unidades.nombre as nombre_unidad')
                    ->where('productos.estado', 'activo')
                    ->orderBy('productos.nombre', 'ASC')->get();
    }
}
