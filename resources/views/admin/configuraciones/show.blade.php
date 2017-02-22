<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Datos de Configuraci&oacute;n</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 black">
                        A&ntilde;o Fizcal
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->anio_fizcal }}
                    </div>
                    <div class="col-sm-3 black">
                        IGV
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->igv }}
                    </div>
                    <div class="col-sm-3 black">
                        Serie Factura
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->serie_factura }}
                    </div>
                    <div class="col-sm-3 black">
                        N&uacute;mero Factura
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->numero_factura }}
                    </div>
                    <div class="col-sm-3 black">
                        Serie Guia
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->serie_guia }}
                    </div>
                    <div class="col-sm-3 black">
                        N&uacute;mero Guia
                    </div>
                    <div class="col-sm-9">
                        {{ $configuracion->numero_guia }}
                    </div>
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="{{ url('/admin/configuraciones') }}" class="btn btn-success btn-crud" data-option="">
                            Ir a Lista de Configuraciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>