<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_exchange_status" class="focused form-label">Status</label>
            <select class="form-control" id="fk_id_exchange_status" name="fk_id_exchange_status">
                @foreach(\App\Models\ExchangeStatus::asMap() as $id => $name)
                    <option value="{{$id}}" {{isset($exchange) ? ($exchange->fk_id_exchange_status == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
