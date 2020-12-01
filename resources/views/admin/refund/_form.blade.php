<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_refund_status" class="focused form-label">Status</label>
            <select class="form-control" id="fk_id_refund_status" name="fk_id_refund_status">
                @foreach(\App\Models\RefundStatus::asMap() as $id => $name)
                    <option value="{{$id}}" {{isset($refund) ? ($refund->fk_id_refund_status == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
