@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <div style="background-image: url({{$category->image_url}})"></div>
            </div>
            <div class=" col-12 col-md-6">
                <h1>{{$category->name}}</h1>
            </div>
        </div>



        <div class="row mx-1 my-5 justify-content-between">


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
                                    <img src="{{$product->first_variant->featured_image}}" style="height: 25vh;">
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-9">
                                ${{$product->first_variant->distributor_price}}
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
