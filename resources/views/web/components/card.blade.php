@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@foreach($products as $product)
    <div class="card mb-3 border-0" style="-webkit-box-shadow: 2px 4px 5px -4px rgba(0,0,0,0.57);
    -moz-box-shadow: 2px 4px 5px -4px rgba(0,0,0,0.57);
    box-shadow: 2px 4px 5px -4px rgba(0,0,0,0.57);
    border-radius: 12px;">
        <div class="card-body">
            <div class="row">
                <div class="col-10">
                    <p>{{$product->name}}</p>
                </div>
                <div class="col-2 ">
                    <i class="fas fa-heart"></i>
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



