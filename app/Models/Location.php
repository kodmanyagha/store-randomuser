<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int id
 * @property int random_user_id
 * @property string city
 * @property string state
 * @property string country
 * @property int postcode
 * @property double latitude
 * @property double longitude
 */
class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'random_user_id',
        'city',
        'state',
        'country',
        'postcode',
        'latitude',
        'longitude',
    ];

    public function randomUser()
    {
        return $this->belongsTo(RandomUser::class);
    }
}
