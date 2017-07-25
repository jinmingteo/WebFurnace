<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function getProfile($username){
    	return view('designer.profile');
    }	
}
