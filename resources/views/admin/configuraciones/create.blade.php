<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Nueva Configuraci&oacute;n</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.configuraciones.form', [
                        'configuracion' => $configuracion,
                        'url'           => '/admin/configuraciones',
                        'method'        => 'POST'])
                </div>
            </div>
        </div>
    </div>
</div>