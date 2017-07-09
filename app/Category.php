<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    //one to many relationship

    public function posts(){
    	return $this->hasMany('App\Post');
    }
}
