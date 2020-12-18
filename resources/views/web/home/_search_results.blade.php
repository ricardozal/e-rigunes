<div class="row mx-0">
    @forelse($products as $product)
        <div class="col-12 col-sm-6 col-md-6 mb-4 col-lg-3 ">
            <div class="card border-0 card-category">
                <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                    <div
                        style="background-image: url('{{$product->variants[0]->featured_image}}');
                            height: 40vh;
                            width: 100%;
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center center ;">
                    </div>
                </a>
                <div class="row mx-0 align-items-center">
                    <div class="col-12">
                        <a class="w-100" style="text-decoration: none; color: black!important;"
                           href="">
                            <p class="mt-1  text-center text-bold ">
                                {{$product->name}}
                            </p>
                            <div class="row mx-0">
                                <div class="col-6 offset-3">
                                    <p class="my-0 text-center color-red ">
                                        ${{number_format($product->public_price,2)}}
                                    </p>
                                </div>
                                <div class="col-12 text-right mb-2">
                                    <a href="{{route('web_product_details',['productId'=>$product->id])}}">
                                        <img src="{{asset('img/icons/ic_car_gary.png')}}"
                                             style="height: 1.5rem;">
                                    </a>
                                </div>
                            </div>
                        </a>
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
