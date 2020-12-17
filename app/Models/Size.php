<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

/**
 * App\Models\Size
 *
 * @property int $id
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Size whereValue($value)
 * @mixin \Eloquent
 */
class Size extends Model
{
    protected $table = 'size';

    protected $fillable = [
        'value'
    ];

    public $timestamps = false;

    public static function asMap()
    {
        return self::query()->orderBy('value')->pluck('value', 'id');
    }
}
