@php
    /* @var $buyer Buyer*/use App\Models\Buyer;
@endphp
@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="{{asset('js/ecommerce/account/payment_methods/delete.js')}}"></script>
@endpush
@section('content-account')
    <div class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 px-5">
                <h3 class="text-center bottom-border mb-3">Datos de la cuenta</h3>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <p class="text-bold">Nombre completo</p>
                        <p class="">{{$buyer->full_name}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">Correo electrónico</p>
                        <p class="">{{$buyer->user->email}}</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <p class="text-bold">Telefono</p>
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
                    <div class="col-12">
                        <h3 class="text-center bottom-border mb-3">Direcciones</h3>
                    </div>
                    <div class="col-12">
                        <a href="{{route('ecommerce_account_address_create')}}" class="btn btn-primary-light btn-sm">Agregar</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        @forelse($buyer->address as $address)
                            <div class="row w-50 w-auto mx-md-auto my-5">
                                <div class="col-12 col-md-11 font-family-2">{{$address->full_address}}</div>
                                <div class="col-12 col-md-1"><a href="{{route('ecommerce_account_address_update', ['addressId' => $address->id])}}"><i class="far fa-edit color-primary"></i></a></div>
                            </div>
                        @empty
                            <h3>Sin direcciones</h3>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h3 class="text-center bottom-border mb-3">Métodos de pago</h3>
            </div>
            <div class="col-12">
                <a href="{{route('ecommerce_account_payment_method_create')}}" class="btn btn-primary-light btn-sm">Agregar</a>
            </div>
            <div class="col-12 my-5 px-5">
                @forelse($buyer->creditCards as $card)
                    <div class="row my-5">
                        <div class="col-12 col-lg-3 d-flex justify-content-center"><i class="fas fa-credit-card color-primary"></i></div>
                        <div class="col-12 col-lg-6">
                            <strong class="color-primary">Tarjeta de crédito/débito</strong>
                            <br>{{$card->card_number}}&nbsp;&nbsp;&nbsp;{{$card->expiration_month.'/'.$card->expiration_year}}
                            <br>Propietario: {{$card->cardholder}}
                        </div>
                        <div class="col-12 col-lg-3"><i class="fas fa-trash-alt color-primary cursor-pointer" data-id="{{$card->id}}"></i></div>
                        <div class="col-12"><hr></div>
                    </div>
                @empty
                    <div class="w-100 text-center"><h5>No se ha registrado ningún método de pago</h5></div>
                @endforelse
            </div>
        </div>

    </div>

    <input type="hidden" id="inp-url-delete" value="{{route('ecommerce_account_payment_methods_delete_post',['cartId' => 'FAKE_ID'])}}">

@endsection
