<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sale
 *
 * @property int $id
 * @property string $total_price
 * @property string|null $discounts
 * @property int $billing
 * @property int $fk_id_promotion
 * @property int|null $fk_id_shipping_information
 * @property int $fk_id_buyer
 * @property int $fk_id_shipping_address
 * @property int $fk_id_payment_method
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $saleVariants
 * @property-read int|null $sale_variants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereBilling($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereDiscounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFkIdPaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFkIdPromotion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFkIdShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereFkIdShippingInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sale whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Address $address
 * @property-read \App\Models\Buyer $buyer
 * @property-read \App\Models\PaymentMethod $payment_method
 * @property-read \App\Models\Promotion|null $promotion
 * @property-read \App\Models\ShippingInformation|null $shipping_information
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SaleStatus[] $saleStatus
 * @property-read int|null $sale_status_count
 */
class Sale extends Model
{
    protected $table = 'sale';

    public function saleVariants()
    {
        return $this->belongsToMany(
            Variant::class,
            'sale_variants',
            'fk_id_sale',
            'fk_id_variant'
        )->withPivot(['quantity','sale_price']);
    }

    public function saleStatus()
    {
        return $this->belongsToMany(
            SaleStatus::class,
            'sale_history',
            'fk_id_sale',
            'fk_id_sale_status'
        );
    }

    public function promotion()
    {
        return $this->belongsTo(
            Promotion::class,
            'fk_id_promotion',
            'id'
        );
    }

    public function shipping_information()
    {
        return $this->belongsTo(
            ShippingInformation::class,
            'fk_id_shipping_information',
            'id'
        );
    }

    public function buyer()
    {
        return $this->belongsTo(
            Buyer::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function address()
    {
        return $this->belongsTo(
            Address::class,
            'fk_id_shipping_address',
            'id'
        );
    }

    public function payment_method()
    {
        return $this->belongsTo(
            PaymentMethod::class,
            'fk_id_payment_method',
            'id'
        );
    }

    public static function computeTotal(Sale $order)
    {

        $orderHasVariants = $order["order_has_variant"] ?? [];
        $total = 0;

        foreach ($orderHasVariants as $index => $orderHasVariant) {
            $total += $orderHasVariant["price"];
        }

        if ($order->discounts !== null && $order->discounts > 0) {
            /* @var $coupon Promotion */
            $coupon = $order["coupon"];

            if ($coupon->is_percentage) {
                $order->discounts = $total * ($coupon->value / 100);
                $total = $total * (1 - ($coupon->value / 100));
            } else {
                $total = $total - $coupon->value;
            }

        } else {
            $order->discounts = 0;
        }

        $total += $order["shipping_price"];

        $order->total_price = $total;
        return $order;
    }


    public static function similarProducts($orderId){

        /** @var Sale $order */
        $order = Sale::find($orderId);
        $saleVariants = $order->saleVariants;

        $categoryIds = [];
        $variantIds = [];

        foreach ($saleVariants as $variant){
            $categoryIds[] = $variant->product->category->id;
            $variantIds[] = $variant->id;
        }

        return Variant::whereActive(true)->
        whereHas('product.category', function ($q) use ($categoryIds){
            $q->whereIn('category.id', $categoryIds);
        })->whereNotIn('id', $variantIds)->limit(3)->get();

    }

}
