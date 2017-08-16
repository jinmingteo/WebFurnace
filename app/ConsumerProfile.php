<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConsumerProfile extends Model
{
    protected $table = 'consumerprofile';

    //one to one relationship

    public function user(){
    	return $this->hasOne('App\User');
    }

}
