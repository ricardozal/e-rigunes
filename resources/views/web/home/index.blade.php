@extends('web.template.main')

@push('css')


@endpush
@section('content')
{{--    {{Auth::check() ? Auth::user()->email : 'invitado'}}--}}

{{--    @if(Auth::check())--}}
{{--        <a href="{{route('ecommerce_account_profile_index')}}">mi cuenta</a>--}}
{{--        <a href="{{route('logout')}}">salir</a>--}}
{{--    @else--}}
{{--        <a href="{{route('login')}}">entrar</a>--}}
{{--    @endif--}}
    <div class="row mx-0 mb-3">
        <div class="col-12 d-flex align-items-center"
             style="background-image: url('{{asset('img/header_shoes.png')}}');
                 background-repeat: no-repeat;
                 background-size: cover;
                 height: 27vw !important;
                 ">
            <a href="#contenido" id="btn-home" class="btn btn-primary mt-5 ml-md-5 px-3" style="border-radius: 10px">CONOCE MÁS&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a>
        </div>
    </div>

    <div class="container-fluid ">





        <div class="row  align-items-center">
            <div class="col-12 my-2">
                <div class="text-center">
                    <h2 class="font-family-2 color-gray-dark mt-5">Lo más nuevo</h2>
                </div>
            </div>
        </div>
        <div class="row mx-md-5 my-5 justify-content-between">
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
                    <h2 class="font-family-2 color-gray-dark mt-5">Botas otoño invierno</h2>
                </div>
            </div>
        </div>
    </div>

    @include('web.components.contact')

@endsection
