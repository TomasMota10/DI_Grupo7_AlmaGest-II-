<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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
    protected $redirectTo = "/login";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user){

            if($user->email_confirmed == 1){

                if($user->actived == 1){

                    if($user->type == 'a'){
                        return redirect('/usuarios');
                    }
                    else if($user->type == 'u'){
                        return redirect('/company');
                    }
                    
                }
                else{
                    return redirect('/login')->with('message','El Administrador activara su cuenta proximamente...');
                }

            }
            else{
                return redirect('/login')->with('message','Mire su correo para confirmar su cuenta.');
            }
    
    }
}
