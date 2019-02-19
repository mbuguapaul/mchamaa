<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class groups extends Model
{
    protected $fillable = [
        'group_name','created_by','objectives','amount', 'penalty','pay_number','period_of_contribution',
    ];
}
