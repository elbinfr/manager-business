<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Nuevo Empleado</h4>
            </div>
            <div class="content">
                <div class="row">
                    @include('admin.empleados.form', [
                        'empleado'  => $empleado,
                        'user'      => $user,
                        'url'       => '/admin/empleados',
                        'method'    => 'POST'])
                </div>
            </div>
        </div>
    </div>
</div>