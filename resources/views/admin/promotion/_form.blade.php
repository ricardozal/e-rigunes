<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="expiration_date"  class="focused form-label">Fecha de expiración</label>
            <input type="date" class="form-control" autocomplete="off" id="expiration_date" name="expiration_date" value="{{ isset($promotion) ? $promotion->expiration_date : null}}">
            <span class="invalid-feedback">{{ $errors->first('expiration_date') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="coupon_code"  class="focused form-label">Código de cupón</label>
            <input type="text" class="form-control" autocomplete="off" id="coupon_code" name="coupon_code" value="{{ isset($promotion) ? $promotion->coupon_code : null}}">
            <span class="invalid-feedback">{{ $errors->first('coupon_code') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="max_number_swaps"  class="focused form-label">Número máximo de cambios</label>
            <input type="number" class="form-control" autocomplete="off" id="max_number_swaps" name="max_number_swaps" value="{{ isset($promotion) ? $promotion->max_number_swaps : null}}">
            <span class="invalid-feedback">{{ $errors->first('max_number_swaps') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12 pb-4">
        <label class="focused form-label">Valor de la promoción</label>
        <br>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="is_percentageF" name="is_percentage" value="0">
            <label class="form-check-label" for="is_percentageF">Por valor</label>
        </div>
        <div class="form-check form-check-inline">
            <input type="checkbox" class="form-check-input" id="is_percentageT" name="is_percentage" value="1">
            <label class="form-check-label" for="is_percentageT">Por porcentaje</label>
        </div>
    </div>

</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="value"  class="focused form-label">Valor</label>
            <input type="number" step="0.01" min="0" class="form-control" autocomplete="off" id="value" name="value" value="{{ isset($promotion) ? $promotion->value : null}}">
            <span class="invalid-feedback">{{ $errors->first('value') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="min_amount"  class="focused form-label">Monto mínimo</label>
            <input type="number" step="0.01" min="0" class="form-control" autocomplete="off" id="min_amount" name="min_amount" value="{{ isset($promotion) ? $promotion->min_amount : null}}">
            <span class="invalid-feedback">{{ $errors->first('min_amount') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="description"  class="focused form-label">Descrición</label>
            <textarea rows="3" class="form-control" autocomplete="off" id="description" name="description">{{ isset($promotion) ? $promotion->description : null}}</textarea>
            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
        </div>
    </div>
</div>
