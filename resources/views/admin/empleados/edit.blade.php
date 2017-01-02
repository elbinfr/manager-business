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
                        'url'       => '/admin/empleados/' . $empleado->id,
                        'method'    => 'PUT'])
                </div>
            </div>
        </div>
    </div>
</div>