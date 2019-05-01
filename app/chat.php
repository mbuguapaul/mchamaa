<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    // app/Message.php

/**
 * Fields that are mass assignable
 *
 * @var array
 */
protected $fillable = ['message','user_id','groupid'];


/**
 * A message belong to a user
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

}
