@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@foreach($products as $product)
    <div class="col-12 col-sm-6 col-md-6 mb-4 col-lg-3 d-flex">
        <div class="card border-0 card-category">
            <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                <img src="{{$product->variants[0]->featured_image}}" class="img-fluid"></a>
            <div class="card-body p-1 mb-2">
                <div class="row mx-0">
                    <div class="col-12">
                        <p class="mt-1 " style="color: #797D7F;">{{$product->name}}</p>
                        <p class="my-0 color-black ">${{number_format($product->public_price,2)}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach


