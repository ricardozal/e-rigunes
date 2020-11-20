@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/exchange/index.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Cambio de productos</strong>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>Comprador</th>
                            <th>Razón</th>
                            <th>Garantia</th>
                            <th>Dirección de recolección</th>
                            <th>información envío</th>
                            <th>producto de cambio</th>
                            <th>producto a cambiar</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-content" type="hidden"
           value="{{route('admin_exchange_index_content')}}">
    <input id="inp-url-exchangeSaleVariant" type="hidden"
           value="{{route('admin_exchange_sale_variant',['exchangeId' => 'FAKE_ID'])}}">
    <input id="inp-url-exchangeVariant" type="hidden"
           value="{{route('admin_exchange_variant',['exchangeId' => 'FAKE_ID'])}}">
    <input id="inp-url-status" type="hidden"
           value="{{route('admin_exchange_status',['exchangeId' => 'FAKE_ID'])}}">

    <div id='modal-upsert' class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="body-content"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
