@foreach($productcat as $product)
    <div class="col-md-6 col-lg-4">
        <div class="card card-category-shadow border-0">
            <div class="row">
                <div class="col-5">
                    <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                        <img src="{{$product->variants[0]->featured_image}}" class="img-fluid"></a>
                </div>
                <div class="col-7">
                    <div class="d-flex flex-column">
                        <span class="mt-2 mb-3 " style="color: #797D7F;">{{$product->name}}</span>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class=" color-black ">${{number_format($product->public_price,2)}}</span>
                            <div class="d-flex align-items-center">
                                @foreach($product->colors as $color)
                                    <div class="div-container-color--card m-1"
                                         style="background-color: {{$color->value}}"></div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
