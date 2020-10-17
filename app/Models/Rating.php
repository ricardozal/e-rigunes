<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Rating
 *
 * @property int $id
 * @property int $rating
 * @property string|null $comment
 * @property int $fk_id_buyer
 * @property int $fk_id_product
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereFkIdProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rating whereRating($value)
 * @mixin \Eloquent
 */
class Rating extends Model
{
    protected $table = 'rating';
    public $timestamps = false;
}
