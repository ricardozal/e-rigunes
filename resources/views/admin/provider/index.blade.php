@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/provider/index.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Proveedores</strong>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 justify-content-end d-flex align-items-center">
                    <a id="create-btn" class="btn btn-primary" href="{{route('admin_provider_create')}}">
                        Agregar proveedor
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo electrónico</th>
                            <th>Teléfono</th>
                            <th>Marca</th>
                            <th>Nombre de vendedor</th>
                            <th>Teléfono de vendedor</th>
                            <th>Correo de vendedor</th>
                            <th>Opciones</th>
                            <th>Activar/Desactivar</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-content" type="hidden"
           value="{{route('admin_provider_index_content')}}">
    <input id="inp-url-active" type="hidden"
           value="{{route('admin_provider_active',['providerId' => 'FAKE_ID'])}}">
    <input id="inp-url-update" type="hidden"
           value="{{route('admin_provider_update',['providerId' => 'FAKE_ID'])}}">

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
