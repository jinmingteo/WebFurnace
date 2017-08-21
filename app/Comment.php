<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Consumer;

class Comment extends Model
{
	protected $table= 'comments';
    public function post() {
    	return $this->belongsTo('App\Post');
    }
    public function gettype($username){
    	$consumer = Consumer::where('username', $username)->first();
    	if (is_null($consumer)) {
    		return 0;
    	}
    	else{
    		return 1;
    	}
    }
}