<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

use Illuminate\Http\Request;

class AdminController extends Controller {


    public function __construct()
    {
        if(Auth::check())
        {
            $this->user = Auth::user();
        }
    }

	public function home()
	{
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
	}



    public function dashboard()
    {
        return view('admin.dashboard',
            array(
                'user' => $this->user
            )
            );
    }


}
