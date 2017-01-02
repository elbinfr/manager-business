{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-crud']) !!}
    <div class="col-sm-4 element-group">
        {!! Form::label('tipo_documento', 'Tipo de Documento') !!}
        {!! Form::select('tipo_documento', [
            'DNI' => 'DNI',
            'RUC' => 'RUC'
            ], $cliente->tipo_documento, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-8 element-group">
        {!! Form::label('numero_documento', 'N&uacute;mero de Documento') !!}
        {!! Form::text('numero_documento', $cliente->numero_documento, ['class' => 'form-control']) !!}
    </div>

    <div class="col-sm-12 element-group">
        {!! Form::label('nombre', 'Nombre o Raz&oacute;n social') !!}
        {!! Form::text('nombre', $cliente->nombre, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-12 element-group">
        {!! Form::label('direccion', 'Direcci&oacute;n') !!}
        {!! Form::text('direccion', $cliente->direccion, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4 element-group">
        {!! Form::label('telefono', 'Tel&eacute;fono') !!}
        {!! Form::text('telefono', $cliente->telefono, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-8 element-group">
        {!! Form::label('email', 'Correo Electr&oacute;nico') !!}
        {!! Form::text('email', $cliente->email, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-4">
        {!! Form::label('saldo_inicial', 'Saldo Inicial') !!}
        {!! Form::text('saldo_inicial', $cliente->saldo_inicial, [
            'class' => 'form-control',
            'placeholder' => '0.000']) !!}
    </div>
    <div class="col-sm-12" style="text-align: right">
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ url('/admin/clientes') }}" class="btn btn-default btn-crud" data-option="">
            Cancelar
        </a>
    </div>
{!! Form::close() !!}