<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use Mail;
use Session;

class PagesController extends Controller{

	public function getIndex(){
		$posts = Post::orderBy('created_at', 'desc') -> limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
		# process varaible data or params
		# talk to the model
		# receive from the model
		# compile or process data
		# pass the data into correct view
	}

	public function getAbout(){
		
		return view('pages.about');
	}

	public function getContact(){
		return view('pages.contact');
	}

	public function postContact(Request $request){
		$this->validate($request, ['email' => 'required|email', 'message' => 'min:10', 'subject'=> 'min:3']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			//message is a var in laravel. so changed to body.
			'body' => $request ->message);

		//html email will be sent. 1st input = email message. 2nd pass in any data/info, 
		Mail::send('emails.contact',$data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('jinmingteo95@gmail.com');
			$message->subject($data['subject']);
			//$message->reply_from()
		});

		Session::flash('success', 'Your Form was Sent!');

		return redirect('/');
	}

	public function getLogin() {
		return view('pages.bothlogin');
	}
}