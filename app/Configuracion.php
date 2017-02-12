<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table = 'configuraciones';

    protected $fillable = [
        'id', 'anio_fizcal', 'igv', 'serie_factura', 'numero_factura', 'serie_guia', 'numero_guia'
    ];
}
