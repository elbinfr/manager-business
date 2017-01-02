<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Clientes Registrados</h4>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="clientes-dt" style="width: 100%">
                        <thead>
                        <tr>
                            <th width="5px"></th>
                            <th>Tipo Documento</th>
                            <th>Nro. Documento</th>
                            <th>Nombre</th>
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
        var clientes_dt = "#clientes-dt";
        var url_base = "{{ url('/admin/clientes') }}";
        var url_api = "/api/clientes";
        var token = "{{ csrf_token() }}";

        var columns = [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable": false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'tipo_documento'},
            {data: 'numero_documento'},
            {data: 'nombre'},
            {data: 'telefono'},
            {data: 'direccion'}
        ];

        function load(){
            changeHeaderPage();
        }

        initDataTableServerSideCRUD(clientes_dt, url_base, url_api, token, columns);
        setTimeout(load, 0);
    })();
</script>