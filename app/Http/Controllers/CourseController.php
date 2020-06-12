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
		$courses = Course::get([
			'id',
			'title',
			'description',
			'image_source'
		]);

		return view('course.grid', ['courses' => $courses]);
	}

	public function edit($courseId, $id)
	{
		$course = Course::findOrFail($id);
		
		return view('course.form', [
			'course_id' => $courseId
			'course' => $course,
		]);
	}

	public function create($courseId)
	{
		var_dump($courseId);
		die();
		// return view('course.form', ['courseId' => $courseId]);
	}

	
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'title' => 'between:6,64',
			'description' => 'between:0,1024',
			'imageSource' => 'between:0,256'
		]);
		$course = new Course([
			'title' => $request->input('title'),
			'description' => $request->input('description'),
			'image_source' => $request->input('imageSource')
		]);

		$course->save();
		return redirect('/course')->with('success', 'Course has been created');
	}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update (Request $request, $id)
	{
		$course = Course::find($id);
		$course->title = $request->input('title');
		$course->description = $request->input('description');
		$course->image_source = $request->input('imageSource');

		$course->save();
		return redirect('/course')->with('success', 'Course has been updated');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy ($id)
	{
		$course = Course::find($id);
		$course->delete();

		return redirect('/course')->with('success', 'Course has been deleted');	
	}

}

