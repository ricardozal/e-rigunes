@php
    /* @var $buyer Buyer*/use App\Models\Buyer;
@endphp
@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="{{asset("/commons/form_tools.js")}}"></script>
    <script src="{{asset('js/web/personal_data/index.js')}}"></script>
@endpush
@section('content-account')
    <section class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 px-5">
                <p class="text-center ">Datos cliente</p>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <p class="text-bold">CORREO</p>
                        <p class="">{{$buyer->user->email}}</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="text-bold">NOMBRE</p>
                        <p class="">{{$buyer->name}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">APELLIDO PATERNO</p>
                        <p class="">{{$buyer->father_last_name}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">APELLIDO MATERNO</p>
                        <p class="">{{$buyer->mother_last_name}}</p>
                    </div>

                    <div class="col-12 col-md-4">
                        <p class="text-bold">TELEFONO</p>
                        <p class="">{{$buyer->phone}}</p>
                    </div>


                </div>
                <div class="text-center pb-4">
                    <a class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white "
                       href="{{route('ecommerce_account_user_update')}}" ><b>Modificar</b></a>
                </div>
            </div>

            <div class="col-12 pb-5 px-5">
                <div class="row">
                    <div class="col-8 col-md-3 offset-md-4">
                        <p class="text-center font-family-2 text-bold  py-md-4">Direcciones</p>
                    </div>
                    <div class="col-2 pt-md-3">
                        <a class="d-inline-flex ml-3" href="{{route('ecommerce_account_address_create')}}">
                            <i class="fas fa-plus-circle color-primary" style="font-size: 1.8rem;"> </i>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col" id="my-addresses">

                    </div>
                </div>


            </div>
            <div class="col-12">
                <span class="color-black bottom-border">Métodos de pago</span>&nbsp;&nbsp;&nbsp;
                <a href="{{route('ecommerce_account_payment_method_create')}}" class="btn btn-primary-light btn-sm">Agregar</a>
            </div>
            <div class="col-12 my-5 px-5">
                @forelse($buyer->creditCards as $card)
                    <div class="row my-5 justify-content-center">
                        <div class="col-12 col-lg-1"><i class="fas fa-credit-card color-primary"></i></div>
                        <div class="col-12 col-lg-7">
                            <strong class="color-primary">Tarjeta de crédito/débito</strong>
                            <br>{{$card->card_number}}&nbsp;&nbsp;&nbsp;{{$card->expiration_month.'/'.$card->expiration_year}}
                            <br>Propietario: {{$card->cardholder}}
                        </div>
                        <div class="col-12"><hr></div>
                    </div>
                @empty
                    <div class="w-100 text-center"><h5>No se ha registrado ningún método de pago</h5></div>
                @endforelse
            </div>
        </div>

    </section>

    <input type="hidden" id="inp-url-content" value="{{route('ecommerce_account_address_content')}}">
    <input type="hidden" id="inp-url-update"
           value="{{route('ecommerce_account_address_update', ['addressId' => 'FAKE_ID'])}}">
    <input type="hidden" id="inp-url-active"
           value="{{route('ecommerce_account_address_select_active', ['addressId' => 'FAKE_ID'])}}">


@endsection
