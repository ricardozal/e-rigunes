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
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="sidebar-text">Compradores</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
