<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\Promotion;
use App\Models\Sale;
use App\Models\Variant;
use App\Services\OrderService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function shoppingCart()
    {
        return view('web.order.shopping_cart');
    }

    public function addVariant(Request $request)
    {

        $quantity = $request->input("quantity", 1);
        $variantId = $request->input("variantId", 1);
        $order = OrderService::getCurrentOrder();
        $variant = Variant::whereId($variantId)->with(['product','size'])->first();

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

    public function getCurrentOrder()
    {
        $order = OrderService::getCurrentOrder();
        return response()->json($order);
    }

    public function updateVariant(Request $request)
    {
        $quantity = $request->input("quantity", 1);
        $variantId = $request->input("variantId", 1);

        $order = OrderService::getCurrentOrder();
        /** @var Variant $variant */
        $variant = Variant::find($variantId);

        $orderHasVariants = $order["order_has_variant"] ?? [];

        foreach ($orderHasVariants as $index => $orderHasVariant) {
            if ($orderHasVariant["variant"]->id == $variantId) {
                $orderHasVariant["quantity"] = $quantity;
                $orderHasVariant["price"] = $orderHasVariant["quantity"] * 1 * $variant->product->distributor_price;
                if ($quantity * 1 === 0) {
                    array_splice($orderHasVariants, $index, 1);
                } else {
                    $orderHasVariants[$index] = $orderHasVariant;
                }
            }
        }


        $order["order_has_variant"] = $orderHasVariants;
        OrderService::saveOrder(Sale::computeTotal($order));

        return response()->json([
            'success' => true,
            'data' => $order
        ]);
    }

    public function attachCoupon(Request $request)
    {
        $coupon_code = $request->input("coupon", null);

        /** @var Promotion $coupon */
        $coupon = Promotion::validateExist($coupon_code);

        if ($coupon == null) {
            return response()->json([
                'success' => false,
                "message" => "Ingrese un cupón válido"
            ]);
        }

        if (!$coupon->expirationIsValid()) {
            return response()->json([
                'success' => false,
                "message" => "Lo sentimos el cupón ya no es válido"
            ]);
        }

        if (!$coupon->isActive()) {
            return response()->json([
                'success' => false,
                "message" => "Lo sentimos el cupón ya no es válido"
            ]);
        }

        if (!$coupon->usagesIsValid()) {
            return response()->json([
                'success' => false,
                "message" => "Lo sentimos el cupón ya no es válido"
            ]);
        }

        $order = OrderService::getCurrentOrder();
        $order["coupon"] = $coupon;
        $order->discounts = $coupon->value;
        $order->coupon_code = $coupon->coupon_code;
        OrderService::saveOrder(Sale::computeTotal($order));

        return response()->json([
            'success' => true,
            "data" => $order
        ]);
    }

    public function deleteCoupon()
    {
        $order = OrderService::getCurrentOrder();
        $order->coupon_code = null;
        $order->discounts = 0;
        OrderService::saveOrder(Sale::computeTotal($order));

        return response()->json([
            'success' => true,
            "data" => $order
        ]);
    }

    public function updateCurrentStep(Request $request){

        $step = $request->input('step');

        $order = OrderService::getCurrentOrder();
        $order["current_step"] = $step;
        OrderService::saveOrder(Sale::computeTotal($order));

        return response()->json([
            'success' => true,
            "data" => $order
        ]);

    }

    public function getPaymentMethods(){

        $paymentMethods = PaymentMethod::whereActive(true)->get();

        return response()->json([
            'paymentMethods' => $paymentMethods
        ]);

    }

}
