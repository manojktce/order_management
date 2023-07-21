<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //User::onlyTrashed()->restore();
        //$users = User::withTrashed()->get();

        $users = User::get();
        $info = array('title'=>'Users');
        return view('admin.users.index',compact('users','info'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = array('title'=>'Users');
        return view('admin.users.create',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'password'      => 'required',
        ]);
  
        $user = User::create($request->all());
  
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
  
        return redirect()->route('users.index')->with('message', 'User Record Created Successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $info = array('title'=>'Users');
        return view('admin.users.show',compact('user','info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $info = array('title'=>'Users');
        return view('admin.users.edit',compact('user','info'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
        ]);
        
        $user = User::find($id);
        $user->update($request->all());
  
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
  
        return redirect()->route('users.index')->with('message', 'User record updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('error', 'User Record Deleted Successfully.');
    }
}
