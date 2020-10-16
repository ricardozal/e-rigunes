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
    <a class="nav-link {{$routeName == 'admin_buyer_index' ? 'active' : ''}}"
       href="{{route('admin_buyer_index')}}">
    <span>
        <i class="fas fa-user"></i>
    </span>
        <span class="sidebar-text">Compradores</span>
    </a>
    <a class="nav-link"
       href="{{route('logout')}}">
        <span>
            <i class="fas fa-sign-out-alt"></i>
        </span>
        <span class="sidebar-text">Cerrar sesión</span>
    </a>
</nav>
