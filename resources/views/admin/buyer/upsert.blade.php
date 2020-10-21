<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">Modificar comprador</h4>
</div>
<div class="row">
    <form id="form-upsert" action="{{route('admin_buyer_update_post',['buyerId' => $buyer->id])}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        @include('admin.buyer._form')
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                Modificar comprador
            </button>
        </div>
    </form>
</div>
