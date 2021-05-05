@php
    /* @var $products Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-10 mx-auto text-center mt-3"><h2 style="color: #5cb090;">{{$category->name}}</h2></div>
        </div>
        <div class="row mt-3">
            <div class="col-10 mx-auto  ">
                @include('web.components.carousel_category', [
                  'categorys' => $categorys])
            </div>
        </div>
        <div class="row justify-content-center my-2">
            <div class="d-none d-lg-block col-lg-3  ">
                <div class="card card-details">
                    <img src="{{$category->image_url}}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-10 mx-auto">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-12 col-sm-6 col-md-3 mb-4 ">
                    @include('web.components.card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-10 mx-auto my-3 mb-4">
                <div class="row">
                    <div class="col-4 d-none d-md-block">
                        <hr>
                    </div>
                    <div class="col-12 col-md-4 text-center mb-5">
                        <h5 class="color-primary">PRODUCTOS SUGERIDOS</h5>
                    </div>
                    <div class="col-4 d-none d-md-block">
                        <hr>
                    </div>
                    @include('web.components.product_recommended'
                                ,['productcat' => $productcat])
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
