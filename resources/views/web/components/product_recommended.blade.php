@foreach($productcat as $prod)
    <div class="col-md-6 col-lg-4 ">
        <div class="row">
            <div class="col-5">
                <img src="{{$prod->variants[0]->featured_image}}" class="img-fluid">
            </div>
            <div class="col-7">
                <p class="mt-1" style="color: #797D7F;">{{$prod->name}}</p>
                <p class="my-0  color-black ">
                    ${{number_format($prod->public_price,2)}}</p>
            </div>
        </div>
    </div>
@endforeach
