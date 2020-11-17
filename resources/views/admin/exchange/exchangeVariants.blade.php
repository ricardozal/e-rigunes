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
                <tr>
                    <td>{{$variants->sku}}</td>
                    <td>{{$variants->product->name}}</td>
                    <td>{{$variants->size->value}}</td>
                    <td>{{$variants->color_name->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
