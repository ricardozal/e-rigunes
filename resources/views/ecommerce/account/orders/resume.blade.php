@php
    /* @var $order Sale*/use App\Models\Sale;
@endphp
@extends('web.template.main')
@section('title','Orden '.$order->id)
@section('content')

    <div class="container-fluid p-0 bg-primary-light">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="row my-3 mr-lg-3 mx-1 ml-lg-5">
                    <div class="col-12 col-lg-8">
                        <div class="card border-radius">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="text-thin color-primary"><i class="fas fa-user"></i>&nbsp;Información del pedido</h3>
                                    </div>
                                    @include('ecommerce.account.orders._details',['order' => $order])
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-3 mt-lg-0">
                        <div class="card border-radius">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="text-thin color-secondary">Productos similares</h5>
                                    </div>
                                    <div class="col-12 d-flex flex-wrap justify-content-center">
                                        @forelse(\App\Models\Sale::similarProducts($order->id) as $variant)
                                            <div class="card card-sale mb-3 mx-2 border-0" >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-12 ">
                                                            <p>{{$variant->product->name}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 text-center mb-2">
                                                            <a href="{{route('web_product_details',['productId'=>$variant->product->id])}}">
                                                                <img src="{{$variant->product->variants[0]->featured_image}}" class="img-fluid">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-9">
                                                            ${{number_format($variant->product->distributor_price,2)}}
                                                        </div>
                                                        <div class="col-3">
                                                            <i class="fas fa-shopping-bag color-primary h3"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center mx-2">
                                                <span class="text-semi-bold color-secondary">No hay productos similares</span>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
