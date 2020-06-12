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
		$section = CourseSection::findOrFail($id);

		return view('course.section.form', [
			'courseId' => $courseId,
			'section' => $section
		]);
	}

	public function create($courseId) {
		return view('course.section.form', ['courseId' => $courseId]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store($courseId, Request $request)
	{
		$request->validate(['title' => 'between:6,64']);
		$section = new CourseSection([
			'title' => $request->input('title'),
			'course_id' => $courseId
		]);

		$section->save();
		return redirect("/course/$courseId/section")
			->with('success', 'Course section has been created');
	}


}
