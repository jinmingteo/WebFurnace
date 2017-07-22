<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    protected $table = 'deadline';

    public function posts() {
    	return $this-> hasMany('App\Post');
    }
}