<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DesignerController extends Controller
{
    public function getProfile($username){
    	$user = User::where('username', '=', $username)->first();
    	return view('designer.profile')->withUser($user);
    }	
}
