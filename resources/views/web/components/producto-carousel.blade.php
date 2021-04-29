@php
    /* @var $product Product*/use App\Models\Product;
@endphp
@push('scripts')
    <script src="{{ asset('js/web/components/_product-carousel.js') }}"></script>
@endpush
<div class="owl-carousel owl-products owl-theme ">
@foreach($products as $product)
    <div class="card border-0 card-category mb-3 ml-3 mr-3">
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
@endforeach
</div>
