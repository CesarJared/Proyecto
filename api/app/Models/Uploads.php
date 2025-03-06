<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uploads extends Model
{
    protected $fillable=[
        'user_id',
        'category_id',
        'img',
        'title',
        'description',
        'slug'
    ];
}
