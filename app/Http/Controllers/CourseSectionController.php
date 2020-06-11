<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseSection;

class CourseSectionController extends Controller
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
		$sections = CourseSection::get(['id', 'title']);

		return view('course.section.grid', ['sections' => $sections]);
	}

}
