<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="name"  class="focused form-label">Nombre</label>
            <input type="text" class="form-control" autocomplete="off" id="name" name="name" value="{{ isset($provider) ? $provider->name : null}}">
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="email" class="focused form-label">Correo electrónico</label>
            <input type="email" class="form-control" autocomplete="off" id="email" name="email" value="{{ isset($provider) ? $provider->email : null}}">
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="phone"  class="focused form-label">Teléfono</label>
            <input type="text" class="form-control" autocomplete="off" id="phone" name="phone" value="{{ isset($provider) ? $provider->phone : null}}">
            <span class="invalid-feedback">{{ $errors->first('phone') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="business_name"  class="focused form-label">Marca</label>
            <input type="text" class="form-control" autocomplete="off" id="business_name" name="business_name" value="{{ isset($provider) ? $provider->business_name : null}}">
            <span class="invalid-feedback">{{ $errors->first('business_name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="seller_name"  class="focused form-label">Nombre vendedor</label>
            <input type="text" class="form-control" autocomplete="off" id="seller_name" name="seller_name" value="{{ isset($provider) ? $provider->seller_name : null}}">
            <span class="invalid-feedback">{{ $errors->first('seller_name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="seller_phone"  class="focused form-label">Teléfono vendedor</label>
            <input type="text" class="form-control" autocomplete="off" id="seller_phone" name="seller_phone" value="{{ isset($provider) ? $provider->seller_phone : null}}">
            <span class="invalid-feedback">{{ $errors->first('seller_phone') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="seller_email" class="focused form-label">Correo electrónico vendedor</label>
            <input type="email" class="form-control" autocomplete="off" id="seller_email" name="seller_email" value="{{ isset($provider) ? $provider->seller_email : null}}">
            <span class="invalid-feedback">{{ $errors->first('seller_email') }}</span>
        </div>
    </div>
</div>
