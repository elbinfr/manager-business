{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-crud']) !!}
<div class="col-sm-6 element-group">
    {!! Form::label('anio_fizcal', 'A&ntilde;o Fizcal') !!}
    {!! Form::text('anio_fizcal', $configuracion->anio_fizcal, ['class' => 'form-control integer']) !!}
</div>
<div class="col-sm-6 element-group">
    {!! Form::label('igv', 'Porcentaje IGV') !!}
    {!! Form::text('igv', $configuracion->igv, ['class' => 'form-control decimal']) !!}
</div>
<div class="col-sm-6 element-group">
    {!! Form::label('serie_factura', 'Número de Serie Factura') !!}
    {!! Form::text('serie_factura', $configuracion->serie_factura, ['class' => 'form-control integer', 'min' => '1']) !!}
</div>
<div class="col-sm-6 element-group">
    {!! Form::label('numero_factura', 'Número de Factura') !!}
    {!! Form::text('numero_factura', $configuracion->numero_factura, ['class' => 'form-control integer', 'min' => '1']) !!}
</div>
<div class="col-sm-6 element-group">
    {!! Form::label('serie_guia', 'Número de Serie Guia') !!}
    {!! Form::text('serie_guia', $configuracion->serie_guia, ['class' => 'form-control integer', 'min' => '1']) !!}
</div>
<div class="col-sm-6 element-group">
    {!! Form::label('numero_guia', 'Número de Guia') !!}
    {!! Form::text('numero_guia', $configuracion->numero_guia, ['class' => 'form-control integer', 'min' => '1']) !!}
</div>
<div class="col-sm-12" style="text-align: right">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ url('/admin/configuraciones') }}" class="btn btn-default btn-crud" data-option="">
        Cancelar
    </a>
</div>
{!! Form::close() !!}