@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/sales/index.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Ventas</strong>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>Comprador</th>
                            <th>Dirección de envío</th>
                            <th>Método de pago</th>
                            <th>Descuento</th>
                            <th>Precio total</th>
                            <th>Factura</th>
                            <th>Promoción</th>
                            <th>Información de envío</th>
                            <th>Productos</th>
                            <th>Skydropx</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-content" type="hidden"
           value="{{route('admin_sales_index_content')}}">
    <input id="inp-url-products" type="hidden"
           value="{{route('admin_sales_products_variants',['salesId' => 'FAKE_ID'])}}">
    <input id="inp-url-skydropx" type="hidden"
           value="{{route('admin_sales_products_skydropx',['salesId' => 'FAKE_ID'])}}">

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
