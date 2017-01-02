<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Datos de Unidad de Medida</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 black">
                        Nombre
                    </div>
                    <div class="col-sm-9">
                        {{ $unidad->nombre }}
                    </div>
                    <div class="col-sm-3 black">
                        S&iacute;mbolo
                    </div>
                    <div class="col-sm-9">
                        {{ $unidad->simbolo }}
                    </div>
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="{{ url('/admin/unidades') }}" class="btn btn-success btn-crud" data-option="">
                            Ir a Lista de Unidades de Medida
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>