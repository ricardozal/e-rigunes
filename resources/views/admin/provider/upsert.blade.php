<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">{{isset($provider) ? 'Modificar proveedor' : 'Agregar proveedor'}}</h4>
</div>
<div class="row">
    <form id="form-upsert"
          action="{{isset($provider) ? route('admin_provider_update_post',['providerId' => $provider->id]) : route('admin_provider_create_post')}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        @include('admin.provider._form')
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                {{isset($provider) ? 'Guardar' : 'Agregar proveedor'}}
            </button>
        </div>
    </form>
</div>
