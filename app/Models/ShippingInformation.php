<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShippingInformation
 *
 * @property int $id
 * @property string $skydropx_id
 * @property string $shipping_price
 * @property string $parcel_company
 * @property string $delivery_date
 * @property string $guide_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereDeliveryDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereGuideNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereParcelCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereShippingPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereSkydropxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShippingInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ShippingInformation extends Model
{
    protected $table = 'shipping_information';
}
