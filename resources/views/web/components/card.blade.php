@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@foreach($products as $product)

    <div class="card border-0 card-category mx-1 mb-3">
        <a href="{{route('web_product_details',['productId'=>$product->id])}}">
            <div
                style="background-image: url('{{$product->variants[0]->featured_image}}');
                    height: 40vh;
                    width: 100%;
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-position: center center ;">
            </div>
        </a>
        <div class="row align-items-center">
            <div class="col-12">
                <p class="mt-1 text-center ">
                    {{$product->name}}
                </p>
                <div class="row mx-0">
                    <div class="col-12 text-center">
                        <p class="my-0 text-center color-red ">
                            ${{number_format($product->public_price,2)}}
                        </p>
                    </div>
                    <div class="col-12 offset-10 mb-2">
                        <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                            <img src="{{asset('img/icons/ic_car_gary.png')}}"
                                 style="height: 1.5rem;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach



