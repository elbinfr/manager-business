<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Datos de Producto</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-3 black">
                        Nombre
                    </div>
                    <div class="col-sm-9">
                        {{ $producto->nombre }}
                    </div>
                    <div class="col-sm-3 black">
                        Unidad de Medida
                    </div>
                    <div class="col-sm-9">
                        {{ $producto->unidad->nombre }}
                    </div>
                    <div class="col-sm-3 black">
                        Precio Referencial
                    </div>
                    <div class="col-sm-9">
                        {{ $producto->precio_referencial }}
                    </div>
                    <div class="col-sm-12" style="text-align: right;">
                        <a href="{{ url('/admin/productos') }}" class="btn btn-success btn-crud" data-option="">
                            Ir a Lista de Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>