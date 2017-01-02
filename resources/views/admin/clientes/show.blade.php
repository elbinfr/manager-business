<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Datos de Cliente</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 black">
                        Tipo de Documento
                    </div>
                    <div class="col-sm-9">
                        {{ $cliente->tipo_documento }}
                    </div>
                    <div class="col-sm-3 black">
                        N&uacute;mero de Documento
                    </div>
                    <div class="col-sm-9">
                        {{ $cliente->numero_documento }}
                    </div>
                    <div class="col-sm-3 black">
                        Nombre o Razón social
                    </div>
                    <div class="col-sm-9">
                        {{ $cliente->nombre }}
                    </div>
                    <div class="col-sm-3 black">
                        Direcci&oacute;n
                    </div>
                    <div class="col-sm-9">
                        {{ $cliente->direccion }}
                    </div>
                    @if($cliente->telefono != '')
                        <div class="col-sm-3 black">
                            Tel&eacute;fono
                        </div>
                        <div class="col-sm-9">
                            {{ $cliente->telefono }}
                        </div>
                    @endif
                    @if($cliente->email != '')
                        <div class="col-sm-3 black">
                            Correo Electr&oacute;nico
                        </div>
                        <div class="col-sm-9">
                            {{ $cliente->email }}
                        </div>
                    @endif
                    @if($cliente->saldo_inicial > 0)
                        <div class="col-sm-3 black">
                            Saldo Inicial
                        </div>
                        <div class="col-sm-9">
                            {{ $cliente->saldo_inicial }}
                        </div>
                    @endif
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="{{ url('/admin/clientes') }}" class="btn btn-success btn-crud" data-option="">
                            Ir a Lista de Clientes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>