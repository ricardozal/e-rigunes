<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="name"  class="focused form-label">Nombre</label>
            <input type="text" class="form-control" autocomplete="off" id="name" name="name">
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="value"  class="focused form-label">Código exadecimal</label>
            <input type="text" class="form-control" autocomplete="off" id="value" name="value">
            <span class="invalid-feedback">{{ $errors->first('value') }}</span>
        </div>
    </div>
</div>
