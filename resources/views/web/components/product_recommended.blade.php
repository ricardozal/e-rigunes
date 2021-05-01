@foreach($productcat as $product)
    <div class="col-md-6 col-lg-4 card-category">

        <div class="row ">

            <div class="col-5">
                <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                <img src="{{$product->variants[0]->featured_image}}" class="img-fluid">
                </a>
            </div>

            <div class="col-7">
                <p class="mt-1" style="color: #797D7F;">{{$product->name}}</p>
                <p class="my-0  color-black ">
                    ${{number_format($product->public_price,2)}}</p>
            </div>
        </div>

    </div>
@endforeach
