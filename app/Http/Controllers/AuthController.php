<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Auth;
use Redirect;

class AuthController extends Controller {

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    public function login(Requests\LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if(Auth::validate(array('email' => $email, 'password' => $password)))
        {
            $user = $this->user->where('email','=',$email)->first();
            if(isset($user))
            {
                if($user->activated)
                {
                    if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
                    {
                        // The user is being remembered...
                        return redirect()->route('admin.dashboard');
                    }
                }
                else
                {
                    return redirect()->back()->with('error','User is not activated');
                }
            }
        }


        return redirect()->back()->with('error','Username or Password is incorrect');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index')->with('success','You are now logged out');
    }

}
