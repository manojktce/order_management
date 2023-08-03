<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
//use Socialite;
use Laravel\Socialite\Facades\Socialite;


class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        // redirect user to "login with Google account" page
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
            // get user data from Google
            //$user = Socialite::driver('google')->user();
            $user = Socialite::driver('google')->stateless()->user();
            
            // find user in the database where the social id is the same with the id provided by Google
            $finduser = User::where('social_id', $user->id)->first();

            if ($finduser)  // if user found then do this
            {
                // Log the user in
                Auth::login($finduser);

                // redirect user to dashboard page
                return redirect('/home');
                //return view('home');
            }
            else
            {
                // if user not found then this is the first time he/she try to login with Google account
                // create user data with their Google account data
                $split_name = explode(" ", $user->name);
                
                $newUser = User::create([
                    'first_name' => $split_name[0],
                    'last_name' => $split_name[1],
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',  // the social login is using google
                    'password' => bcrypt('12345678'),  // fill password by whatever pattern you choose
                ]);

                $newUser->assignRole('User');

                Auth::login($newUser);

                //return redirect('/dashboard');
                return redirect('/home');
            }
    }
}