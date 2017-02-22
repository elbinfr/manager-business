<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Editar Configuraci&oacute;n</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.configuraciones.form', [
                        'configuracion' => $configuracion,
                        'url'           => '/admin/configuraciones/'.$configuracion->id,
                        'method'        => 'PUT'])
                </div>
            </div>
        </div>
    </div>
</div>