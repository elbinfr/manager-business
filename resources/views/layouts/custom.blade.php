<template id="select-product-tpl">
    <select v-model="item.id" @change="seleccionarProducto" class="form-control">
        <option value="">Seleccione un producto</option>
        <option v-for="producto in productos" :value="producto.id">
            @{{ producto.nombre }}
        </option>
    </select>
</template>