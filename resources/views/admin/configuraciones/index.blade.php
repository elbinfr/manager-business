<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Configuraciones</h4>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="clientes-dt" style="width: 100%">
                        <thead>
                            <tr>
                                <th width="5px"></th>
                                <th>A&ntilde;o Fizcal</th>
                                <th>IGV (%)</th>
                                <th>Serie Factura</th>
                                <th>N&uacute;mero Factura</th>
                                <th>Serie Guia</th>
                                <th>N&uacute;mero Guia</th>
                                <th>Estado</th>
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
        var url_base = "{{ url('/admin/configuraciones') }}";
        var url_api = "{{ url('/api/configuraciones') }}";
        var token = "{{ csrf_token() }}";

        var columns = [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable": false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'anio_fizcal'},
            {data: 'igv'},
            {data: 'serie_factura'},
            {data: 'numero_factura'},
            {data: 'serie_guia'},
            {data: 'numero_guia'},
            {data: function(row, type, val, meta){
                var value = row.activo;
                var cadena = '';
                if(value == '0'){
                    cadena = '<span class="label label-default">Inactivo</span>';
                }else{
                    cadena = '<span class="label label-success">Activo</span>';
                }
                return cadena;
            }}
        ];

        function load(){
            changeHeaderPage();
        }

        initDataTableServerSideCRUD(clientes_dt, url_base, url_api, token, columns);
        setTimeout(load, 0);
    })();
</script>