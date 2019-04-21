<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invites extends Model
{
    protected $fillable = [
    'email', 'token','name','sname','phne_number','role','groupid','invitedgroup','group_description','invite_by'
];
}
