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
 * @property int $fk_id_color
 * @property int $fk_id_variant
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */

class VariantImage extends Model
{
    protected $table = 'variant_has_images';

    protected $fillable = [
        'fk_id_color',
        'fk_id_variant',
        'fk_id_image'
    ];
}
