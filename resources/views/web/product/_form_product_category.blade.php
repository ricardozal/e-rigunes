<div class="row mx-0">

    @forelse($products as $prod)
        <div class="col-12 col-sm-6 col-md-6 mb-4 col-lg-3 ">
            <div class="card border-0 card-category">

                <img src="url({{$prod->variants[0]->featured_image}})" >
                <a href="{{route('web_product_details',['productId'=>$prod->id])}}">
                    <div
                        style="background-image: url('{{$prod->variants[0]->featured_image}}');
                            height: 40vh;
                            width: 100%;
                            background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center center ;">
                    </div>
                </a>
                <div class="row align-items-center">
                    <div class="col-12">
                        <p
                            class="mt-1  text-center text-bold ">
                            {{$prod->name}}
                        </p>
                        <div class="row mx-0">
                            <div class="col-6 offset-3">
                                <p class="my-0 text-center color-red ">
                                    ${{number_format($prod->public_price,2)}}
                                </p>
                            </div>
                            <div class="col-12 text-right mb-2">
                                <a href="{{route('web_product_details',['productId'=>$prod->id])}}">
                                    <img src="{{asset('img/icons/ic_car_gary.png')}}"
                                         style="height: 1.5rem;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <h2>Sin resultados</h2>
    @endforelse
</div>
