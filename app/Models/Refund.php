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
 */
class Refund extends Model
{
    protected $table = 'refund';
}
