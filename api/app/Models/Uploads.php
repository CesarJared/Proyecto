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

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }

    public function category(){
        return $this->hasOne(Categorys::class,'id','category_id');
    }
}
