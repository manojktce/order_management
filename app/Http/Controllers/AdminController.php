<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function admin_login(Request $request)
    {
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $roleName = Auth::user()->roles->pluck('name')->first();
            if($roleName == "Admin")
            {
                return redirect()->route('adminHome')->with('message','Welcome to the Admin Portal');
            }
            else
            {
                //return redirect()->route('home');
                return view('home2');
            }
        }
        else
        {
            return redirect()->route('admin')->with('error','Email & Password credentials are wrong');
        }     
    }

    public function admin_logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('admin')->with('message','Logged out successfully');
    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function table()
    {
        return view('admin.table');
    }
}
