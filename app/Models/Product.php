<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $weight
 * @property int $height
 * @property int $width
 * @property int $length
 * @property int $active
 * @property int $fk_id_provider
 * @property int $fk_id_category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read mixed $rating_average
 * @property-read \App\Models\Provider $provider
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Rating[] $ratings
 * @property-read int|null $ratings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $variants
 * @property-read int|null $variants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFkIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFkIdProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLength($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWidth($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Variant $first_variant
 * @property string $public_price
 * @property string $distributor_price
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDistributorPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePublicPrice($value)
 */
class Product extends Model
{

    use HasFactory;

    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'fk_id_provider',
        'fk_id_category',
        'width',
        'height',
        'length',
        'weight'
    ];

    protected $appends = [
        'rating_average',
    ];

    public function variants()
    {
        return $this->hasMany(
            Variant::class,
            'fk_id_product',
            'id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'fk_id_category',
            'id'
        );
    }

    public function provider()
    {
        return $this->belongsTo(
            Provider::class,
            'fk_id_provider',
            'id'
        );
    }

    public function ratings(){

        return $this->hasMany(
            Rating::class,
            'fk_id_product',
            'id'
        );

    }

    public function getRatingAverageAttribute(){

        return number_format($this->ratings()->average('rating'),1);

    }
}
