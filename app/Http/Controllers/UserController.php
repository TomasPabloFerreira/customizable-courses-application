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
        return view('user.grid', [
            'users' => User::get([
                'id',
                'name',
                'surname',
                'role_id',
                'email',
                'created_at',
                'updated_at',
            ]),
        ]);
    }
}
