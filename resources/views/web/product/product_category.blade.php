@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@section('content')

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12 col-md-6 text-center">
                <img src="{{asset('img/trabajo.jpg')}}" class="rounded-pill" style="height: auto; max-width: 30%">
{{--                <div style="background-image: url({{$category->image_url}})"></div>--}}
            </div>
            <div class=" col-12 col-md-6 my-auto">
                <h1>{{$category->name}}</h1>


            </div>
        </div>



        <div class="row mx-1 my-5 justify-content-around">


            @foreach($products as $product)

                <div class="card card-sale mb-3 border-0" >
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p>{{$product->name}}</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 text-center mb-2">
                                <a href="{{route('web_product_details',['productId'=>$product->id])}}">
{{--                                    <img src="{{$product->first_variant->featured_image}}" style="height: 25vh;">--}}
                                    <img src="{{$product->variants[0]->featured_image}}" style="height: 25vh;">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                ${{number_format($product->distributor_price,2)}}
                            </div>
                            <div class="col-3">
                                <i class="fas fa-shopping-bag color-primary h3"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>




@endsection
