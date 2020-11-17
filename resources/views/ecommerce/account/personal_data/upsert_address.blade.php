@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="{{asset("/commons/form_tools.js")}}"></script>
    <script src="{{asset('js/web/login/index.js')}}"></script>
@endpush
@section('content-account')
    <section class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 pb-5 px-5">
                <p  class="text-center font-family-2 text-bold  py-4 color-primary">{{isset($address) ? 'Modificar dirección' : 'Agregar dirección'}}</p>
                <form id="form-create-profile"
                      action="{{isset($address) ? route('ecommerce_account_address_update_post',['addressId' => $address->id]) : route('ecommerce_account_address_create_post')}}"
                      method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">CAllE</p>

                                <div class="form-group">
                                    <input type="text" name="street" id="street" class="form-control mb-4"
                                           value="{{ isset($address) ? $address->street: null,}}"    >
                                </div>


                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">NO. EXT</p>
                            <div class="form-group">
                                <input type="text" name="ext_num" id="ext_num" class="form-control mb-4"
                                   value="{{ isset($address) ? $address->ext_num: null,}}"    >
                            </div>


                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">NO. INT</p>
                            <div class="form-group">
                                <input type="text" name="int_num" id="int_num" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->int_num: null,}}"  >
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">COLONIA</p>
                            <div class="form-group">
                                <input type="text" name="colony" id="colony" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->colony: null,}}"  >
                            </div>
                        </div>
                        <div class="col-12 col-md-2">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">C.P.</p>
                            <div class="form-group">
                                <input type="text" name="zip_code" id="zip_code" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->zip_code: null,}}"    >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">CIUDAD</p>
                            <div class="form-group">
                                <input type="text" name="city" id="city" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->city: null,}}"  >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">





                            <p class="font-family-2 color-gray-dark text-bold mb-0">CIUDAD</p>

                            <div class="form-group">
                                <input type="text" name="state" id="state" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->state: null,}}"   >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">





                            <p class="font-family-2 color-gray-dark text-bold mb-0">PAIS</p>

                            <div class="form-group">
                                <input type="text" name="country" id="country" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->country: null,}}"  >
                            </div>
                        </div>
                        <div class="col-12 col-md-4">





                            <p class="font-family-2 color-gray-dark text-bold mb-0">Referencias</p>

                            <div class="form-group">
                                <input type="text" name="references" id="references" class="form-control mb-4"
                                       value="{{ isset($address) ? $address->references: null,}}"   >
                            </div>
                        </div>


                    </div>
                    <div class="text-center pb-4">
                        <button type="submit" class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <input type="hidden" value="{{route('ecommerce_account_profile_index')}}" id="inp-url-personal-data">
@endsection
