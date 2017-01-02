<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Productos Registrados</h4>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="productos-dt" style="width: 100%">
                        <thead>
                        <tr>
                            <th width="5px"></th>
                            <th>Nombre</th>
                            <th>Unidad de Medida</th>
                            <th>Precio</th>
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
        var productos_dt = "#productos-dt";
        var url_base = "{{ url('/admin/productos') }}";
        var url_api = "/api/productos";
        var token = "{{ csrf_token() }}";

        var columns = [
            {
                "className":      'details-control',
                "orderable":      false,
                "searchable": false,
                "data":           null,
                "defaultContent": ''
            },
            {data: 'nombre'},
            {data: 'unidad_id'},
            {data: 'precio_referencial'}
        ];

        function load(){
            changeHeaderPage();
        }

        initDataTableServerSideCRUD(productos_dt, url_base, url_api, token, columns);
        setTimeout(load, 0);
    })();
</script>