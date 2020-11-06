@extends('ecommerce.account.template.main')
@push('scripts')
    <script src="{{asset("/commons/form_tools.js")}}"></script>
    <script src="{{asset('js/store/account/personal_data/address.js')}}"></script>
@endpush
@section('content-account')
    <section class="container account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12 pb-5 px-5">
                <p style="color: #84A07F;" class="text-center font-family-2 text-bold  py-4"></p>
                <form id="form-address-upsert"
                      action=""
                      method="POST">
                    @csrf
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">COLONIA</p>

                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">CALLE</p>


                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">C.P.</p>

                        </div>
                        <div class="col-12 col-md-2">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">No. INT.</p>

                        </div>
                        <div class="col-12 col-md-2">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">No. EXT.</p>

                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">CIUDAD</p>

                        </div>
                        <div class="col-12 col-md-4">
                            <p class="font-family-2 color-gray-dark text-bold mb-0">ESTADO</p>

                        </div>
                    </div>
                    <div class="text-center pb-4">
                        <button type="submit" class="btn btn-primary font-family-2 mt-3 without-border font-size-nav color-white" >Guardar</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <input type="hidden" value="" id="inp-url-personal-data">
@endsection
