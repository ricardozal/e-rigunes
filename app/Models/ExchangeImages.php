<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ExchangeImages
 *
 * @property int $id
 * @property string $url_image
 * @property int $fk_id_exchange
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages whereFkIdExchange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeImages whereUrlImage($value)
 * @mixin \Eloquent
 */
class ExchangeImages extends Model
{
    protected $table = 'exchange_images';
}
