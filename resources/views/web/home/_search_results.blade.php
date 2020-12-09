<div class="col-12 d-flex flex-wrap justify-content-center">
    @forelse($products as $product)
        <div class="card card-sale mb-3 mx-2 border-0" style="width: 20rem">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 ">
                        <p>{{$product->name}}</p>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                            <img src="{{$product->variants[0]->featured_image}}" class="img-fluid">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-9">
                        ${{number_format($product->public_price,2)}}
                    </div>
                    <div class="col-3">
                        <i class="fas fa-shopping-bag color-primary h3"></i>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Sin resultados</h2>
    @endforelse
</div>
<div class="col-12 d-flex justify-content-center">
    {{ $products->links() }}
</div>
