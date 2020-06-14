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
	 * @param  int  $courseId
	 * @param  int  $sectionId
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index($courseId, $sectionId)
	{
		$lessons = Lesson::where('course_section_id', $sectionId)->get([
			'id',
			'title',
			'video_source',
			'duration'
		]);

		return view('course.section.lesson.grid', [
			'lessons' => $lessons,
			'courseId' => $courseId
		]);
	}

	public function edit()
	{
	}

	public function create($courseId, $sectionId) {
		return view('course.section.lesson.form', [
			'courseId' => $courseId,
			'sectionId' => $sectionId
		]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $courseId
	 * @param  int  $sectionId
	 * @return \Illuminate\Http\Response
	 */
	public function store (Request $request, $courseId, $sectionId)
	{
		$request->validate([
			'title' => 'between:6,64',
			'video_source' => 'between:16,128',
			'duration' => 'required'
		]);
		$lesson = new Lesson([
			'title' => $request->input('title'),
			'video_source' => $request->input('videoSource'),
			'duration' => $request->input('duration'),
			'course_section_id' => $sectionId
		]);
		$lesson->save();
		return redirect("/course/$courseId/section/$sectionId/lesson")
			->with('success', 'Lesson has been created'); 
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