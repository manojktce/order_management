<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $result['user'] = User::find(Auth::user()->id);
        return view('profile.main',compact('result'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->back()->with('message','Profile Updated');
    }

    public function upload(Request $request, string $id)
    {
        $model = User::find($id);
        /* Upload cover image for the product start*/
        if($request->hasFile('file') && $request->file('file')->isValid()){
            /*if($id && $request->hasFile('file'))
            {
                $model->clearMediaCollection('profile_pictures'); // delete previous uploaded image in db
            }*/
            $model->addMediaFromRequest('file')->toMediaCollection('profile_pictures');
        }
        /* Upload cover image for the product end*/
        $result['user'] = $model;
        return view('profile.partials.image_form',compact('result'));
    }

    public function readFiles(){ 
        
        $files_info = []; 
        $file_ext = array('png','jpg','jpeg'); 

        $model = User::find(12);
        $images = $model->getMedia('profile_pictures');
        // Read files
        foreach ($images as $file) { 
           $files_info[] = $file;
        } 
        return response()->json($files_info); 
     }



}
