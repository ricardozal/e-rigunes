@extends('web.template.main')
{{--@section('title',Auth::user()->name)--}}
@section('content')

    <div class="container-fluid" >

        <div class="row">
            <div class="col-12 col-lg-2  mt-3 mt-lg-0">
                @include('ecommerce.account.components.sidebar')
            </div>
            <div class="col-12 col-lg-10 text-center my-5">
                <h1><strong>Mi cuenta</strong></h1>
                <div class="card card-account m-lg-5">
                    <div class="card-body .card-sale">
                        @yield('content-account')
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
