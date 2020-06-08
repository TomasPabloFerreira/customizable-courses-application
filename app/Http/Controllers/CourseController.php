<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
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
		$courses = Course::with('role')
					->get([
						'id',
						'title',
						'description',
						'image_source'
					]);

		return view('course.grid', ['courses' => $courses]);
	}

	public function edit($id)
	{
	}

	public function create()
	{
		return view('course.form');
	}
}


