<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int id
 * @property int user_id
 * @property string gender
 * @property string birthdate
 * @property string registered_date
 * @property string phone
 * @property string cell
 * @property string nation
 */
class RandomUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'gender',
        'birthdate',
        'registered_date',
        'phone',
        'cell',
        'nation',
    ];

    public function user()
    {
        return $this->belongsTo(RandomUser::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }

}
