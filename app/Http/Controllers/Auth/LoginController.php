<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        //  data tidak hilang wlpun sudah logut
        $data =  session()->get('cart');
        Auth::logout();
        session()->put('cart', $data);
        return redirect('/');
        //         // data tidak hilang wlpun sudah logut
        //     //     $data =  session()->get('cart');

        //     //     $this->guard()->logout();

        //     //     request()->session()->invalidate();

        //     //     request()->session()->regenerate();

        //     //     session()->put('cart', $data);

        //     //     return $this->loggedOut($request) ?: redirect('/');
        //     // }
        //     // Auth::logout();

        //     // request()->session()->invalidate();

        //     // request()->session()->regenerateToken();

        //     // return redirect('/login');
        // }

    }
}
