<div class="container">
    <div class="d-flex flex-column align-items-center mb-5">
        <h4 class="text-header mt-2 text-color-primary">Lista de productos</h4>
    </div>
    <div class="table-responsive">
        <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
               style="width:100%">
            <thead>
            <tr>
                <th>SKU</th>
                <th>Nombre del producto</th>
                <th>Talla</th>
                <th>Color</th>
            </tr>
            </thead>
            <tbody>
            @foreach($variants as $variant)
                <tr>
                    <td>{{$variant->sku}}</td>
                    <td>{{$variant->product->name}}</td>
                    <td>{{$variant->size->value}}</td>
                    <td>{{$variant->color_name->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
