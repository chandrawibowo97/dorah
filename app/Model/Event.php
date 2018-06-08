<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
    	'title','address','event_picture','from','to', 'place_id'
    ];

    protected $table = 'events';
}
