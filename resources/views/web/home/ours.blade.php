@extends('web.template.main')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2>NOSOTROS</h2>
            </div>
            <div class="col-12 text-center">

                <h3 class="font-weight-medium text-dark mb-5">Somos una empresa 100% mexicana que distribuye
                    <br>
                    calzado a todo el territorio nacional.
                </h3>
            </div>
        </div>
        <div class="row" data-aos="fade-up">

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/bandera-mexicana.png')}}" alt="mexflag" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Calzado mexicano
                    </h6>
                    <p>
                        Nuestro calzado es un producto de calidad elaborado en la tierra
                        <br>
                        del calzado San Mateo Atenco
                    </p>
                </div>
            </div>

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/distribuidor.png')}}" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Excelente precio
                    </h6>
                    <p>
                        Al ser un distribuidor de nuestro calzado obtendrás un descuento
                        <br>
                        de mayorista, para que ofrezcas nuestro calzado al precio que desees.
                    </p>
                </div>
            </div>

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/proteger.png')}}" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Compra 100% segura
                    </h6>
                    <p>
                        Contamos con un servicio que nos permite enviarte nuestro producto
                        <br>
                        con toda la seguridad y confianza para que llegue hasta tu domicilio.
                    </p>
                </div>
            </div>

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/cambio.png')}}" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Cambio de productos
                    </h6>
                    <p>
                        Te ofrecemos la oportunidad de realizar cambio de modelos, colores y tallas.
                        <br>
                        Entérate de los pasos a seguir y de las exclusiones en el siguiente enlace.
                    </p>
                </div>
            </div>

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/family.png')}}" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Variedad de modelos
                    </h6>
                    <p>
                        Contamos con modelos de calzado para toda la familia
                        descrubelos navegando por nuestras categorias para
                        caballero, dama, y niños.
                    </p>
                </div>
            </div>

            <div class="col-sm-4 text-center text-lg-left">
                <div class="services-box" data-aos="fade-down" data-aos-easing="linear"
                     data-aos-duration="1500">
                    <img src="{{asset('img/icons/avion.png')}}" alt="integrated-marketing" data-aos="zoom-in">
                    <h6 class="text-dark mb-3 mt-4 font-weight-medium">
                        Envío gratis
                    </h6>
                    <p>
                        Otro gran beneficio es que la mayoría de nuestros productos
                        <br>
                        cuentan con envío gratis
                        <br>
                        ayudándote de esa manera a que tu ganancia sea mayor.
                    </p>
                </div>
            </div>
        </div>


    </div>

@endsection
