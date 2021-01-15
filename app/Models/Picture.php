<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property int random_user_id
 * @property string large
 * @property string medium
 * @property string thumbnail
 */
class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'random_user_id',
        'large',
        'medium',
        'thumbnail',
    ];

    public function randomUser()
    {
        return $this->belongsTo(RandomUser::class);
    }
}
