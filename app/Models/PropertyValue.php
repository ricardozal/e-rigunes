<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PropertyValue
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @property int $active
 * @property int $fk_id_property
 * @property-read \App\Models\Property $property
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $variants
 * @property-read int|null $variants_count
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue whereFkIdProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PropertyValue whereValue($value)
 * @mixin \Eloquent
 */
class PropertyValue extends Model
{

    protected $table = 'property_value';

    public $timestamps = false;

    protected $fillable = [
        'value',
        'name',
        'fk_id_property'
    ];

    public function property()
    {
        return $this->belongsTo(
            Property::class,
            'fk_id_property',
            'id'
        );
    }

    public function variants(){

        return $this->belongsToMany(
            Variant::class,
            'variant_property_value',
            'fk_id_property_value',
            'fk_id_variant'
        );

    }

    public static function asMap($propertyId = null)
    {
        if($propertyId != null) {
            return self::query()
                ->where('fk_id_property', $propertyId)
                ->get()
                ->pluck('value', 'id');
        } else {
            return self::all()->pluck('value', 'id');
        }
    }

}
