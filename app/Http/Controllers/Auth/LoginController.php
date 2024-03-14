<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


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


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function redirectTo()
    {
        // Redirect admin to admin page and user to user page

        return route('home');

    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_active == 0) {
            // Deactivate the authenticated user and log them out
            $this->guard()->logout();

            // Invalidate the session
            $request->session()->invalidate();

            // Redirect to the error page or login page with error message
            return abort(404);
        }

        return redirect()->intended($this->redirectPath());
    }

}
