<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SaleStatus
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|SaleStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleStatus whereName($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SaleHistory[] $saleStatus
 * @property-read int|null $sale_status_count
 */
class SaleStatus extends Model
{
    protected $table = 'sale_status';

    const ORDERED = 1;
    const SHIPPED = 2;
    const DELIVERED = 3;


    public function saleStatus(){
        return $this->hasMany(
            SaleHistory::class,
            'fk_id_sale_status',
            'id'
        );
    }
}
