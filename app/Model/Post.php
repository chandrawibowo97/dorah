<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','body','cover_image'
    ];
    protected $table = 'posts';
}
