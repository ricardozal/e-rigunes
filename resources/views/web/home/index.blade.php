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



    <div class="container-fluid">
        <div class="row  justify-content-center">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block " src="{{asset('img/carousels/carousel1.png')}}" alt="First slide" style="
                         height: 38vw;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block " src="{{asset('img/carousels/Rigunes.png')}}" alt="First slide" style="
                         height: 38vw;">
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

        <div class="row align-items-center">
            <div class="col-12 my-5">
                <div class="text-center">
                    <h1 class=" color-red">CATEGORIAS</h1>
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
                                        <img src="{{$cat->image_url}}" class="img-fluid" style="object-fit: cover">

                                    <div class="col-12 text-center">
                                        <p>{{$cat->name}}</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mb-3 mx-0">
            <div class="col-12 d-flex align-items-center"
                 style="background-image: url('{{asset('img/header_shoes.png')}}');
                     background-repeat: no-repeat;
                     background-size: cover;
                     height: 27vw !important;
                     ">
                &nbsp;&nbsp;
            </div>
        </div>
        <div class="row  align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class="font-family-2 color-red mt-5">LO MÁS NUEVO</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-11 mx-auto mb-5">
                <div class="responsive">
                    @include('web.components.card',['products'=>$products])
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12  text-center">
                <h1 class="color-red">CONVIERTETE EN UN DISTRIBUIDOR</h1>
            </div>
        </div>
        <div class="row mx-5 px-5">
            <div class="col-6col col-md-4 text-center">

                <i class="fas fa-shoe-prints color-green h1"></i>
                <h6 class="text-center pt-2">Variedad en modelos</h6>
            </div>

            <div class="col-6 col-md-4 text-center">
                <i class="fas fa-hand-holding-usd color-green h1"></i>
                <h6 class="text-center pt-2">Precios accesibles </h6>
            </div>
            <div class="col-6 col-md-4 text-center">
                <i class="fas fa-shipping-fast h1 color-green"></i>
                <h6 class="text-center pt-2">Envió a toda la republica</h6>
            </div>

            <div class="col-12 mt-3 text-center ">
                <a href="{{route('web_user_create')}}" class="btn btn-primary">Registrate</a>

            </div>

        </div>
        <div class="row mx-5">
            <div class="col-12 p-5">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block " src="{{asset('img/carousels/carousel1.png')}}" alt="First slide"
                                 style="     background-repeat: no-repeat;
                         background-size: cover;
                         height: 38vw;
                           ">
                        </div>

                        <div class="carousel-item">
                            <img class="d-block " src="{{asset('img/carousels/Rigunes.png')}}" alt="First slide" style="
                         height: 38vw;">
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


        <div class="row">
            <div class="col-12 text-center my-5">
                <h1 class="color-red">NUESTROS PRODUCTOS </h1>
            </div>
        </div>
        <div class="row mx-0">
            @foreach($product as $prod)
                <div class="col-12 col-sm-6 col-md-6 mb-4 col-lg-3 ">
                    <div class="card border-0 card-category">
                        <a href="{{route('web_product_details',['productId'=>$prod->id])}}">
                            <div
                                style="background-image: url('{{$prod->variants[0]->featured_image}}');
                                    height: 40vh;
                                    width: 100%;
                                    background-size: cover;
                                    background-repeat: no-repeat;
                                    background-position: center center ;">
                            </div>
                        </a>
                        <div class="row align-items-center">
                            <div class="col-12">
                                <a class="w-100" style="text-decoration: none; color: black!important;"
                                   href="">
                                    <p class="mt-1  text-center text-bold ">
                                        {{$prod->name}}
                                    </p>
                                    <div class="row mx-0">
                                        <div class="col-6 offset-3">
                                            <p class="my-0 text-center color-red ">
                                                ${{number_format($prod->distributor_price,2)}}
                                            </p>
                                        </div>
                                        <div class="col-12 text-right mb-2">
                                            <a href="{{route('web_product_details',['productId'=>$prod->id])}}">
                                                <img src="{{asset('img/icons/ic_car_gary.png')}}"
                                                     style="height: 1.5rem;">
                                            </a>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="row text-center">
            <div class="col-12 mb-2 mt-5">
                <h2 class="color-gray ">Contacto</h2>
            </div>
        </div>

        @include('web.components.contact')
    </div>
@endsection
