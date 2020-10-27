<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 */
class Variant extends Model
{

    use HasFactory;

    protected $table = 'variant';

    protected $fillable = [
        'sku',
        'public_price',
        'distributor_price',
        'fk_id_product'
    ];

    protected $appends = [
        'product_name',
        'is_active_product',
        'featured_image',
        'classification_product',
    ];

    public function getProductNameAttribute(){
        return $this->product->name;
    }

    public function getIsActiveProductAttribute(){
        return $this->product->active;
    }

    public function getFeaturedImageAttribute()
    {
        return $this->variantImages()->where('featured', 1)->first()->absolute_image_url;
    }

    public function getClassificationProductAttribute(){

        return $this->product->category->name;
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
