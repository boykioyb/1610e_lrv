<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * [postLogin description]
     * @author ThienTh
     * @date 2017-05-17
     * @return redirect
     */
    public function postLogin(LoginRequest $request){
        // 1. Check auth info with db
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            // 2. auto create session with Auth::user()
            return redirect(route('dashboard'));
        }else{
            return redirect(route('login'))->with('msg', 'Wrong username/password');
        }
    }
}
