<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group_members extends Model
{
    protected $fillable = [
        'group_id','User_level','active', 'user_id',
    ];
}
