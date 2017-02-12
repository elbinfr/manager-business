function findById(items, id) {
    for (var i in items) {
        if (items[i].id == id) {
            return items[i];
        }
    }

    return null;
}

Vue.component('select-product', {
    template: '#select-product-tpl',
    props: ['productos', 'item'],
    methods: {
        seleccionarProducto: function(event){
            var producto = findById(this.productos, this.item.id);
            this.item.unidad = producto.nombre_unidad;
            this.item.nombre = producto.nombre;
            this.item.precio = producto.precio_referencial;
        }
    }
});

Vue.filter('amount', function(item){
    item.valor_venta = item.precio * item.cantidad;
    return item.valor_venta;
});

var vm = new Vue({
    el: '#div-sale',
    data: {
        numero_factura: '',
        fecha_venta: '',
        numero_guia: '',
        porcentaje_igv: 0.18,
        valor_igv: 0,
        subtotal: 0,
        total: 0,
        clientes: [],
        cliente: {
            id: '',
            nombre: '',
            numero_documento: '',
            direccion: ''
        },
        productos: [],
        items: []
    },
    mounted: function(){
        $.getJSON('/api/datos-para-venta', [], function(response){
            vm.productos = response.productos;
            vm.clientes = response.clientes;
        });
    },
    methods: {
        seleccionarCliente: function(event){
            var cliente_elegido = findById(this.clientes, this.cliente.id);
            this.cliente.nombre = cliente_elegido.nombre;
            this.cliente.numero_documento = cliente_elegido.numero_documento;
            this.cliente.direccion = cliente_elegido.direccion;
        },
        agregarItem: function(event){
            var nuevo_item = {
                id: '',
                unidad: '',
                nombre: '',
                precio: 0,
                cantidad: 0,
                valor_venta: 0
            };

            this.items.push(nuevo_item);
        },
        eliminarItem: function(item){
            var index = this.items.indexOf(item);
            this.items.splice(index, 1);
        },
        guardar: function(token){
            var parameters = {
                _token: token,
                cliente: this.cliente,
                items: this.items
            };
            $.post('/admin/ventas', parameters, function (response) {
                console.log(response);
            });
        }
    },
    computed: {
        calSubtotal: function(){
            var suma = 0;
            for(var i in this.items){
                suma = suma + this.items[i].valor_venta;
            }
            this.subtotal = suma;
            return this.subtotal;
        },
        calIgv: function(){
            this.valor_igv = this.subtotal * this.porcentaje_igv;

            return this.valor_igv;
        },
        calTotal: function(){
            this.total = this.subtotal + this.valor_igv;

            return this.total;
        }
    }
});