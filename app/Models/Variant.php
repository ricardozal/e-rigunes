<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Variant
 *
 * @property int $id
 * @property string $sku
 * @property string $public_price
 * @property string $distributor_price
 * @property int $active
 * @property int $fk_id_product
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $classification_product
 * @property-read mixed $featured_image
 * @property-read mixed $is_active_product
 * @property-read mixed $product_name
 * @property-read mixed $properties_list
 * @property-read \App\Models\Product $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PropertyValue[] $propertyValues
 * @property-read int|null $property_values_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\VariantImage[] $variantImages
 * @property-read int|null $variant_images_count
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereDistributorPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereFkIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant wherePublicPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereSku($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Variant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Variant extends Model
{
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
        'properties_list'
    ];

    public function getProductNameAttribute(){
        return $this->product->name;
    }

    public function getIsActiveProductAttribute(){
        return $this->product->active;
    }

    public function getPropertiesListAttribute()
    {
        $propertyValues = $this->propertyValues;
        $list = '';
        $len = count($propertyValues);
        $i = 0;
        foreach ($propertyValues as $propertyValue)
        {
            $list .= $propertyValue->property->name.': '.$propertyValue->params;
            if ($i != $len - 1) {
                $list .= ', ';
            }
            $i++;
        }

        return $list;
    }

    public function getFeaturedImageAttribute()
    {
        return VariantImage::where('fk_id_variant', $this->id)
            ->where('featured', 1)->first()->absolute_image_url;
    }

    public function getClassificationProductAttribute(){

        return $this->product->classification->name;
    }

    public function variantImages()
    {
        return $this->hasMany(
            VariantImage::class,
            'fk_id_variant',
            'id'
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

    public function propertyValues(){

        return $this->belongsToMany(
            PropertyValue::class,
            'variant_property_value',
            'fk_id_variant',
            'fk_id_property_value'
        );

    }

}
