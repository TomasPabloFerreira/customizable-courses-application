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
		$courseAcquisitions = CourseAcquisition::with(['course', 'user'])
			->get([
				'id',
				'user_id',
				'course_id',
				'added_on'
			]);

		return view('course.acquisition.grid', [
			'courseAcquisitions' => $courseAcquisitions
		]);
	}

	public function create ()
	{
		$courses = Course::get(['id as value', 'title as text']);
		$users = User::get(['id', 'name', 'surname']);
		return view('course.acquisition.form', [
			'courses' => $courses,
			'users' => $users
		]);
	}


}

