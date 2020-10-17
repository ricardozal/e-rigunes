<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RefundImages
 *
 * @property int $id
 * @property string $url_image
 * @property int $fk_id_refund
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages query()
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages whereFkIdRefund($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RefundImages whereUrlImage($value)
 * @mixin \Eloquent
 */
class RefundImages extends Model
{
    protected $table = 'refund_images';
}
