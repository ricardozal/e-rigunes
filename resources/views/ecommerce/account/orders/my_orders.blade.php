@extends('ecommerce.account.template.main')
@push('scripts')
    {{-- DataTable --}}
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/pagination/select.js"></script>
    <script src="{{asset('js/ecommerce/account/order/index.js')}}"></script>
@endpush
@push('css')
    {{-- DataTable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
@endpush
@section('content-account')
    <div class="container-fluid account-content-border h-100 py-4">
        <div class="row">
            <div class="col-12">
                <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                       style="width:100%">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Dirección de envío</th>
                        <th>Método de pago</th>
                        <th>Precio total</th>
                        <th>Detalles</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->address->full_address}}</td>
                            <td>{{$order->payment_method->name}}</td>
                            <td>{{$order->total_price}}</td>
                            <td><a class="show-order" href="{{route('ecommerce_show_details_order',['orderId' => $order->id])}}" style="color: black !important;"><i class="fas fa-info-circle"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

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
