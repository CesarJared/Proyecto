<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    protected $fillable=[
        'uploads_id',
        'title',
        'slug'
    ];
}
