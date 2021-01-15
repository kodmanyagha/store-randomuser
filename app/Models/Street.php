<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int id
 * @property int location_id
 * @property int number
 * @property string name
 */
class Street extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'location_id',
        'number',
        'name',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
