<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Socialite;

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
     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $github_user_info = Socialite::driver('github')->stateless()->user();
        $user= $this->userCreateOrFind($github_user_info);
        Auth::login($user, true);
        return redirect($this->redirectTo);
        // print_r($user);  
    }

    public function userCreateOrFind($github_user_info){
        $user= User::where('provider_id',$github_user_info->id)->first();
        if(!$user){
            $user= new User;
            $user->name = $github_user_info->getNickname();
            $user->email = $github_user_info->getEmail();
            $user->provider_id = $github_user_info->getId();
            $user->save();
        }
        return $user; 
    }
    
}
