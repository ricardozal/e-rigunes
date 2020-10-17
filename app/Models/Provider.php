<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Provider
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $business_name
 * @property string $seller_name
 * @property string $seller_phone
 * @property string $seller_email
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereBusinessName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereSellerEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereSellerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereSellerPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Provider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Provider extends Model
{
    protected $table = 'provider';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'business_name',
        'seller_name',
        'seller_phone',
        'seller_email',
    ];

}
