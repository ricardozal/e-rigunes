<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ExchangeStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeStatus whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exchange[] $exchange
 * @property-read int|null $exchange_count
 */
class ExchangeStatus extends Model
{
    protected $table = 'exchange_status';

    public function exchange()
    {
        return $this->hasMany(
            Exchange::class,
            'fk_id_exchange_status',
            'id'
        );
    }
}
