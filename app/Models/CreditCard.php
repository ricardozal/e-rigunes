<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CreditCard
 *
 * @property int $id
 * @property string $card_number
 * @property string $cardholder
 * @property string $expiration_month
 * @property string $expiration_year
 * @property string $payment_method_key
 * @property int $fk_id_buyer
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard query()
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereCardNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereCardholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereExpirationMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereExpirationYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereFkIdBuyer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CreditCard wherePaymentMethodKey($value)
 * @mixin \Eloquent
 */
class CreditCard extends Model
{
    protected $table = 'credit_card';

}
