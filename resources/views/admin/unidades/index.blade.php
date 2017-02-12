<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Unidades de Medida Registradas</h4>
            </div>
            <div class="content">
                <div class="table-responsive">
                    <table class="table table-bordered" id="unidades-dt" style="width: 100%">
                        <thead>
                        <tr>
                            <th width="5px"></th>
                            <th>Nombre</th>
                            <th>S&iacute;mbolo</th>
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
        var unidades_dt = "#unidades-dt";
        var url_base = "{{ url('/admin/unidades') }}";
        var url_api = "{{ url('/api/unidades') }}";
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
            {data: 'simbolo'}
        ];

        function load(){
            changeHeaderPage();
        }

        initDataTableServerSideCRUD(unidades_dt, url_base, url_api, token, columns);
        setTimeout(load, 0);
    })();
</script>