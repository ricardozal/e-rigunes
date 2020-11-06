<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use BinaryCats\Sku\HasSku;
use Illuminate\Database\Eloquent\Model;



/**
 * App\Models\Variant
 *
 * @property int $id
 * @property string $sku
 * @property int $active
 * @property int $fk_id_product
 * @property int $fk_id_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $classification_product
 * @property-read mixed $featured_image
 * @property-read mixed $is_active_product
 * @property-read mixed $product_name
 * @property-read \App\Models\Product $product
 * @property-read \App\Models\Size $size
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Image[] $variantImages
 * @property-read int|null $variant_images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereFkIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereFkIdSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Color[] $color
 * @property-read int|null $color_count
 * @property-read mixed $color_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Purchase[] $purchases
 * @property-read int|null $purchases_count
 */
class Variant extends Model
{

    use HasSku;
    use HasFactory;

    protected $table = 'variant';

    protected $appends = [
        'featured_image',
        'color_name'
    ];

    public function getColorNameAttribute()
    {
        return $this->color()->select(['color.id','color.name','color.value'])->groupBy('color.id')->first();
    }

    public function getFeaturedImageAttribute()
    {
        return $this->variantImages()->where('featured', 1)->first()->absolute_image_url;
    }

    public function variantHasImages(){

        return $this->hasMany(
            VariantHasImages::class,
            'fk_id_variant',
            'id'
        );

    }

    public function variantImages()
    {
        return $this->belongsToMany(
            Image::class,
            'variant_has_images',
            'fk_id_variant',
            'fk_id_image'
        );
    }

    public function product()
    {
        return $this->belongsTo(
            Product::class,
            'fk_id_product',
            'id'
        );
    }

    public function size()
    {
        return $this->belongsTo(
            Size::class,
            'fk_id_size',
            'id'
        );
    }

    public function color()
    {
        return $this->belongsToMany(
            Color::class,
            'variant_has_images',
            'fk_id_variant',
            'fk_id_color'
        );
    }

    public function purchases()
    {
        return $this->belongsToMany(
            Purchase::class,
            'purchase_variants',
            'fk_id_variant',
            'fk_id_purchase'
        )->withPivot(['quantity','purchase_price']);
    }

}
