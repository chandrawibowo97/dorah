<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'title','address','event_picture', 'place_id'
    ];
    protected $dates = ['from', 'to'];
    protected $table = 'events';
}
