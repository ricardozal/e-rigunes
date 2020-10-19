<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="name"  class="focused form-label">Nombre</label>
            <input type="text" class="form-control" autocomplete="off" id="name" name="name" value="{{ isset($buyer) ? $buyer->name : null}}">
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="father_last_name"  class="focused form-label">Apellido paterno</label>
            <input type="text" class="form-control" autocomplete="off" id="father_last_name" name="father_last_name" value="{{ isset($buyer) ? $buyer->father_last_name : null}}">
            <span class="invalid-feedback">{{ $errors->first('father_last_name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="mother_last_name"  class="focused form-label">Apellido materno</label>
            <input type="text" class="form-control" autocomplete="off" id="mother_last_name" name="mother_last_name" value="{{ isset($buyer) ? $buyer->mother_last_name : null}}">
            <span class="invalid-feedback">{{ $errors->first('mother_last_name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="birthday"  class="focused form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" autocomplete="off" id="birthday" name="birthday" value="{{ isset($buyer) ? $buyer->birthday : null}}">
            <span class="invalid-feedback">{{ $errors->first('birthday') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="phone"  class="focused form-label">Teléfono</label>
            <input type="number" class="form-control" autocomplete="off" id="phone" name="phone" value="{{ isset($buyer) ? $buyer->phone : null}}">
            <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="customer_stripe_id"  class="focused form-label">Stripe ID</label>
            <input type="text" class="form-control" autocomplete="off" id="customer_stripe_id" name="customer_stripe_id" value="{{ isset($buyer) ? $buyer->customer_stripe_id : null}}">
            <span class="invalid-feedback">{{ $errors->first('customer_stripe_id') }}</span>
        </div>
    </div>
</div>
