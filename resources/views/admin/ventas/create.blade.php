<div class="row">
    <div class="col-md-12">
        <div class="block-flat">
            <div class="header">
                <h4>Nueva Venta (Factura)</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group group-venta">
                            <label for="numero_venta">Nro. Factura</label>
                            <input type="text" name="numero_factura" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group group-venta">
                            <label for="fecha_venta">Fecha de Emisi&oacute;n</label>
                            <input type="date" name="fecha_venta" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group group-venta">
                            <label for="numero_guia">Nro. Guia</label>
                            <input type="text" name="numero_guia" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group group-venta">
                            <label for="nombre">Nombre o Raz&oacute;n Social</label>
                            <select name="nombre" id="cbo-cliente" class="form-control select2">
                                <option value=""></option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}"
                                            data-documento="{{ $cliente->numero_documento }}"
                                            data-direccion="{{ $cliente->direccion }}">
                                        {{ $cliente->nombre }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group group-venta">
                            <label for="numero_documento">Nro. Documento</label>
                            <input type="text" name="numero_documento" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group group-venta">
                            <label for="direccion">Direcci&oacute;n</label>
                            <textarea name="direccion" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <table class="table table-bordered table-detail">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th class="col-corta">U de Medida</th>
                                    <th class="col-corta">Precio</th>
                                    <th class="col-corta">Cantidad</th>
                                    <th class="col-corta">Valor Venta</th>
                                    <th width="30px">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items">
                                    <td>
                                        <select-product v-bind:productos="productos" v-bind:item="item"></select-product>
                                    </td>
                                    <td>
                                        @{{ item.unidad }}
                                    </td>
                                    <td>
                                        <input type="text" v-model="item.precio" class="form-control amount">
                                    </td>
                                    <td>
                                        <input type="text" v-model="item.cantidad" class="form-control amount">
                                    </td>
                                    <td class="amount">
                                        @{{ item | amount }}
                                    </td>
                                    <td>
                                        <a href="#" @click="eliminarItem">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <a href="#" @click="agregarItem">
                                            <span class="glyphicon glyphicon-plus"></span>
                                            Agregar Item
                                        </a>
                                    </td>
                                    <td>Subtotal</td>
                                    <td class="amount">
                                        @{{ calSubtotal }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>IGV (18%)</td>
                                    <td class="amount">
                                        @{{ calIgv }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total</td>
                                    <td class="amount">
                                        @{{ calTotal }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/vue.js') }}"></script>
<script src="{{ asset('js/ventas.js') }}"></script>