<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_size" class="focused form-label">Talla</label>
            <select class="form-control" id="fk_id_size" name="fk_id_size">
                @foreach(\App\Models\Size::asMap() as $id => $value)
                    <option value="{{$id}}" {{isset($variant) ? ($variant->fk_id_size == $id ? 'selected' : '') : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_color" class="focused form-label">Color</label>
            <select class="form-control" id="fk_id_color" name="fk_id_color">
                @foreach(\App\Models\Color::asMap() as $id => $name)
                    <option value="{{$id}}" {{isset($variantHasImage) ? ($variantHasImage->fk_id_color == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
