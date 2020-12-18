<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $name
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Color whereValue($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VariantHasImages[] $variantsImage
 * @property-read int|null $variants_image_count
 */
class Color extends Model
{
    protected $table = 'color';

    protected $fillable = [
        'name',
        'value'
    ];

    public $timestamps = false;

    public function variantsImage()
    {
        return $this->hasMany(
            VariantHasImages::class,
            'fk_id_color',
            'id'
        );
    }

    public static function asMap()
    {
        return self::query()->orderBy('name')->pluck('name', 'id');
    }
}
