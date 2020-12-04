<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PurchaseStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseStatus whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseHistory[] $purchaseStatus
 * @property-read int|null $purchase_status_count
 */
class PurchaseStatus extends Model
{

    protected $table = 'purchase_status';

    const ORDERED = 1;
    const SHIPPED = 2;
    const DELIVERED = 3;

}
