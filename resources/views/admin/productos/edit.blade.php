<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Editar Producto</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.productos.form', [
                        'producto' => $producto,
                        'url' => '/admin/productos/' . $producto->id,
                        'method' => 'PUT'])
                </div>
            </div>
        </div>
    </div>
</div>