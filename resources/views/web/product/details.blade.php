@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@section('content')
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row my-5 mx-2 mx-lg-4">
                    <div class="col-12 col-lg-6">

                    </div>
                    <div class="col-12 col-lg-6">
                        <h1 class="color-primary">{{$product->name}}</h1>
                        <p class="color-gray">
                            <i class="{{($product->rating_average >= 1) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                            <i class="{{($product->rating_average >= 2) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                            <i class="{{($product->rating_average >= 3) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                            <i class="{{($product->rating_average >= 4) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                            <i class="{{($product->rating_average == 5) ? 'fas' : 'far'}} fa-star fa-lg color-yellow"></i>
                            <span>{{$product->rating_average}}</span>
                        </p>
                        <h5 class="color-secondary">Precio público: ${{$product->first_variant != null ? '$'.number_format($product->first_variant->public_price,2) : 'No disponible'}}</h5>
                        <h5 class="color-secondary">Precio distribuidor: ${{$product->first_variant != null ? '$'.number_format($product->first_variant->distributor_price,2) : 'No disponible'}}</h5>
                        <div class="num-block skin-2">
                            <div class="num-in">
                                <span class="minus dis"></span>
                                <input type="text" class="in-num" value="1" readonly="">
                                <span class="plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
