<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    /*public function index(Request $request)
    {
        //User::onlyTrashed()->restore();
        //$users = User::withTrashed()->get();
        
        // $users = User::get();
        $info = array('title'=>'Users');
        // return view('admin.users.index',compact('users','info'));

        if ($request->ajax()) {
            $user = User::latest();
            
            return Datatables::of($user)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                            
                            $btn ='<a href="'. route('users.show', $row->id) .'" class="btn btn-outline-primary"><i class="fa fa-eye"></i></a>
                            <a href="' .route('users.edit', $row->id) .'" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                            <a href="' .route('users.delete', $row->id) .'" class="btn btn-outline-primary" onclick="return confirm_delete();"><i class="fa fa-trash"></i></a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        return view('admin.users.index',compact('info'));
    }*/

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $info = array('title'=>'Users');
        return view('admin.user.create',compact('info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required',
        ]);
        $user = User::create($request->all());
        $user->assignRole($request->input('user_type'));
  
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
  
        return redirect()->route('user.index')->with('message', 'User Record Created Successfully.');;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $info = array('title'=>'Users');
        return view('admin.user.show',compact('user','info'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $info = array('title'=>'Users');
        return view('admin.user.edit',compact('user','info'));
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
        
        $user->assignRole($request->input('user_type'));

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $user->addMediaFromRequest('image')->toMediaCollection('images');
        }
  
        return redirect()->route('user.index')->with('message', 'User record updated successfully.');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('error', 'User Record Deleted Successfully.');
    }

    public function delUsers(string $id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('error', 'User Record Deleted Successfully.');
    }
}
