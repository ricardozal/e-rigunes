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
 * @property-read mixed $full_name
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
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Sale[] $sales
 * @property-read int|null $sales_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $address
 * @property-read int|null $address_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Refund[] $refund
 * @property-read int|null $refund_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Exchange[] $exchange
 * @property-read int|null $exchange_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CreditCard[] $creditCards
 * @property-read int|null $credit_cards_count
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
    ];

    protected  $appends = [
        'full_name'
    ];

    public function user(){
        return $this->belongsTo(
            User::class,
            'fk_id_user',
            'id'
        );
    }

    public function sales()
    {
        return $this->hasMany(
            Sale::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function address(){
        return $this->hasMany(
          Address::class,
          'fk_id_buyer',
          'id'
        );
    }

    public function refund(){
        return $this->hasMany(
            Refund::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function exchange(){
        return $this->hasMany(
            Exchange::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function creditCards(){

        return $this->hasMany(
            CreditCard::class,
            'fk_id_buyer',
            'id'
        );
    }

    public function getFullNameAttribute()
    {
        return $this->name.' '.$this->father_last_name.' '.$this->mother_last_name;
    }
}
