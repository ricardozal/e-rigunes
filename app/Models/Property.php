<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $name
 * @property int $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyValue[] $propertyValues
 * @property-read int|null $property_values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereName($value)
 * @mixin \Eloquent
 */
class Property extends Model
{

    protected $table = 'property';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function propertyValues()
    {
        return $this->hasMany(
            PropertyValue::class,
            'fk_id_property',
            'id'
        );
    }

    public static function asMap()
    {
        return self::all()->pluck('name', 'id');
    }

}
