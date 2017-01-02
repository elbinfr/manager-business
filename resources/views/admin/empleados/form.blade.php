{!! Form::open(['url' => $url, 'method' => $method, 'class' => 'form-crud']) !!}
<div class="col-sm-12">
    <h5 class="headline">
        <span>Datos Personales</span>
    </h5>
</div>
<div class="col-sm-12">
    <div class="col-sm-12 element-group">
        {!! Form::label('dni', 'N&uacute;mero de DNI') !!}
        {!! Form::text('dni', $empleado->dni, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-12 element-group">
        {!! Form::label('nombres', 'Nombres') !!}
        {!! Form::text('nombres', $empleado->nombres, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-12 element-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', $empleado->apellidos, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-12 element-group">
        {!! Form::label('direccion', 'Direcci&oacute;n') !!}
        {!! Form::text('direccion', $empleado->direccion, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-6 element-group">
        {!! Form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
        {!! Form::date('fecha_nacimiento', $empleado->fecha_nacimiento, ['class' => 'form-control']) !!}
    </div>
    <div class="col-sm-6 element-group">
        {!! Form::label('telefono', 'Tel&eacute;fono') !!}
        {!! Form::text('telefono', $empleado->telefono, ['class' => 'form-control']) !!}
    </div>
    @if( !isset($empleado->user) )
        <div class="col-sm-3 element-group">
            {!! Form::label('tiene_usuario', 'Tiene usuario de sistema?', ['class' => 'control-label']) !!}
        </div>
        <div class="col-sm-9 element-group">
            {!! Form::checkbox('tiene_usuario', 'SI', false, ['class' => 'show-hide']) !!}
        </div>
    @endif
</div>
<div class="col-sm-12 form-user-system">
    <h5 class="headline">
        <span>Datos de Usuario de Sistema</span>
    </h5>
</div>
<div class="col-sm-12 form-user-system">
    @if(isset($empleado->user))
        <div class="col-sm-12 element-group">
            {!! Form::label('new_username', 'Nombre de Usuario') !!}
            {!! Form::text('new_username', $user->username, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-12 element-group">
            {!! Form::label('new_email', 'Correo Electr&oacute;nico') !!}
            {!! Form::text('new_email', $user->email, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-12 element-group">
            {!! Form::label('new_password', 'Nueva Contrase&ntilde;a') !!}
            {!! Form::password('new_password', ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-3 element-group">
            {!! Form::label('eliminar_usuario', 'Eliminar usuario de sistema?', [
                'class' => 'control-label letra-roja']) !!}
        </div>
        <div class="col-sm-9 element-group">
            {!! Form::checkbox('eliminar_usuario', 'SI', false) !!}
        </div>
    @else
        <div class="col-sm-12 element-group">
            {!! Form::label('username', 'Nombre de Usuario') !!}
            {!! Form::text('username', $user->username, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-12 element-group">
            {!! Form::label('email', 'Correo Electr&oacute;nico') !!}
            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
        </div>
        <div class="col-sm-12 element-group">
            {!! Form::label('password', 'Contrase&ntilde;a') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    @endif
</div>
<div class="col-sm-12" style="text-align: right">
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ url('/admin/empleados') }}" class="btn btn-default btn-crud" data-option="">
        Cancelar
    </a>
</div>
{!! Form::close() !!}

<script type="text/javascript">
    (function(){
        var form_user_system = '.form-user-system';
        var check_show_hide = '.show-hide';
        var has_user = '{{ isset($empleado->user) }}';

        function initEvents(){
            $(check_show_hide).on('change', function(event){
                if($(this).prop('checked')){
                    setUsername();
                    $(form_user_system).show();
                }else{
                    cleanUserData();
                    $(form_user_system).hide();
                }
            });
        }

        function setUsername(){
            var nombres = $('input[name=nombres]').val().toLowerCase();
            var apellidos = $('input[name=apellidos]').val().toLowerCase();

            var lista_nombres = nombres.split(" ");
            var lista_apellidos = apellidos.split(" ");

            $('input[name=username]').val(lista_nombres[0]+'.'+lista_apellidos[0]);

        }

        function cleanUserData(){
            $('input[name=username]').val(null);
            $('input[name=email]').val(null);
            $('input[name=password]').val(null);
        }

        function hasUser(){
            if($(check_show_hide).prop('checked') || has_user === '1'){
                $(form_user_system).show();
            }else{
                $(form_user_system).hide();
            }
        }

        function load(){
            initEvents();
            hasUser();
        }

        setTimeout(load, 0);

    })()
</script>