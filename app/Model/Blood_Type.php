<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blood_Type extends Model
{
    protected $fillable = [
    	'label'
	];

   	protected $table = 'blood_types';
}
