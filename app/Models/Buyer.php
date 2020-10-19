<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Buyer
 *
 * @property int $id
 * @property string $name
 * @property string $father_last_name
 * @property string $mother_last_name
 * @property string $birthday
 * @property string $phone
 * @property string|null $customer_stripe_id
 * @property int $active
 * @property int $fk_id_user
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereCustomerStripeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereFatherLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereFkIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereMotherLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Buyer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Buyer extends Model
{
    protected $table = 'buyer';

    protected $fillable = [
        'name',
        'father_last_name',
        'mother_last_name',
        'birthday',
        'phone',
        'customer_stripe_id'
    ];
}
