<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion
 *
 * @property int $id
 * @property string $expiration_date
 * @property string|null $coupon_code
 * @property int $max_number_swaps
 * @property int $swaps
 * @property int $is_percentage
 * @property string $value
 * @property string|null $min_amount
 * @property string|null $description
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCouponCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereExpirationDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereIsPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereMaxNumberSwaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereSwaps($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promotion whereValue($value)
 * @mixin \Eloquent
 */
class Promotion extends Model
{

    protected $table = 'promotion';

    protected $fillable = [
        'expiration_date',
        'coupon_code',
        'max_number_swaps',
        'swaps',
        'is_percentage',
        'value',
        'min_amount',
        'description'
    ];

    public static function validateExist($coupon)
    {
        return Promotion::whereCouponCode($coupon)->first();
    }

    public function isActive()
    {
        if ($this->active === null) return false;
        return $this->active;
    }

    public function expirationIsValid()
    {
        if ($this->expiration_date === null) return true;
        return Carbon::now()->lessThanOrEqualTo($this->expiration_date);
    }

    public function usagesIsValid()
    {
        if ($this->max_number_swaps === null) return true;
        return $this->swaps * 1 < $this->max_number_swaps * 1;
    }

    public static function usePromo($coupon)
    {
        $coupon = Promotion::whereCouponCode($coupon)->first();
        $coupon->swaps = $coupon->swaps * 1 + 1;
        $coupon->save();
    }

}
