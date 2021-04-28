@php
    /* @var $products Product*/use App\Models\Product;
@endphp
@extends('web.template.main')
@section('content')
    <div class="container-fluid">

        <div class="row my-3">
            <div class=" col-12 text-center my-4">
                <h1 style="color: #5cb090;">{{$category->name}}</h1>
            </div>
        </div>

        <div class="row mx-0">
            <div class="col-10 mx-auto">
                <div class="row ">
                    @include('web.components.card',['products' => $products])
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-10 mx-auto ">
                <h4 style="color: #5cb090;">Productos recomendados</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-10 mx-auto">
                <div class="row">
                    @for($i=0; $i<3; $i++)
                        <div class="col-4"><hr></div>
                    @endfor
                    @include('web.components.product_recommended',['productcat' => $productcat])
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection
