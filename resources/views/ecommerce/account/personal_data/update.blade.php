@php
    /* @var $buyer Buyer*/use App\Models\Buyer;
@endphp
@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="{{asset('js/ecommerce/account/account-update/index.js')}}"></script>
@endpush
@section('content-account')
    <section class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 px-5">
                <h1 class="text-center py-4 color-primary">Datos de la cuenta</h1>
                <form id="form-update-profile" action="{{route('ecommerce_account_user_update_post')}}" method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="text" name="email" id="email" class="form-control mb-4"
                                       placeholder="Email" value="{{ isset($buyer) ? $buyer->user->email: null,}}">
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" id="password"
                                       class="form-control mb-4" placeholder="Contraseña" value="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="text" name="phone" id="phone" class="form-control mb-4"
                                       placeholder="Teléfono" value="{{ isset($buyer) ? $buyer->phone:     null,}}">
                            </div>
                        </div>
                    </div>
                    <div class="text-center pb-4">
                        <button type="submit" class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <input type="hidden" value="{{route('ecommerce_account_profile_index')}}" id="inp-url-personal-data">
    </section>
@endsection


