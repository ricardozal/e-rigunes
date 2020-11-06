<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Image
 *
 * @property int $id
 * @property string $url
 * @property int $featured
 * @property-read mixed $absolute_image_url
 * @method static \Illuminate\Database\Eloquent\Builder|Image newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Image query()
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Image whereUrl($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VariantHasImages[] $variantHasImages
 * @property-read int|null $variant_has_images_count
 */
class Image extends Model
{
    protected $table = 'image';
    public $timestamps = false;

    protected $appends = [
        'absolute_image_url'
    ];

    public function getAbsoluteImageUrlAttribute()
    {
        return asset($this->url);
    }

    public function variantHasImages(){
        return $this->hasMany(
            VariantHasImages::class,
            'fk_id_image',
            'id'
        );
    }
}
