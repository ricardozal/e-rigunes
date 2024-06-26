@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>

    <script src="{{asset('/js/web/product/details.js?v=3')}}"></script>
    <script src="{{ asset('js/web/components/_product-carousel.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-10 mx-auto p-0  mt-5 card-details">
                <div class="row my-3 mx-2 mx-lg-4">
                    <div class="col-12 col-lg-5 text-center">
                        <div class="row main-image-container">
                            <div class="col-11">
                                <div class="variant-image square-image" style="background-image: url({{$product->variants[0]->featured_image}});"></div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-11 mx-auto">
                                <div class="images-slider slider">
                                    <div class="fa-3x">
                                        <i class="fas fa-circle-notch fa-spin"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <h3 class="color-primary">{{$product->name}}</h3>
                                <p class="color-gray text-justify">{{$product->description}}</p>
                                <p class="color-gray">
                                    <i class="{{($product->rating_average >= 1) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                                    <i class="{{($product->rating_average >= 2) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                                    <i class="{{($product->rating_average >= 3) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                                    <i class="{{($product->rating_average >= 4) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                                    <i class="{{($product->rating_average == 5) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                                    <span>{{$product->rating_average}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5 class="color-primary">Precio: {{'$'.number_format($product->public_price,2)}}</h5>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5>Cantidad</h5>
                                <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis cursor-pointer"></span>
                                        <input id="quantity" type="text" class="in-num" value="1" readonly="">
                                        <span class="plus cursor-pointer"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-8">

                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="color-black">Colores</h5>
                                    </div>
                                    <div class="col-12 mb-4">
                                        <div class="row colors-container">
                                            @foreach($product->colors as $color)
                                                <div class="col-5 col-sm-3 text-center color-item cursor-pointer {{$product->variants[0]->color_name->id == $color->id ? 'selected-color' : ''}}" data-id="{{$color->id}}">
                                                    <div class="mx-auto" style="background-color: {{$color->value}}; border: 1px solid gray; height: 20px; width: 20px; border-radius: 20px; margin: 0; padding: 0;"></div>
                                                    <span>{{$color->name}}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <h5 class="color-black">Tallas</h5>
                            </div>
                            <div class="col-12 size-container">
                                <div class="row size-list">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center mb-3">
                        <button id="btn-add-variant" type="button" class="btn btn-outline-secondary color-black p-3" style="border-radius: 0; ">AGREGAR AL CARRITO</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <h2 class="color-primary">PRODUCTOS SUGERIDOS</h2>
        </div>
    </div>
    <div class="row mx-0 mt-4">
        <div class="col-10 mx-auto">
            <div class="owl-carousel owl-products owl-theme pb-5  ">
                @foreach($products as $product)
            @include('web.components.card')
                @endforeach
            </div>

        </div>
    </div>

    <input type="hidden" value="{{route('web_load_sizes', ['productId' => $product->id, 'colorId' => 'FAKE_ID'])}}" id="inp-url-load-sizes">
    <input type="hidden" id="token" value="{{csrf_token()}}">
    <input type="hidden" id="inp-url-add-variant" value="{{route('web_add_variant')}}">
@endsection
