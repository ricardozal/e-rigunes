<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DataContactWebsite
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite query()
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DataContactWebsite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DataContactWebsite extends Model
{
    protected $table = 'data_contact_website';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'message'
    ];
}
