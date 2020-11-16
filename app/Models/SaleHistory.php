<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SaleHistory
 *
 * @property int $id
 * @property int $fk_id_sale_status
 * @property int $fk_id_sale
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory whereFkIdSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory whereFkIdSaleStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SaleHistory whereId($value)
 * @mixin \Eloquent
 */
class SaleHistory extends Model
{
    protected $table = 'sale_history';
    public $timestamps = false;
}
