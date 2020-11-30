@extends('web.template.main')
@section('title','Carrito de compras')
@section('content')
    <div class="container-fluid p-0 bg-primary-light">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div id="pop-cart"></div>
            </div>
        </div>
    </div>

    <input id="inp-shopping-cart" type="hidden" value="true">
@endsection
