<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{	
	public function getIndex(){
		$posts = Post::paginate(10);

		return view('blog.index')-> withPosts($posts);
    }


    public function getSingle($slug){
    	// fetch from DB based on lsug
    	$post = Post::where('slug', '=', $slug)->first();
    	//first is the same as get but it will be faster
    	//return view and pass in the post object

    	return view('blog.single')-> withPost($post);
    }
}
