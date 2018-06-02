<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event_User extends Model
{
    protected $fillable = [
    	'user_id', 'event_id'
    ];

    protected $table = 'event_user';
}
