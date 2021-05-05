@php
    /* @var $product Product*/use App\Models\Product;
@endphp
<div class="position-relative show-div-sale show-div-new">
    <div class="card border-0 card-category card-category-shadow mb-3 mt-3">
    <div class="position-relative">
        <a href="{{route('web_product_details',['productId'=>$product->id])}}">
            <img src="{{$product->variants[0]->featured_image}}" class="img-fluid"></a>
        <div class="div-absolute-container-icons px-2 py-1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="far fa-heart text-gray-light text-sm pl-2"></i>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <span class="text-gray-light">COMPRAR</span>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-share-alt text-gray-light text-sm pr-2"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body p-1 mb-2">
        <div class="row mx-0">
            <div class="col-12">
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
<div class="div-absolute-container-sale p-1 d-flex justify-content-center align-items-center">
    <span class="text-white text-exsm">Oferta</span>
</div>
<div class="div-absolute-container-new p-1 d-flex justify-content-center align-items-center">
    <span class="text-white text-exsm">Nuevo</span>
</div>
</div>
