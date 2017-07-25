<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesignerProfile extends Model
{
    protected $table = 'designerprofile';

    //one to one relationship

    public function user(){
    	return $this->hasOne('App\User');
    }
}
