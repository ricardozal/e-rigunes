@extends('ecommerce.account.template.main')
@push('scripts')

@endpush
@section('content-account')
    <section class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 px-5">
                <p class="text-center ">Datos cliente</p>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <p class="text-bold">NOMBRE</p>
                        <p class=""></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">Apellido Paterno</p>
                        <p class=""></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">Apellido Materno</p>
                        <p class=""></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">CORREO ELECTRÓNICO</p>
                        <p class=""></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">CONTRASEÑA</p>
                        <p class=""></p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">TELEFONO</p>
                        <p class=""></p>
                    </div>


                </div>
                <div class="text-center pb-4">
                    <a class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white "
                       href="" ><b>Modificar</b></a>
                </div>
            </div>

            <div class="col-12 pb-5 px-5">
                <div class="row">
                    <div class="col-8 col-md-3 offset-md-4">
                        <p class="text-center font-family-2 text-bold  py-md-4">Direcciones</p>
                    </div>
                    <div class="col-2 pt-md-3">
                        <a href="">

                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col" id="my-addresses">

                    </div>
                </div>


            </div>
        </div>

    </section>


@endsection
