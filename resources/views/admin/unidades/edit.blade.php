<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Editar Unidad de Medida</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.unidades.form', [
                        'unidad' => $unidad,
                        'url' => '/admin/unidades/' . $unidad->id,
                        'method' => 'PUT'])
                </div>
            </div>
        </div>
    </div>
</div>