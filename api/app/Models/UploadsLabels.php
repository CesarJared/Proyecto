<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadsLabels extends Model
{
    protected $fillable=[
        'upload_id',
        'title',
        'slug'
    ];
}
