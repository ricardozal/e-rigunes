@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="{{asset('commons/lib/zoomerang.js')}}"></script>
    <script src="{{asset('/js/web/product/details.js?v=2')}}"></script>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row my-5 mx-2 mx-lg-4">
                    <div class="col-12 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-12">
                                <img class="variant-image zoom" src="{{$product->variants[0]->featured_image}}" alt="img" style="max-width: 70%; height: auto">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-11 mx-auto">
                                <div class="images-slider slider">
                                    @forelse($product->variants[0]->variantImages as $image)
                                        <div class="cursor-pointer btn-thumbnail"
                                             data-url="{{$image->absolute_image_url}}">
                                            <div class="variant-thumbnail mx-auto"
                                                 style="background-image: url({{$image->absolute_image_url}}); background-size: contain;
                                                     background-repeat: no-repeat;
                                                     background-position: center center;
                                                     border: 1px solid lightgray;
                                                     border-radius: 16px;
                                                     height: 128px;
                                                     width: 128px;"></div>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="color-primary">{{$product->name}}</h1>
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
                        <div class="row my-4">
                            <div class="col-12">
                                <h5 class="color-secondary">Precio: {{'$'.number_format($product->public_price,2)}}</h5>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <h5>Cantidad</h5>
                                <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis cursor-pointer"></span>
                                        <input id="quantity" type="text" class="in-num" value="1" readonly="">
                                        <span class="plus cursor-pointer"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h5>Colores</h5>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="row colors-container">
                                    @foreach($product->colors as $color)
                                        <div class="col-2 text-center color-item cursor-pointer {{$product->variants[0]->color_name->id == $color->id ? 'selected-color' : ''}}" data-id="{{$color->id}}">
                                            <div class="mx-auto" style="background-color: {{$color->value}}; border: 1px solid gray; height: 20px; width: 20px; border-radius: 20px; margin: 0; padding: 0;"></div>
                                            <span>{{$color->name}}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12">
                                <h5>Tallas</h5>
                            </div>
                            <div class="col-12 size-container">
                                <div class="row size-list">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <button id="btn-add-variant" class="btn btn-primary">
                                    <i class="fas fa-cart-plus"></i>&nbsp;Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{route('web_load_sizes', ['productId' => $product->id, 'colorId' => 'FAKE_ID'])}}" id="inp-url-load-sizes">
    <input type="hidden" id="token" value="{{csrf_token()}}">
    <input type="hidden" id="inp-url-add-variant" value="{{route('web_add_variant')}}">
@endsection
