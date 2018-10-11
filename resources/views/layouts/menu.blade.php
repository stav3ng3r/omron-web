<li class="{{ Request::is('/') ? 'active' : '' }}">
    <a href="{!! route('dashboard') !!}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
</li>

<li class="treeview @if(in_array(Request::segment(1), [
        'users',
        'cnUsers',
    ])) active @endif">
    <a href="#">
        <i class="fa fa-key"></i> <span>Administrar Credenciales</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('users*') ? 'active' : '' }}">
            <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Usuarios</span></a>
        </li>

        <li class="{{ Request::is('roles*') ? 'active' : '' }}">
            <a href="{!! route('roles.index') !!}"><i class="fa fa-users"></i><span>Roles</span></a>
        </li>
    </ul>
</li>

<li class="treeview @if(in_array(Request::segment(1), [
        'clients',
        'clientContacts',
        'clientAddresses',
        'clientPaymentMethods'
    ])) active @endif">
    <a href="#">
        <i class="fa fa-briefcase"></i> <span>Administrar Clientes</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('clients*') ? 'active' : '' }}">
            <a href="{!! route('clients.index') !!}"><i class="fa fa-briefcase"></i><span>Clientes</span></a>
        </li>

        <li class="{{ Request::is('clientContacts*') ? 'active' : '' }}">
            <a href="{!! route('clientContacts.index') !!}"><i class="fa fa-phone"></i><span>Contactos</span></a>
        </li>

        <li class="{{ Request::is('clientAddresses*') ? 'active' : '' }}">
            <a href="{!! route('clientAddresses.index') !!}"><i class="fa fa-address-book"></i><span>Direcciones</span></a>
        </li>

        {{--<li class="{{ Request::is('clientPaymentMethods*') ? 'active' : '' }}">--}}
        {{--<a href="{!! route('clientPaymentMethods.index') !!}"><i--}}
        {{--class="fa fa-credit-card"></i><span>Metodos de Pago</span></a>--}}
        {{--</li>--}}

        <li class="{{ Request::is('paymentMethods*') ? 'active' : '' }}">
            <a href="{!! route('paymentMethods.index') !!}"><i class="fa fa-credit-card"></i><span>Formas de Pago</span></a>
        </li>
    </ul>
</li>

<li class="treeview @if(in_array(Request::segment(1), [
        'distributionCenters',
        'distributors',
        'distributorMarkups',
        'distributorMultipliers'
    ])) active @endif">
    <a href="#">
        <i class="fa fa-clipboard"></i> <span>Administrar Distribuidores</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('distributionCenters*') ? 'active' : '' }}">
            <a href="{!! route('distributionCenters.index') !!}"><i
                        class="fa fa-building"></i><span>Centros de Distribucion</span></a>
        </li>

        <li class="{{ Request::is('distributors*') ? 'active' : '' }}">
            <a href="{!! route('distributors.index') !!}"><i
                        class="fa fa-clipboard"></i><span>Distribuidores</span></a>
        </li>

        <li class="{{ Request::is('distributorMarkups*') ? 'active' : '' }}">
            <a href="{!! route('distributorMarkups.index') !!}"><i
                        class="fa fa-edit"></i><span>Markups</span></a>
        </li>

        <li class="{{ Request::is('distributorMultipliers*') ? 'active' : '' }}">
            <a href="{!! route('distributorMultipliers.index') !!}"><i
                        class="fa fa-percent"></i><span>Multiplicadores</span></a>
        </li>
    </ul>
</li>

<li class="treeview @if(in_array(Request::segment(1), [
        'countries',
        'cities',
        'currencies',
    ])) active @endif">
    <a href="#">
        <i class="fa fa-globe"></i> <span>Localizacion</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('countries*') ? 'active' : '' }}">
            <a href="{!! route('countries.index') !!}"><i class="fa fa-circle"></i><span>Paises</span></a>
        </li>

        <li class="{{ Request::is('cities*') ? 'active' : '' }}">
            <a href="{!! route('cities.index') !!}"><i class="fa fa-circle"></i><span>Ciudades</span></a>
        </li>

        <li class="{{ Request::is('currencies*') ? 'active' : '' }}">
            <a href="{!! route('currencies.index') !!}"><i class="fa fa-money"></i><span>Currencies</span></a>
        </li>

    </ul>
</li>

<li class="treeview @if(in_array(Request::segment(1), [
        'products',
        'productAccessories',
        'productCategories',
        'productDetails',
        'productImages',
        'productBrands',
        'productPromotions',
        'productTypes',
    ])) active @endif">
    <a href="#">
        <i class="fa fa-cubes"></i> <span>Administrar Productos</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
    <ul class="treeview-menu">
        <li class="{{ Request::is('products*') ? 'active' : '' }}">
            <a href="{!! route('products.index') !!}"><i class="fa fa-cube"></i><span>Productos</span></a>
        </li>

        <li class="{{ Request::is('productCategories*') ? 'active' : '' }}">
            <a href="{!! route('productCategories.index') !!}"><i class="fa fa-cubes"></i><span>Categorias</span></a>
        </li>

        <li class="{{ Request::is('productBrands*') ? 'active' : '' }}">
            <a href="{!! route('productBrands.index') !!}"><i class="fa fa-asterisk"></i><span>Marcas</span></a>
        </li>

        <li class="{{ Request::is('productPromotions*') ? 'active' : '' }}">
            <a href="{!! route('productPromotions.index') !!}"><i class="fa fa-percent"></i><span>Promociones</span></a>
        </li>

        <li class="{{ Request::is('productTypes*') ? 'active' : '' }}">
            <a href="{!! route('productTypes.index') !!}"><i class="fa fa-circle"></i><span>Tipos</span></a>
        </li>
    </ul>
</li>

<li class="{{ Request::is('people*') ? 'active' : '' }}">
    <a href="{!! route('people.index') !!}"><i class="fa fa-users"></i><span>Personas</span></a>
</li>

<li class="{{ Request::is('salesmen*') ? 'active' : '' }}">
    <a href="{!! route('salesmen.index') !!}"><i class="fa fa-star"></i><span>Vendedores</span></a>
</li>

<li class="{{ Request::is('regionalOffices*') ? 'active' : '' }}">
    <a href="{!! route('regionalOffices.index') !!}"><i class="fa fa-building"></i><span>Oficinas Regionales</span></a>
</li>

<li class="{{ Request::is('stockMovements*') ? 'active' : '' }}">
    <a href="{!! route('stockMovements.index') !!}"><i class="fa fa-arrows"></i><span>Movimientos de Stock</span></a>
</li>

<li class="{{ Request::is('stocks*') ? 'active' : '' }}">
    <a href="{!! route('stocks.index') !!}"><i class="fa fa-cubes"></i><span>Stock</span></a>
</li>

