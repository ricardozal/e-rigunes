<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VariantImage
 *
 * @property int $id
 * @property string $url
 * @property int $featured
 * @property int $position
 * @property int $fk_id_variant
 * @property-read mixed $absolute_image_url
 * @property-read \App\Models\Variant $variant
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage whereFkIdVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantImage whereUrl($value)
 * @mixin \Eloquent
 */
class VariantImage extends Model
{

    protected $table = 'variant_image';

    public $timestamps = false;

    protected $fillable = [
        'url',
        'featured',
        'position',
        'fk_id_image_type',
        'fk_id_variant'
    ];

    protected $appends = [
        'absolute_image_url'
    ];

    public function variant()
    {
        return $this->belongsTo(
            Variant::class,
            'fk_id_variant',
            'id'
        );
    }

    public function getAbsoluteImageUrlAttribute()
    {
        return asset($this->url);
    }

}
