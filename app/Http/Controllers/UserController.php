<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\User;
use Event;

class UserController extends Controller {


    public function __construct(User $user)
    {
        $this->users =  $user;
        $this->user = Auth::getUser();
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = $this->users->all();

        return view('admin.user.index', array('users' => $user, 'user' => $this->user));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


    public function reset($id)
    {
        $user = $this->users->find($id);
        if(isset($user))
        {
            Event::fire('user.reset', $user->id);
        }

        return redirect()->back()->with('error','User was not found');
    }

}
