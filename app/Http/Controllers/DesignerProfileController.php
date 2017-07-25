<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\DesignerProfile;
use Auth;
use App\Http\Requests;
use Session;
use Image;
use Storage;

class DesignerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        //no profile so must update
        if (is_null($user->designerprofile_id)){
            return view('designer.profile.update');    
        }
        else{
            return view('designer.profile.single')->withUser($user);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'aboutme' => 'required|max:255',
            'featured_image' => 'sometimes|image'));

        $designerprofile = new DesignerProfile;
        $designerprofile->aboutme = $request->aboutme;

        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();  //unique name
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $designerprofile->image=$filename; //store filename into db

        }

        $designerprofile->save();
        $user = Auth::user();
        $user->designerprofile_id = $designerprofile->id;

        Session::flash('success', 'Your profile has been updated');

        return redirect()->route('designerprofile.show',$user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        return view('designer.profile.single')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
