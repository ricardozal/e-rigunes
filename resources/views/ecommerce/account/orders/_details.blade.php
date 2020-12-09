@php
    /* @var $order Sale*/use App\Models\Sale;
@endphp
<div class="col-12 mt-4 mb-2">
    <div class="row">
        <div class="col-6 text-center">
            <span class="color-primary">ORDEN DE COMPRA No. {{$order->id}}</span>
        </div>
        <div class="col-6 text-center">
            <span class="color-primary">{{$order->created_at->format('d-m-Y')}}</span>
        </div>
    </div>
</div>
<div class="col-12">
    <table class="table t-resp">
        <thead>
        <tr class="color-secondary text-center ">
            <th scope="col" class="text-thin">Producto</th>
            <th scope="col" class="text-thin">Cantidad</th>
            <th scope="col" class="text-thin">Precio</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order->saleVariants as $variant)
            <tr class="text-center">
                <td>
                    <span class="color-secondary">{{$variant->product->name}}</span>
                </td>
                <td>
                    <span class="color-gray">{{$variant->pivot->quantity}}</span>
                </td>
                <td>
                    <span class="color-gray">{{'$'.number_format($variant->pivot->sale_price * $variant->pivot->quantity,2)}}</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="col-12">
    <hr>
    <div class="row">
        <div class="col-6 text-center">
            <span class="color-secondary">Dirección de envío</span>
            <p class="color-gray">
                {{$order->address->full_address}}
            </p>
        </div>
        <div class="col-6 text-center">
            <span class="color-secondary">Método de pago</span>
            <p class="color-gray">
                {{$order->payment_method->name}}
            </p>
        </div>
    </div>
    <hr>
</div>
<div class="col-12 text-right">
    <span class="color-primary">Envío: {{'$'.number_format($order->shipping_information->shipping_price,2)}}</span><br>
</div>
<div class="col-12 text-right">
    <br>
    <h3 class="color-primary">Total: {{'$'.number_format($order->total_price,2)}}</h3>
</div>
