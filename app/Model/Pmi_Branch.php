<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pmi_Branch extends Model
{
    protected $fillable = [
    	'name', 'address', 'district_id', 'postcode', 'lat', 'lng'
    ];

    protected $table = 'pmi_branches';
}
