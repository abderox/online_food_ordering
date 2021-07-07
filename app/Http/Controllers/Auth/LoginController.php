<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
//    public function showLoginForm()
//    {
//        // Get URLs
//        $urlPrevious = url()->previous();
//        $urlBase = url()->to('/');
   
//        // Set the previous url that we came from to redirect to after successful login but only if is internal
//        if(($urlPrevious != $urlBase . '/login') && (substr($urlPrevious, 0, strlen($urlBase)) === $urlBase)) {
//            session()->put('url.intended', $urlPrevious);
//        }
   
//        return view('auth.login');
//    }
    // public function redirectTo()
    // {
    //     if (auth()->user()->isUser() ) {
    //         return  'ordersdelivery';
    //     } else if (auth()->user()->isAdmin()) {
    //         return  'demandes';
    //     }
        
    // }
    protected function redirectTo()
    {
        if (auth()->user()->user_stat == 1) {
            return '/dash';
        }
        else if (auth()->user()->user_stat == 2){
            return '/mapresto';
        }
        else {
        return '/';
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
