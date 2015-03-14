<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use Redirect;

class AuthController extends Controller {


    public function login(Requests\LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember))
        {
            // The user is being remembered...
            return redirect()->route('admin.dashboard');
        }

        return redirect('admin')->with('error','Username or Password is incorrect');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.index')->with('success','You are now logged out');
    }

}
