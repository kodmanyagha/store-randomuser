<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int id
 * @property int location_id
 * @property string offset
 * @property string description
 */
class Timezone extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'location_id',
        'offset',
        'description',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
