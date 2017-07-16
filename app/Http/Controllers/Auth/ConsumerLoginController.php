<?php

namespace App\Http\Controllers\Auth;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumerLoginController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest:consumers');
	}
    public function showLoginForm(){
    	return view('auth.consumer-login');
    }

    public function login($request){
    	//validate form data
    	$this ->validate($request, ['email' => 'required|email', 'password' => 'required|min:6']);
    	//attempt to log user in 
    	if (Auth::guard('consumer') -> attempt(['email' => $request->email, 'password' => $request ->password],$request->$remember)){
    		return redirect()->intended(route('consumer.dashboard'));
    		//throw back to where u were trying to go
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));

    	//if successful, then redirect to their intended location
    	//else, redirect back to login with form data
    	
    }
}


