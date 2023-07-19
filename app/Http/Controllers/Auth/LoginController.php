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
    protected function redirectTo()
    {
        if (auth()->user()->role == 'dikes') {
            return '/dikes/home';
        } else if (auth()->user()->role == 'faskes') {
            return '/faskes/home';
        } else if (auth()->user()->role == 'pasien') {
            return '/pasien/home';
        } else if (auth()->user()->role == 'kotagor') {
            return '/kotagor/home';
        } else if (auth()->user()->role == 'kabbonbol') {
            return '/kabbonbol/home';
        } else if (auth()->user()->role == 'kabgor') {
            return '/kabgor/home';
        } else if (auth()->user()->role == 'kabbol') {
            return '/kabbol/home';
        } else if (auth()->user()->role == 'kabpoh') {
            return '/kabpoh/home';
        } else if (auth()->user()->role == 'kabgorut') {
            return '/kabgorut/home';
        } else {
            return 'login';
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
