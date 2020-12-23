@extends('web.template.main')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="color-red">NOSOTROS</h2>
            </div>
            <div class="col-12 text-center">
                <h3 class="color-green mb-5">Somos una empresa 100% mexicana que distribuye
                    <br>
                    calzado a todo el territorio nacional.
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 text-center">
                <img src="{{asset('img/icons/bandera-mexicana.png')}}" class="img-fluid" alt="imagen">
                <h5 class="text-dark mb-3 mt-4 font-weight-medium">
                    Calzado mexicano
                </h5>
                <p class="text-justify">
                    Nuestro calzado es un producto de calidad elaborado en la tierra del calzado San Mateo Atenco.
                </p>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="{{asset('img/icons/distribuidor.png')}}" class="img-fluid" alt="imagen">
                <h5 class="text-dark mb-3 mt-4 font-weight-medium">
                    Excelente precio
                </h5>
                <p class="text-justify">
                    Al ser un distribuidor de nuestro calzado obtendrás un descuento
                    de mayorista, para que ofrezcas nuestro calzado al precio que desees.
                </p>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img src="{{asset('img/icons/proteger.png')}}" class="img-fluid" alt="imagen">
                <h5 class="text-dark mb-3 mt-4 font-weight-medium">
                    Compra 100% segura
                </h5>
                <p class="text-justify">
                    Contamos con un servicio que nos permite enviarte nuestro producto
                    con toda la seguridad y confianza para que llegue hasta tu domicilio.
                </p>
            </div>
            <div class="col-12 text-center">
                <img src="{{asset('img/icons/family.png')}}" class="img-fluid" alt="imagen">
                <h5 class="text-dark mb-3 mt-4 font-weight-medium">
                    Variedad de modelos
                </h5>
                <p class="text-justify">
                    Contamos con modelos de calzado para toda la familia
                    descrubelos navegando por nuestras categorias para
                    caballero, dama, y niños.
                </p>
            </div>
        </div>
    </div>

@endsection
