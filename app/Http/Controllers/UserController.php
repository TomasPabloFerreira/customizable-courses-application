<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Hash;

class UserController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
    {
		$this->middleware('auth');
    }

	/**
	 * Show the users table.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$users = User::with('role')
					->get([
						'id',
						'name',
						'surname',
						'role_id',
						'email',
						'created_at',
						'updated_at',
					]);

		return view('user.grid', ['users' => $users]);
    }

	public function create() {
		return view('user.form', ['roles' => Role::getSelector()]);
	}

	public function edit($id)
	{
		$user = User::findOrFail($id, ['name', 'surname', 'email', 'role_id']);
		return view('user.form', [
			'user' => $user,
			'roles' => Role::getSelector()
		]);
	}


	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'between:3,32',
			'surname' => 'between:3,32',
			'email' => 'email',
			'role' => 'exists:App\Role,id',
			'password' => 'between:8,64'
		]);
		$user = new User([
			'name' => $request->input('name'),
			'surname' => $request->input('surname'),
			'email' => $request->input('email'),
			'role_id' => $request->input('role'),
			'password' => Hash::make($request->input('password'))
		]);

		$user->save();
		$user->save();
		return redirect('/user')->with('success', 'User has been created');
	}
}


