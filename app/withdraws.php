<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdraws extends Model
{
    protected $fillable = [
        'amount','description','user_id','group_id',
    ];
}
