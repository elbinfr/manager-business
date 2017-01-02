{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-crud']) !!}
<div class="col-sm-12 element-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $producto->nombre, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-12 element-group">
    {!! Form::label('unidad_id', 'Unidad de Medida') !!}
    {!! Form::select('unidad_id',
        $unidades,
        $producto->unidad_id,
        ['placeholder' => 'Seleccione una unidad de medida', 'class' => 'form-control']) !!}
</div>
<div class="col-sm-12 element-group">
    {!! Form::label('precio_referencial', 'Precio Referencial') !!}
    {!! Form::text('precio_referencial', $producto->precio_referencial, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-12" style="text-align: right">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ url('/admin/productos') }}" class="btn btn-default btn-crud" data-option="">
        Cancelar
    </a>
</div>
{!! Form::close() !!}