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
	 * @param  int  $courseId
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index($courseId)
	{
		$sections = CourseSection::where('course_id', $courseId)
			->get(['id', 'title']);

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
	 * @param  int $courseId
	 * @return \Illuminate\Http\Response
	 */
	public function store (Request $request, $courseId)
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $courseId
	 * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update (Request $request, $courseId, $id)
	{
		$request->validate(['title' => 'between:6,64']);
		$section = CourseSection::find($id);
		$section->title = $request->input('title');

		$section->save();
		return redirect("/course/$courseId/section")
			->with('success', 'Course section has been updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $courseId
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy ($courseId, $id)
	{
		$course = CourseSection::find($id);
		$course->delete();
		return redirect("/course/$courseId/section")
			->with('success', 'Course section has been deleted');
	}
}
