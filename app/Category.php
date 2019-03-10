<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    protected $fillable = ['title'];

    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }
}
