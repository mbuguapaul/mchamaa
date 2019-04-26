<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_processing extends Model
{
     protected $fillable = [
        'amount','phone_number','name','user_id','group_id'
    ];
}
