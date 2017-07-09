<?php

namespace App\Http\Controllers;

use App\Post;

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
		$first = "Jinster";
		$last = "Cool";

		$fullname = $first . " " . $last;
		return view('pages.about')->withFullname($fullname);
	}

	public function getContact(){
		return view('pages.contact');
	}
}