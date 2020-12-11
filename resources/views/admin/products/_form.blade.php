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
            <textarea rows="3" class="form-control" autocomplete="off" id="description" name="description">{{ isset($product) ? $product->description : null}}</textarea>
            <span class="invalid-feedback">{{ $errors->first('description') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="weight"  class="focused form-label">Peso Kg</label>
            <input placeholder="Kg" type="number" class="form-control" autocomplete="off" id="weight" name="weight" value="{{ isset($product) ? $product->weight : null}}">
            <span class="invalid-feedback">{{ $errors->first('weight') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="height"  class="focused form-label">Altura cm</label>
            <input placeholder="cm" type="number" class="form-control" autocomplete="off" id="height" name="height" value="{{ isset($product) ? $product->height : null}}">
            <span class="invalid-feedback">{{ $errors->first('height') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="width"  class="focused form-label">Ancho cm</label>
            <input placeholder="cm" type="number" class="form-control" autocomplete="off" id="width" name="width" value="{{ isset($product) ? $product->width : null}}">
            <span class="invalid-feedback">{{ $errors->first('width') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="length"  class="focused form-label">Largo cm</label>
            <input placeholder="cm" type="number" class="form-control" autocomplete="off" id="length" name="length" value="{{ isset($product) ? $product->length : null}}">
            <span class="invalid-feedback">{{ $errors->first('length') }}</span>
        </div>
    </div>
</div>

<div class="row w-75">
    <div class="col-12">
        <div class="form-group focused">
            <label for="rigunes_price"  class="focused form-label">Precio Rigunes</label>
            <input type="number" class="form-control" autocomplete="off" id="rigunes_price" name="rigunes_price" value="{{ isset($product) ? $product->rigunes_price : null}}">
            <span class="invalid-feedback">{{ $errors->first('rigunes_price') }}</span>
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
