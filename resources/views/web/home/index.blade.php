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
    {{--        {{Auth::check() ? Auth::user()->email : 'invitado'}}--}}

    {{--        @if(Auth::check())--}}
    {{--            <a href="{{route('ecommerce_account_profile_index')}}">mi cuenta</a>--}}
    {{--            <a href="{{route('logout')}}">salir</a>--}}
    {{--        @else--}}
    {{--            <a href="{{route('login')}}">entrar</a>--}}
    {{--        @endif--}}
    <div class="container-fluid">
    <div class="row">
        <div class="col-12 text-center ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block " src="{{asset('img/header_shoes.png')}}" alt="First slide" style="    height: 66vh;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block 0" src="{{asset('img/header_shoes.png')}}" alt="Second slide"style="    height: 66vh;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block " src="{{asset('img/header_shoes.png')}}" alt="Third slide"style="    height: 66vh;">
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


        </div>


    </div>


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


        <div class="row my-5">
            <div class="col-12  text-center">
                <h2>Conviertete en un distribuidor</h2>
            </div>
        </div>
        <div class="row mx-5 px-5">
            <div class="col-6 col-md-4 text-center">

                <i class="fas fa-shoe-prints color-green h1"></i>
                <h6 class="text-center pt-3">Variedad en modelos</h6>
            </div>

            <div class="col-6 col-md-4 text-center">
                <i class="fas fa-hand-holding-usd color-green h1" ></i>
                <h6 class="text-center pt-2">Precios accesibles </h6>
            </div>
            <div class="col-6 col-md-4 text-center">
                <i class="fas fa-balance-scale color-green h1"></i>
                <h6 class="text-center pt-4">La inversión que <br>no pierde valor</h6>
            </div>
            <div class="col-12 text-center mb-5">
                <button class="btn btn-primary">Ver más</button>
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
