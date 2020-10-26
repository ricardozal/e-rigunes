@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@foreach($products as $product)
    <div class="card card-sale mb-3 mx-2 border-0" >
        <div class="card-body">
            <div class="row">
                <div class="col-12 ">
                    <p>{{$product->name}}</p>
                </div>

            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                        <img src="{{$product->first_variant->featured_image}}" class="img-fluid" >
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



