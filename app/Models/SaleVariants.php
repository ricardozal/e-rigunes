<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SaleVariants
 *
 * @property int $id
 * @property int $quantity
 * @property string $sale_price
 * @property int $fk_id_variant
 * @property int $fk_id_sale
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants query()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants whereFkIdSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants whereFkIdVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleVariants whereSalePrice($value)
 * @mixin \Eloquent
 */
class SaleVariants extends Model
{
    protected $table = 'sale_variants';
}
