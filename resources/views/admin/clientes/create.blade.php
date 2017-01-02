<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Nuevo Cliente</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.clientes.form', [
                        'cliente' => $cliente,
                        'url' => '/admin/clientes',
                        'method' => 'POST'])
                </div>
            </div>
        </div>
    </div>
</div>