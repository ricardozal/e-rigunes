@php
    $routeName= Route::current()->getName();
@endphp

<nav class="nav">
    <div class="row mb-3">
        <div class="col-12 text-center">
            <a href="{{route('admin_home')}}">
                <img src="{{asset('img/logos/rigunes_logo.png')}}" class="img-fluid">
            </a>
        </div>
    </div>

    <a class="nav-link {{$routeName == 'admin_user_index' ? 'active' : ''}}"
       href="{{route('admin_user_index')}}">
    <span>
        <i class="fas fa-user"></i>
    </span>
        <span class="sidebar-text">Usuarios</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_buyer_index' ? 'active' : ''}}"
       href="{{route('admin_buyer_index')}}">
    <span>
        <i class="fas fa-users"></i>
    </span>
        <span class="sidebar-text">Compradores</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_provider_index' ? 'active' : ''}}"
       href="{{route('admin_provider_index')}}">
    <span>
        <i class="fas fa-city"></i>
    </span>
        <span class="sidebar-text">Proveedores</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_category_index' ? 'active' : ''}}"
       href="{{route('admin_category_index')}}">
    <span>
        <i class="fas fa-book"></i>
    </span>
        <span class="sidebar-text">Categorias</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_products_index' ? 'active' : ''}}"
       href="{{route('admin_products_index')}}">
    <span>
        <i class="fas fa-luggage-cart"></i>
    </span>
        <span class="sidebar-text">Productos</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_purchase_index' ? 'active' : ''}}"
       href="{{route('admin_purchase_index')}}">
    <span>
        <i class="fas fa-shopping-cart"></i>
    </span>
        <span class="sidebar-text">Compras</span>
    </a>

    <a class="nav-link {{$routeName == 'admin_contactMessages_index' ? 'active' : ''}}"
       href="{{route('admin_contactMessages_index')}}">
    <span>
        <i class="fas fa-comment-dots"></i>
    </span>
        <span class="sidebar-text">Mensajes</span>
    </a>

    <a class="nav-link"
       href="{{route('logout')}}">
        <span>
            <i class="fas fa-sign-out-alt"></i>
        </span>
        <span class="sidebar-text">Cerrar sesión</span>
    </a>

</nav>
