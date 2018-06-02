<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Blood_Stock extends Model
{
    protected $fillable = [
    	'pmi_branch_id', 'blood_type_id', 'stock'
    ];

   	protected $table = 'blood_stocks';
}
