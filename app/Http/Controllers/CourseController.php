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

	public function edit($id)
	{
	}

	public function create()
	{
		return view('course.form');
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
}

