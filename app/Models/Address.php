<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Address
 *
 * @property int $id
 * @property string $street
 * @property string $zip_code
 * @property string $ext_num
 * @property string|null $int_num
 * @property string $colony
 * @property string $city
 * @property string $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereColony($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereExtNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereIntNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereZipCode($value)
 * @mixin \Eloquent
 * @property-read mixed $full_address
 * @property string|null $country
 * @property string $references
 * @property int $active
 * @property int $fk_id_buyer
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereReferences($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sale[] $sales
 * @property-read int|null $sales_count
 */

class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'street','zip_code','ext_num','int_num','colony','city','state','country','references'
    ];

    protected  $appends = [
        'full_address'
    ];

    public function sales()
    {
        return $this->hasMany(
            Sale::class,
            'fk_id_shipping_address',
            'id'
        );
    }

    public function getFullAddressAttribute()
    {
        return $this->street.', '.$this->ext_num.', '.$this->int_num.', '.$this->colony.', '.$this->zip_code.', '.$this->city.', '.$this->state.', '.$this->country.', '.$this->references;
    }
}
