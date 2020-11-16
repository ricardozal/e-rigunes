@php
    $routeName= Route::current()->getName();
@endphp

<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{route('admin_home')}}">
                    <img src="{{asset('img/logos/rigunes_logo.png')}}" class="img-fluid logo-rigunes" style="max-width: 100%">
                </a>
            </div>
            <div class="col" style="text-align: right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="navbarNavDropdown" style="margin-top: 10%">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_user_index' ? 'active' : ''}}"
                   href="{{route('admin_user_index')}}">
                    <span>
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="sidebar-text">Usuarios</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_buyer_index' ? 'active' : ''}}"
                   href="{{route('admin_buyer_index')}}">
                    <span>
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="sidebar-text">Compradores</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_provider_index' ? 'active' : ''}}"
                   href="{{route('admin_provider_index')}}">
                    <span>
                        <i class="fas fa-city"></i>
                    </span>
                    <span class="sidebar-text">Proveedores</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_category_index' ? 'active' : ''}}"
                   href="{{route('admin_category_index')}}">
                    <span>
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="sidebar-text">Categorias</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_products_index' ? 'active' : ''}}"
                   href="{{route('admin_products_index')}}">
                    <span>
                        <i class="fas fa-luggage-cart"></i>
                    </span>
                    <span class="sidebar-text">Productos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_purchase_index' ? 'active' : ''}}"
                   href="{{route('admin_purchase_index')}}">
                    <span>
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class="sidebar-text">Compras</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_contactMessages_index' ? 'active' : ''}}"
                   href="{{route('admin_contactMessages_index')}}">
                    <span>
                        <i class="fas fa-comment-dots"></i>
                    </span>
                    <span class="sidebar-text">Mensajes</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_sales_index' ? 'active' : ''}}"
                   href="{{route('admin_sales_index')}}">
                    <span>
                        <i class="fas fa-truck-loading"></i>
                    </span>
                    <span class="sidebar-text">Ventas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_promotion_index' ? 'active' : ''}}"
                   href="{{route('admin_promotion_index')}}">
                    <span>
                        <i class="fas fa-percentage"></i>
                    </span>
                    <span class="sidebar-text">Promociones</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_payment_method_index' ? 'active' : ''}}"
                   href="{{route('admin_payment_method_index')}}">
                    <span>
                        <i class="fas fa-money-check-alt"></i>
                    </span>
                    <span class="sidebar-text">Métodos de pago</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_refund_index' ? 'active' : ''}}"
                   href="{{route('admin_refund_index')}}">
                    <span>
                        <i class="fas fa-window-close"></i>
                    </span>
                    <span class="sidebar-text">Reembolsos</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{$routeName == 'admin_exchange_index' ? 'active' : ''}}"
                   href="{{route('admin_exchange_index')}}">
                    <span>
                        <i class="fas fa-sync-alt"></i>
                    </span>
                    <span class="sidebar-text">Cambio de productos</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
