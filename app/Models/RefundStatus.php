<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RefundStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundStatus whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Refund[] $refund
 * @property-read int|null $refund_count
 */
class RefundStatus extends Model
{
    protected $table = 'refund_status';

    public function refund()
    {
        return $this->hasMany(
            Refund::class,
            'fk_id_refund_status',
            'id'
        );
    }
}
