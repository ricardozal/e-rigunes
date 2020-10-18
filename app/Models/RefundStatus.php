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
 */
class RefundStatus extends Model
{
    protected $table = 'refund_status';
}
