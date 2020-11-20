<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2">Modificar status</h4>
    <h3 class="text-header mt-2">Estatus: {{$status->name}}</h3>
</div>
<div class="row">
    <form id="form-upsert"
          action="{{route('admin_refund_status_post',['refundId' => $refund->id])}}"
          class="d-flex flex-column align-items-center w-100"
          method="post">
        @csrf
        @include('admin.refund._form')
        <div class="form-group text-center w-75">
            <button type="submit" class="btn btn-primary">
                guardar
            </button>
        </div>
    </form>
</div>
