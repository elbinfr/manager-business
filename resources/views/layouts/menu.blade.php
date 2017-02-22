<li class="active">
    <a href="#" class="btn-menu">
        <i class="fa fa-tachometer"></i><span>Dashboard</span>
    </a>
</li>
<li>
    <a href="{{ url('/admin/configuraciones') }}" class="btn-menu" data-menu="Configuraciones" data-submenu="">
        <i class="fa fa-cogs"></i><span>Configuraci&oacute;n</span>
    </a>
</li>
<li>
    <a href="#"><i class="fa fa-list"></i><span>Datos</span></a>
    <ul class="sub-menu">
        <li>
            <a href="{{ url('/admin/clientes') }}" class="btn-menu" data-menu="Datos" data-submenu="Clientes">
                Clientes
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/empleados') }}" class="btn-menu" data-menu="Datos" data-submenu="Empleados">
                Empleados
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/productos') }}" class="btn-menu" data-menu="Datos" data-submenu="Productos">
                Productos
            </a>
        </li>
        <li>
            <a href="{{ url('/admin/unidades') }}" class="btn-menu" data-menu="Datos" data-submenu="Unidades de Medida">
                Unidades de Medida
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-truck"></i><span>Log&iacute;stica</span></a>
    <ul class="sub-menu">
        <li>
            <a href="#" class="btn-menu">Compras</a>
        </li>
        <li>
            <a href="{{ url('/admin/ventas') }}" class="btn-menu" data-menu="Logística" data-submenu="Ventas">
                Ventas
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#"><i class="fa fa-money"></i><span>Tesorer&iacute;a</span></a>
    <ul class="sub-menu">
        <li>
            <a href="#" class="btn-menu">Pagos de Clientes</a>
        </li>
        <li>
            <a href="#" class="btn-menu">Pagos a Proveedores</a>
        </li>
    </ul>
</li>