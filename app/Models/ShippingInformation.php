<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ShippingInformation
 *
 * @property int $id
 * @property string $skydropx_id
 * @property string $rate_id
 * @property string $shipping_price
 * @property string|null $parcel_company
 * @property string|null $delivery_date
 * @property string|null $guide_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exchange[] $exchange
 * @property-read int|null $exchange_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Refund[] $refund
 * @property-read int|null $refund_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sale[] $sales
 * @property-read int|null $sales_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereGuideNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereParcelCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereRateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereShippingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereSkydropxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShippingInformation extends Model
{
    protected $table = 'shipping_information';

    public function sales()
    {
        return $this->hasMany(
            Sale::class,
            'fk_id_shipping_information',
            'id'
        );
    }

    public function refund(){
        return $this->hasMany(
            Refund::class,
            'fk_id_shipping_info',
            'id'
        );
    }

    public function exchange(){
        return $this->hasMany(
            Exchange::class,
            'fk_id_shipping_info',
            'id'
        );
    }
}
