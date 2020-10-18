<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Exchange
 *
 * @property int $id
 * @property string $reason
 * @property int $warranty
 * @property int|null $fk_id_exchange_address
 * @property int|null $fk_id_shipping_info
 * @property int $fk_id_sale_variant
 * @property int $fk_id_exchange_variant
 * @property int $fk_id_buyer
 * @property int $fk_id_exchange_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange query()
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdExchangeAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdExchangeStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdExchangeVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdSaleVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereFkIdShippingInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Exchange whereWarranty($value)
 * @mixin \Eloquent
 */
class Exchange extends Model
{
    protected $table = 'exchange';
}
