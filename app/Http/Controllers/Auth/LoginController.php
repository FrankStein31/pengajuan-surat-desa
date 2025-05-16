<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Determine where to redirect users after login based on their role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'kepala_desa' || auth()->user()->role === 'sekretaris_desa') {
            return '/dashboard';
        } elseif (auth()->user()->role === 'masyarakat') {
            return '/userdashboard';
        }

        return '/dashboard'; // Default redirect
    }
}
