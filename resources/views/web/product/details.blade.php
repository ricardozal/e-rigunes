@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <script src="{{asset('/js/web/product/details.js')}}"></script>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row my-5 mx-2 mx-lg-4">
                    <div class="col-12 col-lg-6 text-center">
                        <div class="row">
                            <div class="col-12">
                                <img class="variant-image" src="{{$product->first_variant->featured_image}}" alt="img" style="max-width: 70%; height: auto">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-11 mx-auto">
                                <div class="images-slider slider">
                                    @forelse($product->first_variant->variantImages as $image)
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
                                <h5 class="color-secondary">Precio público: {{$product->first_variant != null ? '$'.number_format($product->first_variant->public_price,2) : 'No disponible'}}</h5>
                                <h5 class="color-secondary">Precio distribuidor: {{$product->first_variant != null ? '$'.number_format($product->first_variant->distributor_price,2) : 'No disponible'}}</h5>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-12">
                                <span>Cantidad</span>
                                <div class="num-block skin-2">
                                    <div class="num-in">
                                        <span class="minus dis cursor-pointer"></span>
                                        <input type="text" class="in-num" value="1" readonly="">
                                        <span class="plus cursor-pointer"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
