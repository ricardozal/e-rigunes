@extends('admin.template.main')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script src="{{asset('js/admin/variant/upsert.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row mb-4">
                <div class="col-md-2 col-12">
                    <a class="btn btn-primary" href="{{route('admin_product_variants',['productId' => $product->id])}}"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                </div>
                <div class="col-12 col-md-10 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">Agregar variante de {{$product->name}}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-select focused">
                        <label for="fk_id_size" class="focused form-label">Talla</label>
                        <select class="form-control" id="fk_id_size" name="fk_id_size">
                            @foreach(\App\Models\Size::asMap() as $id => $value)
                                <option value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-select focused">
                        <label for="fk_id_color" class="focused form-label">Color</label>
                        <select class="form-control" id="fk_id_color" name="fk_id_color">
                            @foreach(\App\Models\Color::asMap() as $id => $name)
                                <option value="{{$id}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <strong class="text-color-primary" style="font-size: 150%">Imagenes</strong>
                    <span style="color:red" class="images-error"></span>
                </div>
            </div>
            <div class="row images-container">
                <div class="col-12 images-list d-flex flex-wrap justify-content-center">
                </div>
            </div>
            <div class="row my-5">
                <div class="col-12">
                    <form method="POST"
                          enctype="multipart/form-data"
                          class="dropzone w-100"
                          id="files-form">
                        @csrf
                        <div class="row">
                            <div class="col-12 py-4">
                                <div id="div-drop-zone" class="w-100 text-center"
                                     data-url="{{route('admin_product_variants_create_post')}}">
                                    <div class="dz-message" style="cursor: pointer">
                                        <img src="{{asset('img/icons/ic_upload.png')}}"
                                             width="80px"
                                             height="50px"
                                             alt="">
                                        <br><br>
                                        <h5 class="color-grey">Seleccione o arrastre una imagen.</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button id="btn-process-queue" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="{{$product->id}}" id="product-id">
    <input type="hidden" value="{{route('admin_variants_load_images',['productId' => $product->id])}}" id="inp-url-load-images">
    <input type="hidden" value="{{route('admin_product_variants_create_post')}}" id="create-variant">
    <input type="hidden" value="{{csrf_token()}}" id="inp-url-token">
    <input type="hidden" value="{{route('admin_product_variants',['productId' => $product->id])}}" id="variants-index">
@endsection
