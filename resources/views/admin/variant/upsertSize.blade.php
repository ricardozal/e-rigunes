<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">Agregar Talla</h4>
</div>
<div class="row">
    <form id="form-upsert"
          action="{{route('admin_Features_createSize_post')}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        @include('admin.variant._formSize')
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                Guardar
            </button>
        </div>
    </form>
</div>
