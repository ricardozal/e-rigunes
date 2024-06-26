@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/PaymentMethod/index.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Métodos de pago</strong>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Activar/Desactivar</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-content" type="hidden"
           value="{{route('admin_payment_method_index_content')}}">
    <input id="inp-url-active" type="hidden"
           value="{{route('admin_payment_method_active',['paymentMethodId' => 'FAKE_ID'])}}">

@endsection
