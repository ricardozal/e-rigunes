@extends('web.template.main')

@push('scripts')
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('js/web/components/slick.js?v=1') }}"></script>

@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css">
@endpush
@section('content')
    {{--    {{Auth::check() ? Auth::user()->email : 'invitado'}}--}}

    {{--    @if(Auth::check())--}}
    {{--        <a href="{{route('ecommerce_account_profile_index')}}">mi cuenta</a>--}}
    {{--        <a href="{{route('logout')}}">salir</a>--}}
    {{--    @else--}}
    {{--        <a href="{{route('login')}}">entrar</a>--}}
    {{--    @endif--}}




    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
        </ol>

        <div class="carousel-inner">

            <div class="carousel-item active">
                <img class="d-block w-100 h-auto" src="{{asset('img/header_shoes.png')}}" alt="First slide">
                <div class="carousel-caption ">
                        <div class="row " style="padding-bottom: 7%;">
                            <div class="col-12 text-justify">
                                <h1 class="color-white "><b>ENVÍOS A TODO</b></h1>
                                <h1 class="color-white  px-md-5"><i class="fas fa-shipping-fast color-white h1"></i> <b>MÉXICO</b>
                                </h1>
                            </div>
                            <div class="col-12 text-justify">
                                <a href="" id="btn-home" class="btn btn-primary mt-5 mx-md-5 px-md-5" style="border-radius: 10px">CONOCE
                                    MÁS&nbsp;&nbsp;&nbsp;</a>

                            </div>
                        </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class=" mt-5 color-black"><b>Categorias</b></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 mx-auto ">
                <div class="responsive">
            @foreach($category as $cat)
                <div class=" col-md-3 mb-5">
                    <div class="card card-category border-0">
                        <div class="car-body">
                            <a href="{{route('category_products',['categoryId'=>$cat->id])}}">
                                <img src="{{asset('img/dama.png')}}" class="img-fluid">
                            </a>
                            <div class="col-12">
                                <p>{{$cat->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>




        <div class="row  align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class="font-family-2 color-gray-dark mt-5"><b>Lo más nuevo</b></h2>
                </div>
            </div>
        </div>

                <div class="row">
                    <div class="col-11 mx-auto">
                        <div class="responsive">
                            @include('web.components.card',['products'=>$products])
                        </div>
                    </div>

                </div>


        <div class="row  text-center">
            <div class="col-12">
                <button id="btn-contact-send"
                        class="btn btn-primary  text-bold color-white">
                    Ver más
                </button>
            </div>
        </div>

    <div class="row text-center">
        <div class="col-12 mb-5">
            <h2 class="color-gray-dark font-family-2"><b>Contacto</b></h2>
        </div>
    </div>
    </div>

    @include('web.components.contact')

@endsection
