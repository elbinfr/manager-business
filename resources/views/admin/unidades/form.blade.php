{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-crud']) !!}
<div class="col-sm-9 element-group">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', $unidad->nombre, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-3 element-group">
    {!! Form::label('simbolo', 'S&iacute;mbolo') !!}
    {!! Form::text('simbolo', $unidad->simbolo, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-12" style="text-align: right">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ url('/admin/unidades') }}" class="btn btn-default btn-crud" data-option="">
        Cancelar
    </a>
</div>
{!! Form::close() !!}