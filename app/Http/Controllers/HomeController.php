<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Course;

class HomeController extends Controller
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
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$userId = Auth::id();
		$courses = Course::whereHas('acquisitions', function ($q) use ($userId) {
			$q->where('user_id', $userId);
		})->withCount('lessons')->get();

		return view('home', ['courses' => $courses]);
	}
}
