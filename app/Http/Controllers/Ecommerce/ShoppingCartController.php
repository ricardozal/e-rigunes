<?php


namespace App\Http\Controllers\Ecommerce;


use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Buyer;
use App\Models\CreditCard;
use App\Models\PaymentMethod;
use App\Models\Promotion;
use App\Models\Sale;
use App\Models\SaleStatus;
use App\Models\SaleVariants;
use App\Models\Variant;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Exception;


class ShoppingCartController extends Controller
{
    public function completeOrder(Request $request){

        $paymentMethod = $request->get('payment_method');
        $cardId = $request->get('card_id');
        $addressId = $request->get('address_id');

        $buyer = Buyer::whereFkIdUser(Auth::user()->id)->first();
        $order = OrderService::getCurrentOrder();
        /** @var Address $address */
        $address = Address::find($addressId);

        $orderResume = null;

        if($paymentMethod == PaymentMethod::PAYPAL) {

            $orderResume = $this->registerOrder($order, $address, $buyer, PaymentMethod::PAYPAL);

        } elseif ($paymentMethod == PaymentMethod::CARD) {

            /** @var CreditCard $card */
            $card = CreditCard::find($cardId);
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $total = ($order->total_price) * 100;

            try{
                $intent = PaymentIntent::create([
                    'amount' => $total,
                    'currency' => 'mxn',
                    'customer' => $buyer->customer_stripe_id,
                    'payment_method' => $card->payment_method_key,
                    'off_session' => true,
                    'confirm' => true,
                ]);

                if($intent->status === 'succeeded'){

                    $orderResume = $this->registerOrder($order, $address, $buyer, PaymentMethod::CARD);

                }else{
                    return response()->json([
                        'success' => false,
                        'message' => 'Algo salio mal'
                    ]);
                }
            }catch (Exception $e){
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ]);
            }

        }

        if($orderResume != null){
            return response()->json([
                'success' => true,
                'order_resume' => $orderResume,
                'message' => 'La compra se realizó con éxito'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'El pago se procesó con éxito, pero el registro de la compra no se pudo completar. Ponte en contacto con nosotros.'
            ]);
        }
    }

    /**
     * @param Sale $order
     * @param Address $address
     * @param Buyer $buyer
     * @param $paymentMethodId
     * @return string
     * @throws Exception
     */
    private function registerOrder($order, $address, $buyer, $paymentMethodId){

        try{
            \DB::beginTransaction();

            $orderHasVariants = $order["order_has_variant"];

            $sale = null;
            if (!($order["order_has_plan"] != null && $order["order_has_variant"] == null && $order["order_has_outfits"] == null)){
                $sale = new Sale();
                $sale->total_price = $order->total_price;
                $sale->fk_id_buyer = $buyer->id;
                $sale->fk_id_payment_method = $paymentMethodId;
                $sale->fk_id_shipping_address = $address->id;

                if ($order->discounts !== null && $order->discounts > 0) {
                    /* @var $coupon Promotion */
                    $coupon = $order["coupon"];

                    if ($coupon->is_percentage) {
                        $sale->discounts = $order->total_price * ($coupon->value / 100);
                    } else {
                        $sale->discounts = $coupon->value;
                    }

                    if ($order["coupon"] !== null) Promotion::usePromo($coupon->coupon_code);
                    $sale->fk_id_promotion = $coupon->id;

                } else {
                    $sale->discounts = 0;
                }

                $sale->saveOrFail();
                $sale->saleStatus()->attach(SaleStatus::ORDERED);
                $sale->saveOrFail();

                if($orderHasVariants != null ){
                    foreach ($orderHasVariants as $index => $orderHasVariant) {
                        /** @var Variant $variant */
                        $variant = Variant::find($orderHasVariant["variant"]->id);
                        $quantity = $orderHasVariant["quantity"];
                        if (!$this->registerMovement($variant, $quantity, $sale->id)) throw new Exception();
                    }
                }
            }

            \DB::commit();

            $email = $buyer->user->email;

            Mail::send('web.mail.purchase_confirmation',
                [
                    'order' => $sale
                ],
                function ($msj) use ($email){
                    $msj->subject('Rigunes | Confirmación de compra')
                        ->to($email);
                }
            );

            OrderService::deleteOrder();

            if($sale != null)
            {
                return route('ecommerce_show_last_order', ['orderId' => $sale->id]);
            } else {
                return route('ecommerce_account_profile_index');
            }

        } catch (\Throwable $e) {
            \Log::error($e->getMessage());
            \DB::rollBack();
            return null;
        }

    }

    /**
     * @param Variant $variant
     * @param Int $quantity
     * @param Int $saleId
     * @return bool
     * @throws Exception
     */
    private function registerMovement($variant, $quantity, $saleId){

        try{
            \DB::beginTransaction();

            $saleVariant = new SaleVariants();
            $saleVariant->quantity = $quantity;
            $saleVariant->sale_price = $variant->product->distributor_price;
            $saleVariant->fk_id_variant = $variant->id;
            $saleVariant->fk_id_sale = $saleId;
            $saleVariant->saveOrFail();

            \DB::commit();
            return true;
        } catch (\Throwable $e) {
            \Log::error($e);
            \DB::rollBack();
            return false;
        }

    }
}
