<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int id
 * @property int random_user_id
 * @property string gender
 * @property string birthdate
 * @property string registered_date
 * @property string phone
 * @property string cell
 * @property string nation
 */
class Timezone extends Model
{
    use HasFactory;
}
