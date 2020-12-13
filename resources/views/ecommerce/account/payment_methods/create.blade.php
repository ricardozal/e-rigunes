@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{asset('js/ecommerce/account/payment_methods/add.js?v=1')}}"></script>
@endpush
@section('content-account')
    <div class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 px-5">
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="color-primary text-thin">
                            Agregar método de pago
                        </h4>
                    </div>
                </div>
                <div class="row w-75 mx-auto">
                    <div id="form-content" class="col-12">
                        <div class="form-group">
                            <input type="text" name="holder-name" id="holder-name" class="form-control mb-4"
                                   placeholder="Propietario">
                        </div>
                        <form class="form-card" id="setup-form">
                            <div id="card-element"></div>
                            <span id="card-errors" style="color: red; font-weight: bold"></span>
                            <div class="row justify-content-center py-3">
                                <button id="card-button" class="btn btn-primary text-center">
                                    Guardar tarjeta
                                </button>&nbsp;&nbsp;
                                @if($fromCart)
                                    <a href="{{route('web_shopping_cart')}}" class="btn btn-outline-primary">Regresar al carrito</a>
                                @else
                                    <a href="{{route('ecommerce_account_profile_index')}}" class="btn btn-outline-secondary">Cancelar</a>
                                @endif
                            </div>
                        </form>

                        <input type="hidden"
                               id="inp-url-create-post"
                               value="{{route('ecommerce_account_payment_methods_create_post')}}">
                        <input type="hidden"
                               id="inp-url-token"
                               value="{{csrf_token()}}">
                        <input type="hidden"
                               value="{{$fromCart ? route('web_shopping_cart') : route('ecommerce_account_profile_index')}}"
                               id="inp-url-personal-data">
                        <input type="hidden"
                               value="{{route('ecommerce_account_payment_methods_generate_intent')}}"
                               id="inp-url-intent">
                        <input type="hidden"
                               id="pk-stripe"
                               value="{{env('STRIPE_PUBLIC_KEY')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
