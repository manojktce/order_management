<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;

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
}
