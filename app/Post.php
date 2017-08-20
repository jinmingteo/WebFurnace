<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Deadline;

class Post extends Model
{
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function deadline() {
    	return $this->belongsTo('App\Deadline');
    }
    public function comments() {
    	return $this->hasMany('App\Comment');
    }
    public function poster() {
    	return $this->belongsTo('App\Consumer');
    }
    public function scopeSearch($query, $search) {
        return $query->where('title', 'LIKE', '%$search%');
    }
    public function getdeadline($id){
        $deadline = Deadline::where('id', $id)->value('name');
        return $deadline;
    }
}
