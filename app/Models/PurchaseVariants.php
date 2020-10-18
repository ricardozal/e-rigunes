<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PurchaseVariants
 *
 * @property int $id
 * @property int $quantity
 * @property string $purchase_price
 * @property int $fk_id_variant
 * @property int $fk_id_purchase
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants whereFkIdPurchase($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants whereFkIdVariant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseVariants whereQuantity($value)
 * @mixin \Eloquent
 */
class PurchaseVariants extends Model
{
    protected $table = 'purchase_variants';
}
