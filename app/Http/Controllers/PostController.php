<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use App\Category;
use App\Deadline;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth:consumers');
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // creat a var and store all the blog posts in it from the database
        $posts = Post::orderBy('id','desc')->paginate(10);
        //descending number. latest post first
        //return a view and pass in the above var
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $deadlines = Deadline::all();
        return view('posts.create') -> withCategories($categories)->withDeadlines($deadlines);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data
        $this->validate($request,array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',//|unique:posts, slug',
                'category_id' => 'required|integer',
                'othercategory'=> 'required_if: category_id,13|max:255',
                'budget'=>'required',
                'body' => 'required',
                'deadline_id'=> 'required|integer',
                'featured_image' => 'sometimes|image'
            ));
        //store in the database

        $post = new Post;
        $post->title = $request->title;
        $post ->slug = $request->slug;
        $post->category_id=$request->category_id;
        $post->deadline_id=$request->deadline_id;
        $post->budget=$request->budget;
        $post->body = Purifier::clean($request->body);

        if ($request->has('othercategory')){
          $post->othercategory=$request->othercategory;
        }

        //save image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();  //unique name
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image=$filename; //store filename into db
        }

        $post->save();
        Session::flash('success','The post was successfully saved');
        //redirect to another page

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // find the post in the db and save as a var
        $post = Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach($categories as $category){
            $cats[$category->id] = $category->name;
        }
        $deadlines = Deadline::all();
        $deads = [];
        foreach($deadlines as $deadline) {
            $deads[$deadline->id] = $deadline->name;
        }
        // return the view and pass in the var as we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats)->withDeadlines($deads);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $post = Post::find($id);
        
        $this->validate($request,array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255',//|unique:posts, slug',
                'category_id' => 'required|integer',
                'othercategory'=> 'required_if: category_id,13|max:255',
                'budget'=>'required',
                'body' => 'required',
                'deadline_id'=> 'required|integer',
                'featured_image' => 'sometimes|image'
            ));

        // Save the data to the db

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->budget = $request->input('budget');
        $post->body = Purifier::clean($request->input('body'));
        $post->deadline_id = $request->input('deadline_id');

        if ($request->has('othercategory')){
          $post->othercategory=$request->input('othercategory');
        }

        if($request->hasFile('featured_image')){
            //add photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();  //unique name
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $oldFilename = $post ->image;
            $post->image=$filename;

            Storage::delete($oldFilename);

            //update db
            //delete photo

        }

        $post->save();

        // set flash data with success message

        Session::flash('success', 'This post was successfully saved.');

        //redirect w flash data to posts.show

        return redirect()-> route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post -> delete();
        Storage::delete($post->image);

        Session::flash('success', 'The post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
