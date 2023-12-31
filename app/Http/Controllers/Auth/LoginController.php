<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        if(Auth::user())
        {
            return redirect('/home');
        }
        
        $input = $request->all();
     
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            // if (auth()->user()->type == 'admin')
            $roleName = Auth::user()->roles->pluck('name')->first();
            if($roleName == "Admin")
            {
                return redirect()->route('adminHome');
            }
            else
            {
                //return redirect()->route('home');
                return view('home');
            }
        }
        else
        {
            return redirect()->route('login')->with('error','Invalid Credentials.');
        }     
    }

    public function logout(Request $request) { 
            $items = session()->get('cart'); 
            $this->guard()->logout();
            //$request->session()->invalidate();
            $request->session()->regenerate();
            session(['cart' => $items]);
            return $this->loggedOut($request) ?: redirect('/');
        }
}
