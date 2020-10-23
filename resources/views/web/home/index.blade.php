@extends('web.template.main')

@push('css')


@endpush
@section('content')
    <div class="row mx-0 mb-3">
        <div class="col-12 d-flex align-items-center"
             style="background-image: url('{{asset('img/header_shoes.png')}}');
                 background-size: cover;
                 height: 27vw !important;
                 ">
            <div class="row px-5 mx-5">
                <div class="col-12 px-5 mx-5">

                    <p class="color-white h1"><b>ENVÍOS A TODO</b> </p>
                    <p class="color-white h1 text-right px-5"><i class="fas fa-shipping-fast color-white h1"></i> <b>MÉXICO</b></p>


                    <a href="" id="btn-home" class="btn btn-primary mt-5 mx-5 px-5" style="border-radius: 10px">CONOCE MÁS&nbsp;&nbsp;&nbsp;</a>
                </div>

            </div>
        </div>
    </div>

<div class="container-fluid">



<div class="row align-items-center">
    <div class="col-12 my-2">
        <div class="text-center">
            <h2 class="font-family-2 color-gray-dark mt-5">Categorias</h2>
        </div>
    </div>
</div>

    <div class="row">
        @foreach($category as $cat)
        <div class="col-12 col-md-3">
            <div class="card">
                <div class="car-body">
                    <a href="{{route('category_products',['categoryId'=>$cat->id])}}">
                    <img src="{{asset('img/dama.png')}}" class="img-fluid">
                    </a>
                    <div class="col-12">
                        <p>{{$cat->name}}</p>
                    </div>
                </div>

            </div>

        </div>
        @endforeach

    </div>




        <div class="row  align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class="font-family-2 color-gray-dark mt-5">Lo más nuevo</h2>
                </div>
            </div>
        </div>
        <div class="row mx-1 my-5 justify-content-between ">
            @include('web.components.card',['products'=>$products])
        </div>
        <div class="row  text-center">
            <div class="col-12">
                <button id="btn-contact-send"
                        class="btn btn-primary  text-bold color-white">
                    Ver más
                </button>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class="font-family-2 color-gray-dark mt-5">Categorias</h2>
                </div>
            </div>
        </div>

</div>
    @include('web.components.contact')

@endsection
