@extends('admin.template.main')
@push('scripts')
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Agregar variante</strong>
                </div>
            </div>
            <div class="row">
                <form id="form-upsert"
                      action="{{route('admin_product_variants_create_post',['productId' => $product->id])}}"
                      class="d-flex flex-column align-items-center w-100"
                      method="post">
                    @csrf
                    @include('admin.products._formVariant')
                    <div class="form-group text-center w-75">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>

        </div>

        <div class="row">

            <div class="row">
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Imagenes de la variante </strong>
                </div>
                <div class="col-12 justify-content-center d-flex align-items-center">
                    <p>
                        Existen estas imagenes asociadas a este color, da click para seleccionarlas
                    </p>
                </div>
            </div>

            <form id="my-dropzone"
                  action=""
                  class="d-flex flex-column align-items-center w-100 dropzone"
                  method="post">
                @csrf
                <div class="dz-message">
                    Drop your files here
                </div>
                <div class="dropzone-previews"></div>
                <div class="form-group text-center w-75">
                    <button type="submit" class="btn btn-primary">
                        guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
