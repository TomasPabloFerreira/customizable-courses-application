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

	public function edit($courseId, $id)
	{
		$section = Section::findOrFail($id);

		return view('course.section.form', [
			'courseId' => $courseId,
			'section' => $section
		]);
	}

	public function create($courseId) {
		return view('course.section.form', ['courseId' => $courseId]);
	}
}
