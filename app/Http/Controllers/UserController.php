<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;

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
}

