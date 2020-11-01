@extends('admin.template.main')
@push('scripts')
    <script src="{{asset('js/admin/variant/index.js')}}"></script>
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-md-2 col-12">
                    <a class="btn btn-primary" href="{{route('admin_products_index')}}"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                </div>
                <div class="col-12 col-md-10 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Variantes de {{$product->name}}</strong>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12 justify-content-end d-flex align-items-center">
                    <a id="create-btn" class="btn btn-primary" href="{{route('admin_product_variants_create',['productId' => $product->id])}}">
                        Agregar variante
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
                           style="width:100%">
                        <thead>
                        <tr>
                            <th>SKU</th>
                            <th>Producto</th>
                            <th>Talla</th>
                            <th>Color</th>
                            <th>Imágenes</th>
                            <th>Activar/Desactivar</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <input id="inp-url-index-content" type="hidden"
           value="{{route('admin_product_variants_content',['productId' => $product->id])}}">
    <input id="inp-url-active" type="hidden"
           value="{{route('admin_product_variants_active',['variantId' => 'FAKE_ID'])}}">
@endsection
