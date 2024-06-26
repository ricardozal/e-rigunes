@extends('admin.template.main')
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>

    <script src="{{asset('js/admin/variant/indexFeatures.js')}}"></script>

    @if(isset($variant))
        <script src="{{asset('js/admin/variant/update.js')}}"></script>
    @else
        <script src="{{asset('js/admin/variant/create.js')}}"></script>
    @endif

@endpush
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
@endpush
@section('content')
    <div class="row mt-5 mx-0">
        <div class="col-12">
            <div class="row mb-4">
                <div class="col-md-2 col-12">
                    <a class="btn btn-primary" href="{{route('admin_product_variants',['productId' => isset($variant) ? $variant->product->id : $product->id])}}"><i class="fas fa-arrow-left"></i>&nbsp;Regresar</a>
                </div>
                <div class="col-12 col-md-10 justify-content-center d-flex align-items-center">
                    <strong class="text-color-primary" style="font-size: 150%">{{isset($variant) ? 'Imagenes de '.$variant->product->name : 'Agregar variante de '.$product->name}}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-select focused">
                        <label for="fk_id_size" class="focused form-label">Talla</label>
                        <select class="form-control" id="fk_id_size" name="fk_id_size" {{isset($variant) ? 'disabled' : ''}}>
                            @foreach(\App\Models\Size::asMap() as $id => $value)
                                <option value="{{$id}}" {{isset($variant) ? ($variant->size->id == $id ? 'selected' : '') : ''}}>{{$value}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12 justify-content-end d-flex align-items-center">
                    <a id="create-btn" class="btn btn-primary" href="{{route('admin_Features_createSize')}}">
                        Agregar Talla
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group form-select focused">
                        <label for="fk_id_color" class="focused form-label">Color</label>
                        <select class="form-control" id="fk_id_color" name="fk_id_color" {{isset($variant) ? 'disabled' : ''}}>
                            @foreach(\App\Models\Color::asMap() as $id => $name)
                                <option value="{{$id}}" {{isset($variant) ? ($variant->color_name->id == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12 justify-content-end d-flex align-items-center">
                    <a id="create-btn" class="btn btn-primary" href="{{route('admin_Features_createColor')}}">
                        Agregar Color
                    </a>
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
                    @isset($variantImages)
                        @foreach($variantImages as $image)
                            <img src="{{$image->absolute_image_url}}" alt="Imagen" class="variant-image m-3 cursor-pointer {{\App\Models\VariantHasImages::hasImage($image->id,$variant->id) ? 'image-selected' : ''}}" data-id="{{$image->id}}">
                            @if(\App\Models\VariantHasImages::hasImage($image->id,$variant->id))
                                <input type="hidden" name="image-selected[]" value="{{$image->id}}">
                            @endif
                        @endforeach
                    @endif
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
                                     data-url="{{isset($variant) ? route('admin_product_variants_update_post',['variantId' => $variant->id]) : route('admin_variants_save_image')}}">
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

    <input type="hidden" value="{{csrf_token()}}" id="inp-url-token">

    @if(isset($variant))
        <input type="hidden" value="{{$variant->id}}" id="variant-id">
        <input type="hidden" value="{{route('admin_variants_load_images',['productId' => $variant->product->id])}}" id="inp-url-load-images">
        <input type="hidden" value="{{route('admin_product_variants_update_post',['variantId' => $variant->id])}}" id="update-variant">
        <input type="hidden" value="{{route('admin_product_variants',['productId' => $variant->product->id])}}" id="variants-index">
    @else
        <input type="hidden" value="{{$product->id}}" id="product-id">
        <input type="hidden" value="{{route('admin_variants_load_images',['productId' => $product->id])}}" id="inp-url-load-images">
        <input type="hidden" value="{{route('admin_product_variants_create_post')}}" id="create-variant">
        <input type="hidden" value="{{route('admin_product_variants',['productId' => $product->id])}}" id="variants-index">
        <input type="hidden" value="" id="new-id-variant">
    @endif

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
