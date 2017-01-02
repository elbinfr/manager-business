<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Nueva Unidad</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.unidades.form', [
                        'unidad' => $unidad,
                        'url' => '/admin/unidades',
                        'method' => 'POST'])
                </div>
            </div>
        </div>
    </div>
</div>