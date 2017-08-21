<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consumer;
use App\ConsumerProfile;
use Auth;
use App\Http\Requests;
use Session;
use Image;
use Storage;


class ConsumerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        //$this->middleware('auth:consumers');
    }
    public function index()
    {
        $user = Auth::guard('consumers')->user();
        //no profile so must update
        if (is_null($user->consumerprofile_id)){
            return view('consumer.profile.update');    
        }
        else{
            $idz = $user->consumerprofile_id;
            $design = ConsumerProfile::find($idz);
            return view('consumer.profile.single')->withUser($user)->withDesign($design);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function create()
    {
        //
    } */

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

        $consumerprofile = new ConsumerProfile;
        $consumerprofile->aboutme = $request->aboutme;

        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();  //unique name
            $location = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(170,170)->save($location);

            $consumerprofile->image=$filename; //store filename into db

        }
        $consumerprofile->save();
        
        $user = Auth::user();
        Auth::user()->consumerprofile_id = $consumerprofile->id;
        $user->save();
        

        Session::flash('success', 'Your profile has been updated');

        return redirect()->route('consumerprofile.show',$user->username);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = Consumer::where('username',$username) -> first();
        $idz = $user->consumerprofile_id;
        $design = ConsumerProfile::find($idz);
        return view('consumer.profile.single')->withUser($user)->withDesign($design);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = Consumer::where('username', $username)->first();
        $id = $user->consumerprofile_id;
        $profile = ConsumerProfile::find($id);
        $aboutme = $profile->aboutme;
        return view('consumer.profile.edit')->withUser($user)->withProfile($profile)->withAboutme($aboutme);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $user = Consumer::where('username', $username)->first();
        $id = $user->consumerprofile_id;
        $profile = ConsumerProfile::find($id);

        $this->validate($request, array(
            'aboutme' => 'required|max:255',
            'featured_image' => 'sometimes|image'));

        $profile->aboutme = $request->input('aboutme');

         if($request->hasFile('featured_image')){
            //add photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();  //unique name
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(170,170)->save($location);
            $oldFilename = $profile ->image;
            $profile->image=$filename;

            Storage::delete($oldFilename);
        }
        $profile->save();

        Session::flash('success', 'Your profile has been updated');

        return redirect()-> route('consumerprofile.show', $user->username);
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
