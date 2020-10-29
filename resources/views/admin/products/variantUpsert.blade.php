<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">{{isset($variant) ? 'Modificar variante' : 'Agregar variante'}}</h4>
</div>
<div class="row">
    <form id="form-upsert" action="{{isset($variant) ? route('admin_product_variants_update_post',['variantId' => $variant->id]) : route('admin_product_variants_create_post',['productId' => $product->id])}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        @include('admin.products._formVariant')
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                {{isset($variant) ? 'Guardar' : 'Agregar variante'}}
            </button>
        </div>
    </form>
</div>
