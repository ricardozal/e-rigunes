<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VariantImage
 *
 * @property int $id
 * @property int $fk_id_color
 * @property int $fk_id_variant
 * @property int $fk_id_image
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages query()
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages whereFkIdColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages whereFkIdImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages whereFkIdVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|VariantHasImages whereId($value)
 * @mixin \Eloquent
 */
class VariantHasImages extends Model
{
    protected $table = 'variant_has_images';
    public $timestamps = false;
}
