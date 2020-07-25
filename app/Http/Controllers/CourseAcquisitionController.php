<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseAcquisition;

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
		$courseAcquisitions = CourseAcquisition::get([
			'id',
			'user_id',
			'course_id',
			'added_on'
		]);

		return view('course.acquisition.grid', [
			'courseAcquisitions' => $courseAcquisitions
		]);
	}

}

