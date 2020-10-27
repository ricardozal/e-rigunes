<div class="row justify-content-between container-fluid mx-0" style="background-color: #B51F6B;">
    <div class="col-4 my-2 h2 text-center">
        <a class="text-center mx-2" href="https://www.instagram.com/rigunes.mx/"
           target="_blank">
            <i class="fab fa-instagram color-white d-none d-md-inline" style="height: 5vw;"></i></a>
        <a class="text-center mx-2 " href="https://www.facebook.com/Rigunes" target="_blank">
            <i class="fab fa-facebook-f color-white d-none d-md-inline"></i>
        </a>
    </div>
    <div class="col-4 my-2 d-flex justify-content-end h2">
        <i class="fas fa-search color-white"></i>
        <img class="ml-3 mr-3 color-white" src="{{asset('img/ic_line.png')}}" style="max-height: 5vh!important">
        <a class="mx-3 text-center "
           href="{{route('ecommerce_account_profile_index')}}"
           id=""
           role=""
           data-toggle="">
            <i class="far fa-user color-white"></i>

        </a>
        <i class="fas fa-shopping-bag color-white mr-4"></i>
    </div>
</div>


<div class="row mx-0">
    <a class="mx-auto my-3" href="{{route('web_home')}}"><img src="{{asset('img/logos/rigunes_logo_pink.png')}}"
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
                    {{--                    @foreach($category as $cat)--}}
                    <a class="nav-link active-principal-2 dropdown-sub-classification color-gray-dark font-size-80 font-family-2 dropdown-item"
                       href=""
                       style=" padding: .25rem 1.5rem;"
                       data-parent-classification="">
                        {{--                            {{$cat->name}}--}}
                        {{--                            <div style="background-image: url({{$cat->image_url}})"></div>--}}
                    </a>

                    {{--                    @endforeach--}}
                </div>
            </li>
            <li class="nav-item mx-5">
                <a class="nav-link" href="#">CATÁLOGOS</a>
            </li>

            <li class="nav-item mx-5">
                <a class="nav-link " href="#">NOSOTROS</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('contact_section')}}">CONTACTO</a>
            </li>
        </ul>
    </div>
</nav>

