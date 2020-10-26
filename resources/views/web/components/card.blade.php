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



