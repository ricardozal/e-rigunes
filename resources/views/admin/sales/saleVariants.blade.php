<div class="d-flex flex-column align-items-center mb-5">
    <h4 class="text-header mt-2 text-color-primary">Productos</h4>
</div>

<div class="row">
    <div class="table-responsive">
        <table id="table-data" class="table table-striped table-bordered dt-responsive text-center"
               style="width:100%">
            <thead>
            <tr>
                <th>Producto</th>
                <th>Color</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Precio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($saleVariants as $variants)
                <tr>
                    <td>{{$variants->product_name}}</td>
                    <td>{{$variants->color_name}}</td>
                    <td>{{$variants->value_size}}</td>
                    <td>{{$variants->sale_quantity}}</td>
                    <td>{{$variants->price_sale}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
