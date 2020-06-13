<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class LessonController extends Controller
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
	}

	public function edit()
	{
	}

	public function create() {
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store ()
	{
	}

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
	public function update ()
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
     * @return \Illuminate\Http\Response
     */
	public function destroy ()
	{
	}
}
