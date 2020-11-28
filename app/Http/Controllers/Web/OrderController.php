<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Variant;
use App\Services\OrderService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addVariant(Request $request)
    {

        $quantity = $request->input("quantity", 1);
        $colorId = $request->input("colorId", 1);
        $sizeId = $request->input("sizeId", 1);
        $order = OrderService::getCurrentOrder();
        $variant = Variant::whereFkIdSize($sizeId)
                          ->whereHas('color', function ($q) use($colorId){
                              $q->where('color.id',$colorId);
                          })->first();

        if ($variant == null) {
            return response()->json([
                'success' => false,
                'message' => 'Error al encontrar el modelo del calzado.'
            ]);
        }

        $orderHasVariants = $order["order_has_variant"] ?? [];
        $existVariant = false;

        foreach ($orderHasVariants as $index => $orderHasVariant) {
            if ($orderHasVariant["variant"]->id == $variant->id) {
                $orderHasVariant["quantity"] = $orderHasVariant["quantity"] * 1 + $quantity;
                $orderHasVariant["price"] = $orderHasVariant["quantity"] * 1 * $variant->product->distributor_price;
                $orderHasVariants[$index] = $orderHasVariant;
                $existVariant = true;
            }
        }

        if (!$existVariant) {
            $orderHasVariants[] = [
                'quantity' => $quantity,
                'price' => $quantity * $variant->product->distributor_price,
                'variant' => $variant
            ];
        }

        $order["order_has_variant"] = $orderHasVariants;
        $order["current_step"] = 1;
        OrderService::saveOrder(Sale::computeTotal($order));

        return response()->json([
            'success' => true,
            'order' => OrderService::getCurrentOrder()
        ]);
    }
}
