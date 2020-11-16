<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Refund
 *
 * @property int $id
 * @property string $reason
 * @property int $quantity
 * @property int|null $fk_id_refund_address
 * @property int|null $fk_id_shipping_info
 * @property int $fk_id_sale_variant
 * @property int $fk_id_buyer
 * @property int $fk_id_refund_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Refund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Refund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Refund query()
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereFkIdRefundAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereFkIdRefundStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereFkIdSaleVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereFkIdShippingInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Refund whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Address|null $address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RefundImages[] $refundImages
 * @property-read int|null $refund_images_count
 * @property-read \App\Models\RefundStatus $refundStatus
 * @property-read \App\Models\ShippingInformation|null $shippingInfo
 * @property-read \App\Models\Buyer $buyer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $saleVariants
 * @property-read int|null $sale_variants_count
 */
class Refund extends Model
{
    protected $table = 'refund';

    public function refundStatus(){
        return $this->belongsTo(
            RefundStatus::class,
            'fk_id_refund_status',
            'id'
        );
    }

    public function refundImages(){
        return $this->hasMany(
            RefundImages::class,
            'fk_id_refund',
            'id'
        );
    }

    public function shippingInfo(){
        return $this->belongsTo(
            ShippingInformation::class,
            'fk_id_shipping_info',
            'id'
        );
    }

    public function address(){
        return $this->belongsTo(
            Address::class,
            'fk_id_refund_address',
            'id'
        );
    }

    public function buyer(){
        return $this->belongsTo(
            Buyer::class,
            'fk_id_buyer',
            'id'
        );
    }

    /*public function saleVariants()
    {
        return $this->belongsTo(
            SaleVariants::class,
            'fk_id_sale_variant'
        );
    }*/

    public function saleVariants()
    {
        return $this->belongsToMany(
            Variant::class,
            'sale_variants',
            'fk_id_sale',
            'fk_id_variant'
        );
    }

}
