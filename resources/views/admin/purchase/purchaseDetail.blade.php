@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/purchase/details.js')}}"></script>
@endpush
@section('content')

    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Detalles de la compra</strong>
                </div>
            </div>
            <div class="row">
                <br>
                <br>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center" style="width:100%">
                        <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>SKU</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Cantidad</th>
                            <th>Precio de compra</th>

                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-contentTableDetails" type="hidden"
           value="{{route('admin_purchase_showTableDetails', ['purchaseId' => $purchase->id])}}">

@endsection
