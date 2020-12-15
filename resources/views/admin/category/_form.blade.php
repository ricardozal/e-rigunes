<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="name"  class="focused form-label">Nombre</label>
            <input type="text" class="form-control" autocomplete="off" id="name" name="name" value="{{ isset($category) ? $category->name : null}}">
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="description"  class="focused form-label">Descripción</label>
            <input type="text" class="form-control" autocomplete="off" id="description" name="description" value="{{ isset($category) ? $category->description : null}}">
            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
        </div>
    </div>
</div>

@isset($category)
    <div class="w-75 text-center">
        <span>Elige una imagen si deseas cambiarla</span>
    </div>
@endif

<div class="row w-75">
    <div class="col-12">
        <div class="form-group">
            <input id="inp-image" name="file" type="file" class="custom-file-input">
            <label class="inp-file-msg">Imagen</label>
            <label id="lbl-image" class="custom-file-label focused  {{ $errors->has('file') ? ' is-invalid' : '' }}"
                   for="inp-image">
            </label>
            <span class="invalid-feedback">{{ $errors->first('file') }}</span>
        </div>
    </div>
</div>
