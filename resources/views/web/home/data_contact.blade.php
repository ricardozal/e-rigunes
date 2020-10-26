@extends('web.template.main')
@section('content')


    <div class="container-fluid">
    <div class="row text-center ">
        <div class="col-12 mb-5">
            <h2 class=""><b>Contacto</b></h2>
        </div>

    </div>

        <div class="row ">
            <div class="col-12 text-center ">
                <h6 class="color-black">En<p class=" ml-2 d-inline mr-2 " style="color: #6A1B8A" ><b>Rigunes</b></p>estamos a sus órdenes para cualquier comentario respecto o sugerencia del servicio.
                    <br>
                    Tel. 722 8-59-35-99 <br>  contacto@rigunes.com.mx

                    <br>
                    Si tiene alguna duda, lo invitamos a visitar nuestra sección de <a style="color: #6A1B8A"><b>preguntas frecuentes</b></a></h6>
            </div>
        </div>
    </div>


    @include('web.components.contact')





@endsection
