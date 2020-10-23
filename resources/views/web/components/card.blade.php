@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@foreach($products as $product)
    <div class="card mb-3 border-0" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
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



