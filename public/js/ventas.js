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
            this.item.unidad = producto.unidad;
            this.item.nombre = producto.nombre;
            this.item.precio = producto.precio;
        }
    }
});

Vue.filter('amount', function(item){
    item.valor_venta = item.precio * item.cantidad;
    return item.valor_venta;
});

var vm = new Vue({
    el: '#main-content',
    data: {
        porcentaje_igv: 0.18,
        valor_igv: 0,
        subtotal: 0,
        total: 0,
        productos: [
            {
                id: 1,
                unidad: 'Toneladas',
                nombre: 'Producto 1',
                precio: 10.10
            },
            {
                id: 2,
                unidad: 'Toneladas',
                nombre: 'Producto 2',
                precio: 20.20
            },
            {
                id: 3,
                unidad: 'metros',
                nombre: 'Producto 3',
                precio: 30.30
            },
            {
                id: 4,
                unidad: 'kilos',
                nombre: 'Producto 4',
                precio: 40.40
            }
        ],
        items: []
    },
    methods: {
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
