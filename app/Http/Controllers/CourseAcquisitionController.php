<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseAcquisition;
use App\User;

class CourseAcquisitionController extends Controller
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
	 * Show the course acquisitions table.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$courseAcquisitions = CourseAcquisition::with(['course', 'user'])->get();

		return view('course.acquisition.grid', [
			'courseAcquisitions' => $courseAcquisitions
		]);
	}

	public function create ()
	{
		$courses = Course::get(['id as value', 'title as text']);
		$users = User::get(['id', 'name', 'surname']);
		$courseAcquisitions = CourseAcquisition::get();

		return view('course.acquisition.form', [
			'courses' => $courses,
			'users' => $users,
			'courseAcquisitions' => $courseAcquisitions
		]);
	}
	
	/**
	 * Store a newly created resources in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$request->validate([
			'course_id' => 'exists:App\Course,id',
			'users' => 'exists:App\User,id'
		]);

		$course_id = $request->input('course_id');
		$user_ids_str = $request->input('users');
		$user_ids = explode (',', $user_ids_str, 3000);

		foreach($user_ids as $user_id) {
			$courseAcquisition = new CourseAcquisition([
				'course_id' => $course_id,
				'user_id' => $user_id
			]);
			$courseAcquisition->save();
		}

		return redirect('/course-acquisition')->with(
			'success',
			'Course acquisitions have been created'
		);
	}

	
	/**
	 * Remove the specified resource from storage.
	 *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy ($id)
	{
		$courseAcquisition = CourseAcquisition::find($id);
		$courseAcquisition->delete();

		return redirect('/course-acquisition')
			->with('success', 'Course Acquisition has been deleted');	
	}
}
