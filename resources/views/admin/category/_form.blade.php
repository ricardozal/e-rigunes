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

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="image_url"  class="focused form-label">Imagen URL</label>
            <input type="text" class="form-control" autocomplete="off" id="image_url" name="image_url" value="{{ isset($category) ? $category->image_url : null}}">
            <span class="invalid-feedback">{{ $errors->first('image_url') }}</span>
        </div>
    </div>
</div>
