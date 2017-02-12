<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Empleados Registrados</h4>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="empleados-dt" style="width: 100%">
                        <thead>
                        <tr>
                            <th width="5px"></th>
                            <th>DNI</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Tel&eacute;fono</th>
                            <th>Direcci&oacute;n</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    (function(){
        var empleados_dt = "#empleados-dt";
        var url_base = "{{ url('/admin/empleados') }}";
        var url_api = "{{ url('/api/empleados') }}";
        var token = "{{ csrf_token() }}";

        var columns = [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable": false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'dni'},
            {data: 'apellidos'},
            {data: 'nombres'},
            {data: 'telefono'},
            {data: 'direccion'}
        ];

        function load(){
            changeHeaderPage();
        }

        initDataTableServerSideCRUD(empleados_dt, url_base, url_api, token, columns);
        setTimeout(load, 0);
    })();
</script>