<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Purchase
 *
 * @property int $id
 * @property string $total_price
 * @property int $fk_id_provider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Variant[] $purchaseVariants
 * @property-read int|null $purchase_variants_count
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereFkIdProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Provider $provider
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseStatus[] $purchaseStatus
 * @property-read int|null $purchase_status_count
 * @property int $fk_id_purchase_status
 * @property-read \App\Models\PurchaseStatus $status
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereFkIdPurchaseStatus($value)
 */
class Purchase extends Model
{
    protected $table = 'purchase';

    public function purchaseVariants()
    {
        return $this->belongsToMany(
            Variant::class,
            'purchase_variants',
            'fk_id_purchase',
            'fk_id_variant'
        )->withPivot(['quantity','purchase_price']);
    }

    public function provider()
    {
        return $this->belongsTo(
            Provider::class,
            'fk_id_provider',
            'id'
        );
    }

    public function status()
    {
        return $this->belongsTo(
            PurchaseStatus::class,
            'fk_id_purchase_status',
            'id'
        );
    }
}
