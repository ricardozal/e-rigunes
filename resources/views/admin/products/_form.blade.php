<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="name"  class="focused form-label">Nombre</label>
            <input type="text" class="form-control" autocomplete="off" id="name" name="name" value="{{ isset($product) ? $product->name : null}}">
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="description"  class="focused form-label">Descripción</label>
            <input type="text" class="form-control" autocomplete="off" id="description" name="description" value="{{ isset($product) ? $product->description : null}}">
            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="weight"  class="focused form-label">Peso</label>
            <input type="number" class="form-control" autocomplete="off" id="weight" name="weight" value="{{ isset($product) ? $product->weight : null}}">
            <span class="invalid-feedback">{{ $errors->first('weight') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="height"  class="focused form-label">Altura</label>
            <input type="number" class="form-control" autocomplete="off" id="height" name="height" value="{{ isset($product) ? $product->height : null}}">
            <span class="invalid-feedback">{{ $errors->first('height') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="width"  class="focused form-label">Ancho</label>
            <input type="number" class="form-control" autocomplete="off" id="width" name="width" value="{{ isset($product) ? $product->width : null}}">
            <span class="invalid-feedback">{{ $errors->first('width') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="length"  class="focused form-label">Largo</label>
            <input type="number" class="form-control" autocomplete="off" id="length" name="length" value="{{ isset($product) ? $product->length : null}}">
            <span class="invalid-feedback">{{ $errors->first('length') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_provider" class="focused form-label">Proveedor</label>
            <select class="form-control" id="fk_id_provider" name="fk_id_provider">
                @foreach(\App\Models\Provider::asMap() as $id => $name)
                    <option value="{{$id}}" {{isset($product) ? ($product->fk_id_provider == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group form-select focused">
            <label for="fk_id_category" class="focused form-label">Categoria</label>
            <select class="form-control" id="fk_id_category" name="fk_id_category">
                @foreach(\App\Models\Category::asMap() as $id => $name)
                    <option value="{{$id}}" {{isset($product) ? ($product->fk_id_category == $id ? 'selected' : '') : ''}}>{{$name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>