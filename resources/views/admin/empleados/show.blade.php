<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Datos de Empleado</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 black">
                        DNI
                    </div>
                    <div class="col-sm-9">
                        {{ $empleado->dni }}
                    </div>
                    <div class="col-sm-3 black">
                        Nombres
                    </div>
                    <div class="col-sm-9">
                        {{ $empleado->nombres }}
                    </div>
                    <div class="col-sm-3 black">
                        Apellidos
                    </div>
                    <div class="col-sm-9">
                        {{ $empleado->apellidos }}
                    </div>
                    <div class="col-sm-3 black">
                        Fecha de Nacimiento
                    </div>
                    <div class="col-sm-9">
                        {{ $empleado->fecha_nacimiento->toFormattedDateString() }}
                    </div>
                    <div class="col-sm-3 black">
                        Direcci&oacute;n
                    </div>
                    <div class="col-sm-9">
                        {{ $empleado->direccion }}
                    </div>
                    @if($empleado->telefono != '')
                        <div class="col-sm-3 black">
                            Tel&eacute;fono
                        </div>
                        <div class="col-sm-9">
                            {{ $empleado->telefono }}
                        </div>
                    @endif
                    <!-- Datos de Usuario +++++++++++++++++++++++++++++++++++++++++++++++-->
                    @if(isset($empleado->user))
                        <div class="col-sm-12">
                            <hr>
                        </div>
                        <div class="col-sm-3 black">
                            Nombre de Usuario
                        </div>
                        <div class="col-sm-9">
                            {{ $empleado->user->username }}
                        </div>
                        <div class="col-sm-3 black">
                            Correo Electr&oacute;nico
                        </div>
                        <div class="col-sm-9">
                            {{ $empleado->user->email }}
                        </div>
                    @endif
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="{{ url('/admin/empleados') }}" class="btn btn-success btn-crud" data-option="">
                            Ir a Lista de Empleados
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>