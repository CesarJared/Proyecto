<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subs extends Model
{
    protected $fillable = [
        'user_id',
        'active',
        'end_date',
    ];
}
