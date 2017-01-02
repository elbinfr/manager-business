<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
