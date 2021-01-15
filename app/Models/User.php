<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int id
 * @property string uuid
 * @property string title
 * @property string firstname
 * @property string lastname
 * @property string email
 * @property string password
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'title',
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            // TODO Fill here if you need
        });
    }

    public function randomUser()
    {
        return $this->hasOne(RandomUser::class);
    }

}
