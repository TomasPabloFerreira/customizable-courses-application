<?php

namespace App\Http\Controllers;

use App\User;

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

	public function edit($id)
	{
		return view('user.form', [
			'user' => User::findOrFail($id, [
				'name', 'surname', 'email', 'role_id' 
			])
		]);
	}
}

