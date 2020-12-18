<div class="row justify-content-between container-fluid mx-0" style="background-color: #B51F6B;">
    <div class="col-4 my-2 h2 text-center">
        <a class="text-center mx-2" href="https://www.instagram.com/rigunes.mx/"
           >
            <i class="fab fa-instagram color-white d-none d-md-inline" style="height: 5vw;"></i></a>
        <a class="text-center mx-2 " href="https://www.facebook.com/Rigunes" >
            <i class="fab fa-facebook-f color-white d-none d-md-inline"></i>
        </a>
    </div>
    <div class="col-4 my-2 d-flex justify-content-end h2">
        <a href="{{route('search_products')}}"><i class="fas fa-search color-white"></i></a>
        <img class="ml-3 mr-3 color-white" src="{{asset('img/ic_line.png')}}" style="max-height: 5vh!important">
        <a class="mx-3 text-center {{ Auth::check() ? '' : '' }}"
           href=" {{ Auth::check() ? '#' : route('login') }}"
           id="{{Auth::check() ? 'userDropdown' : ''}}"
           role="{{Auth::check() ? 'button' : ''}}"
           data-toggle="{{Auth::check() ? 'dropdown' : ''}}">
            <i class="far fa-user color-white"></i>
            @if(Auth::check())
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="{{route('ecommerce_account_profile_index')}}"><i
                            class="far fa-user color-green"></i> Mi cuenta</a>
                    <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-sign-out-alt color-red"></i>
                        Cerrar sesión</a>
                </div>
            @endif

        </a>
        <a href="#" class="mr-4 btn-cart"><i class="fas fa-shopping-bag color-white"></i></a>
    </div>
</div>


<div class="row mx-0">
    <a class="mx-auto my-3" href="{{route('web_home')}}">
        <img src="{{asset('img/logos/rigunes_logo_pink.png')}}"
             style="height: 12vh!important;"
             class="mx-auto mb-2"></a>
</div>


<nav class="navbar navbar-expand-lg navbar-light  ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item ">
                <a class="nav-link" href="{{route('web_home')}}">HOME <span class="sr-only"></span></a>
            </li>
            <li class="nav-item dropdown mx-5">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    CATEGORÍAS
                </a>
                <div class="dropdown-menu" aria-labelledby="drop-down">

                        <a class="nav-link active-principal-2 dropdown-sub-classification color-gray-dark font-size-80 font-family-2 dropdown-item"
                           href=""
                           style=" padding: .25rem 1.5rem;"
                           data-parent-classification="">


                        </a>


                </div>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link" href="#">CATÁLOGOS</a>
            </li>

            <li class="nav-item mx-5">
                <a class="nav-link " href="{{route('ours_section')}}">NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('contact_section')}}">CONTACTO</a>
            </li>
        </ul>
    </div>
</nav>

<div id="shopping-popover" class="shopping-cart-popover" style="display: none">
    <div class="row">
        <div class="col-md-12">
            <div id="">
            </div>
        </div>
    </div>
</div>

