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
 * @property-read \App\Models\Address|null $address
 * @property-read \App\Models\Buyer $buyer
 * @property-read \App\Models\ShippingInformation|null $shippingInfo
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ExchangeImages[] $exchangeImages
 * @property-read int|null $exchange_images_count
 * @property-read \App\Models\ExchangeStatus $exchangeStatus
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $saleVariants
 * @property-read int|null $sale_variants_count
 * @property-read \App\Models\Variant $variant
 */
class Exchange extends Model
{
    protected $table = 'exchange';

    public function address(){
        return $this->belongsTo(
            Address::class,
            'fk_id_exchange_address',
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

    public function buyer(){
        return $this->belongsTo(
            Buyer::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function exchangeStatus(){
        return $this->belongsTo(
            ExchangeStatus::class,
            'fk_id_exchange_status',
            'id'
        );
    }

    public function exchangeImages(){
        return $this->hasMany(
            ExchangeImages::class,
            'fk_id_exchange',
            'id'
        );
    }

    public function saleVariants()
    {
        return $this->belongsToMany(
            Variant::class,
            'sale_variants',
            'fk_id_sale',
            'fk_id_variant'
        );
    }

    public function variant(){
        return $this->belongsTo(
            Variant::class,
            'fk_id_exchange_variant',
            'id'
        );
    }
}
